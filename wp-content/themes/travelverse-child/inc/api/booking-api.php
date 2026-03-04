<?php
/**
 * Booking REST API Endpoints
 * 
 * Endpoint:
 *   GET  /wp-json/booking/v1/verify/{booking_id}
 *   POST /wp-json/booking/v1/update/{booking_id}
 * 
 * Path: wp-content/themes/travelverse-child/inc/api/booking-api.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'rest_api_init', function () {

    // ── 1. Verify Booking ────────────────────────────────────
    register_rest_route( 'booking/v1', '/verify/(?P<booking_id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'bth_api_verify_booking',
        'permission_callback' => 'bth_api_check_key',
        'args'                => [
            'booking_id' => [
                'required'          => true,
                'validate_callback' => fn( $v ) => is_numeric( $v ),
            ],
        ],
    ] );

    // ── 2. Update Booking Status ─────────────────────────────
    register_rest_route( 'booking/v1', '/update/(?P<booking_id>\d+)', [
        'methods'             => 'POST',
        'callback'            => 'bth_api_update_booking',
        'permission_callback' => 'bth_api_check_key',
        'args'                => [
            'booking_id' => [
                'required'          => true,
                'validate_callback' => fn( $v ) => is_numeric( $v ),
            ],
        ],
    ] );

} );

/**
 * Cek API key dari header X-API-Key
 * Key didefinisikan di wp-config.php:
 *   define( 'BTH_PAYMENT_API_KEY', 'isi-key-rahasia-disini' );
 */
function bth_api_check_key( WP_REST_Request $request ): bool {
    $key = $request->get_header( 'X-API-Key' );
    return defined( 'BTH_PAYMENT_API_KEY' ) && hash_equals( BTH_PAYMENT_API_KEY, (string) $key );
}

/**
 * GET /wp-json/booking/v1/verify/{booking_id}
 */
function bth_api_verify_booking( WP_REST_Request $request ): WP_REST_Response {
    $booking_id = (int) $request->get_param( 'booking_id' );

    // Pastikan post ada dan tipe-nya booking
    $post = get_post( $booking_id );
    if ( ! $post || $post->post_type !== 'booking' ) {
        return new WP_REST_Response( [
            'success' => false,
            'message' => 'Booking not found.',
        ], 404 );
    }

    // Ambil data dari order_trips
    $order_trips = maybe_unserialize(
        get_post_meta( $booking_id, 'order_trips', true )
    );
    $trip = is_array( $order_trips ) ? reset( $order_trips ) : [];

    // Ambil total dari cart_info
    $cart_info = maybe_unserialize(
        get_post_meta( $booking_id, 'cart_info', true )
    );
    $amount = isset( $cart_info['total'] ) ? (float) $cart_info['total'] : 0;

    // Ambil data customer dari billing_info
    $billing = maybe_unserialize(
        get_post_meta( $booking_id, 'billing_info', true )
    );
    $fname = $billing['fname'] ?? '';
    $lname = $billing['lname'] ?? '';
    $customer_name  = trim( "$fname $lname" );
    $customer_email = $billing['email'] ?? '';
    $customer_phone = $billing['phone'] ?? '';

    // Fallback nama dari WP user
    if ( empty( $customer_name ) ) {
        $user_id = get_post_meta( $booking_id, 'wp_travel_engine_booking_user_id', true );
        if ( $user_id ) {
            $user          = get_userdata( $user_id );
            $customer_name = $user ? trim( $user->first_name . ' ' . $user->last_name ) : '';
            if ( empty( $customer_name ) ) $customer_name = $user->display_name ?? '';
            if ( empty( $customer_email ) ) $customer_email = $user->user_email ?? '';
        }
    }

    $product_name = $trip['title'] ?? 'Unknown Trip';
    $package_name = $trip['package_name'] ?? '';
    if ( $package_name ) {
        $product_name .= ' - ' . $package_name;
    }

    $status = get_post_meta( $booking_id, 'wp_travel_engine_booking_status', true );

    return new WP_REST_Response( [
        'success' => true,
        'data'    => [
            'booking_id'     => (string) $booking_id,
            'product_name'   => $product_name,
            'amount'         => $amount,
            'customer_name'  => $customer_name,
            'customer_email' => $customer_email,
            'customer_phone' => $customer_phone,
            'status'         => $status,
        ],
    ], 200 );
}

/**
 * POST /wp-json/booking/v1/update/{booking_id}
 * 
 * Body: { "status": "completed", "payment_data": { "transaction_id": "...", "amount": 0, "paid_at": "..." } }
 */
function bth_api_update_booking( WP_REST_Request $request ): WP_REST_Response {
    $booking_id  = (int) $request->get_param( 'booking_id' );
    $body        = $request->get_json_params();
    $new_status  = sanitize_text_field( $body['status'] ?? '' );
    $payment_data = $body['payment_data'] ?? [];

    $post = get_post( $booking_id );
    if ( ! $post || $post->post_type !== 'booking' ) {
        return new WP_REST_Response( [
            'success' => false,
            'message' => 'Booking not found.',
        ], 404 );
    }

    // Status yang diizinkan
    $allowed_statuses = [ 'pending', 'booked', 'cancelled', 'completed' ];
    if ( ! in_array( $new_status, $allowed_statuses, true ) ) {
        return new WP_REST_Response( [
            'success' => false,
            'message' => 'Invalid status. Allowed: ' . implode( ', ', $allowed_statuses ),
        ], 400 );
    }

    // Update status booking
    update_post_meta( $booking_id, 'wp_travel_engine_booking_status', $new_status );
    update_post_meta( $booking_id, 'wp_travel_engine_booking_payment_status', 'completed' );

    // Simpan data payment dari Laravel/Doku
    if ( ! empty( $payment_data ) ) {
        update_post_meta( $booking_id, '_bth_payment_transaction_id', sanitize_text_field( $payment_data['transaction_id'] ?? '' ) );
        update_post_meta( $booking_id, '_bth_payment_amount',         floatval( $payment_data['amount'] ?? 0 ) );
        update_post_meta( $booking_id, '_bth_payment_paid_at',        sanitize_text_field( $payment_data['paid_at'] ?? '' ) );
        update_post_meta( $booking_id, '_bth_payment_method',         sanitize_text_field( $payment_data['payment_method'] ?? '' ) );
        // Update paid_amount di WP Travel Engine
        update_post_meta( $booking_id, 'paid_amount', floatval( $payment_data['amount'] ?? 0 ) );
    }

    return new WP_REST_Response( [
        'success' => true,
        'message' => "Booking #$booking_id updated to '$new_status'.",
        'data'    => [
            'booking_id' => $booking_id,
            'status'     => $new_status,
        ],
    ], 200 );
}

// ── 3. Payment Callback (dari Laravel) ──────────────────────
add_action( 'rest_api_init', function () {
    register_rest_route( 'booking/v1', '/callback', [
        'methods'             => 'POST',
        'callback'            => 'bth_api_payment_callback',
        'permission_callback' => 'bth_api_check_payment_key',
    ] );
} );

/**
 * Cek X-PAYMENT-KEY dari Laravel
 * Key harus sama dengan WORDPRESS_API_KEY di .env Laravel
 */
function bth_api_check_payment_key( WP_REST_Request $request ): bool {
    $key = $request->get_header( 'X-PAYMENT-KEY' );
    return defined( 'BTH_PAYMENT_API_KEY' ) && hash_equals( BTH_PAYMENT_API_KEY, (string) $key );
}

/**
 * POST /wp-json/booking/v1/callback
 * Terima notifikasi pembayaran dari Laravel
 */
function bth_api_payment_callback( WP_REST_Request $request ): WP_REST_Response {
    $body       = $request->get_json_params();
    $booking_id = isset( $body['booking_id'] ) ? (int) $body['booking_id'] : 0;
    $status     = sanitize_text_field( $body['status'] ?? '' );
    $paid_at    = sanitize_text_field( $body['paid_at'] ?? '' );
    $amount     = floatval( $body['amount'] ?? 0 );
    $tx_id      = sanitize_text_field( $body['transaction_id'] ?? '' );
    $method     = sanitize_text_field( $body['payment_method'] ?? '' );

    if ( ! $booking_id ) {
        return new WP_REST_Response( [ 'success' => false, 'message' => 'Invalid booking_id.' ], 400 );
    }

    $post = get_post( $booking_id );
    if ( ! $post || $post->post_type !== 'booking' ) {
        return new WP_REST_Response( [ 'success' => false, 'message' => 'Booking not found.' ], 404 );
    }

    // Map status Laravel → WP Travel Engine
    $wte_status = match( $status ) {
        'paid', 'success' => 'booked',
        'failed', 'expired' => 'cancelled',
        default => 'pending',
    };

    // Update status booking
    update_post_meta( $booking_id, 'wp_travel_engine_booking_status', $wte_status );
    update_post_meta( $booking_id, 'wp_travel_engine_booking_payment_status', $status === 'paid' ? 'completed' : $status );

    // Simpan data payment
    if ( $tx_id )  update_post_meta( $booking_id, '_bth_payment_transaction_id', $tx_id );
    if ( $amount ) update_post_meta( $booking_id, 'paid_amount', $amount );
    if ( $paid_at ) update_post_meta( $booking_id, '_bth_payment_paid_at', $paid_at );
    if ( $method ) update_post_meta( $booking_id, '_bth_payment_method', $method );

    // Update due_amount
    $cart_info = maybe_unserialize( get_post_meta( $booking_id, 'cart_info', true ) );
    $total     = isset( $cart_info['total'] ) ? (float) $cart_info['total'] : 0;
    update_post_meta( $booking_id, 'due_amount', max( 0, $total - $amount ) );

    do_action( 'bth_after_payment_callback', $booking_id, $wte_status, $body );

    return new WP_REST_Response( [
        'success' => true,
        'message' => "Booking #$booking_id updated to '$wte_status'.",
    ], 200 );
}