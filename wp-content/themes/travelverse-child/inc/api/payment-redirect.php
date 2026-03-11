<?php
/**
 * Payment Redirect Handler
 * 
 * Alur:
 * 1. Booking dibuat oleh WP Travel Engine
 * 2. Hook wptravelengine_after_booking_created → simpan booking_id ke session
 * 3. Filter wptravelengine_redirect_after_booking → stop redirect bawaan
 * 4. Hit POST /api/payment/process ke Laravel → dapat transaction_id
 * 5. Redirect ke /payment/page?dHJhbnNhY3Rpb25faWQ=<transaction_id>
 * 
 * Path: wp-content/themes/travelverse-child/inc/api/payment-redirect.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Simpan booking_id ke session saat booking baru dibuat
 */
add_action( 'wptravelengine_after_booking_created', function( $booking_id ) {
    WTE()->session->set( 'bth_pending_payment_booking_id', $booking_id );
} );

/**
 * Stop redirect bawaan, kita handle sendiri
 */
add_filter( 'wptravelengine_redirect_after_booking', function( $should_redirect ) {
    $booking_id = WTE()->session->get( 'bth_pending_payment_booking_id' );

    if ( ! $booking_id ) {
        return $should_redirect;
    }

    $payment_app_url = defined( 'BTH_PAYMENT_APP_URL' )
        ? rtrim( BTH_PAYMENT_APP_URL, '/' )
        : 'http://localhost:8002';

    // ── Kumpulkan data booking ───────────────────────────────
    $order_trips = maybe_unserialize(
        get_post_meta( $booking_id, 'order_trips', true )
    );
    $trip = is_array( $order_trips ) ? reset( $order_trips ) : [];

    $cart_info = maybe_unserialize(
        get_post_meta( $booking_id, 'cart_info', true )
    );
    $amount = isset( $cart_info['total'] ) ? (float) $cart_info['total'] : 0;

    // Nama & email dari WP user
    $current_user   = wp_get_current_user();
    $customer_name  = trim( $current_user->first_name . ' ' . $current_user->last_name );
    if ( empty( $customer_name ) ) {
        $customer_name = $current_user->display_name;
    }
    $customer_email = $current_user->user_email;
    $customer_phone = get_user_meta( $current_user->ID, 'phone', true ) ?: '08000000000';

    // Nama produk
    $product_name = $trip['title'] ?? 'Tour Package';
    $package_name = $trip['package_name'] ?? '';
    if ( $package_name ) {
        $product_name .= ' - ' . $package_name;
    }
    $product_name = html_entity_decode( $product_name, ENT_QUOTES, 'UTF-8' );

    // Clear session
    WTE()->session->set( 'bth_pending_payment_booking_id', null );

    // ── Step 1: Hit POST /api/payment/process ───────────────
    $api_url  = $payment_app_url . '/api/payment/process';
    $response = wp_remote_post( $api_url, [
        'timeout'     => 15,
        'headers'     => [
            'Content-Type' => 'application/json',
            'Accept'       => 'application/json',
        ],
        'body'        => wp_json_encode( [
            'booking_id'     => (string) $booking_id,
            'product_name'   => $product_name,
            'amount'         => $amount,
            'customer_name'  => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
        ] ),
    ] );

    // Handle error koneksi
    if ( is_wp_error( $response ) ) {
        error_log( '[BTH Payment] Gagal hit payment API: ' . $response->get_error_message() );
        wp_redirect( add_query_arg( 'payment_error', '1', home_url() ) );
        exit;
    }

    $body = json_decode( wp_remote_retrieve_body( $response ), true );
    $code = wp_remote_retrieve_response_code( $response );

    // Handle response tidak sukses
    if ( $code !== 200 || empty( $body['success'] ) || empty( $body['data']['transaction_id'] ) ) {
        error_log( '[BTH Payment] Response tidak valid: ' . wp_remote_retrieve_body( $response ) );
        wp_redirect( add_query_arg( 'payment_error', '1', home_url() ) );
        exit;
    }

    $transaction_id = $body['data']['transaction_id'];

    // ── Step 2: Simpan transaction_id ke booking meta ────────
    update_post_meta( $booking_id, '_bth_transaction_id', $transaction_id );

    // ── Step 3: Tambah point sementara (amount / 10.000) ─────
    // TODO: Pindahkan ke callback setelah payment verified
    if ( $amount > 0 && $current_user->ID ) {
        $points_earned = (int) floor( $amount / 10000 );

        if ( $points_earned > 0 ) {
            bth_add_point_log( [
                'user_id'      => $current_user->ID,
                'type'         => 'earn',
                'source'       => 'booking',
                'reference_id' => $booking_id,
                'points'       => $points_earned,
                'note'         => sprintf(
                    'Point dari booking #%d — nominal Rp %s',
                    $booking_id,
                    number_format( $amount, 0, ',', '.' )
                ),
            ] );

            error_log( sprintf(
                '[BTH Point] User #%d mendapat %d point dari booking #%d (Rp %s)',
                $current_user->ID,
                $points_earned,
                $booking_id,
                number_format( $amount, 0, ',', '.' )
            ) );
        }
    }

    // ── Step 4: Redirect ke payment page ────────────────────
    $redirect_url = $payment_app_url . '/payment/page?dHJhbnNhY3Rpb25faWQ=' . urlencode( $transaction_id );

    wp_redirect( $redirect_url );
    exit;
} );