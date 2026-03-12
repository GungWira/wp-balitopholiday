<?php
/**
 * Fix Booking Usermeta
 * 
 * Masalah: WTE update_customer_meta() menulis semua booking customer post
 *          ke usermeta user yang login — menyebabkan booking tercampur
 * 
 * Solusi: Hook ke wp_travel_engine_after_booking_process_completed yang jalan
 *         SETELAH update_customer_meta() — lalu koreksi usermeta
 * 
 * Path: wp-content/themes/travelverse-child/inc/booking/fix-booking-usermeta.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_travel_engine_after_booking_process_completed', function( $booking_id ) {

    if ( ! is_user_logged_in() ) return;

    $user_id = get_current_user_id();

    // Ambil usermeta yang sudah ada (mungkin sudah terkontaminasi oleh WTE)
    $current_meta = get_user_meta( $user_id, 'wp_travel_engine_user_bookings', true );
    $current_meta = is_array( $current_meta ) ? $current_meta : [];

    // Filter: hanya simpan booking yang post_author = user ini
    $correct_ids = array_filter( $current_meta, function( $bid ) use ( $user_id ) {
        $post = get_post( $bid );
        return $post && (int) $post->post_author === $user_id;
    });

    // Pastikan booking baru ini masuk
    $correct_ids[] = (int) $booking_id;
    $correct_ids   = array_values( array_unique( $correct_ids ) );

    // Overwrite usermeta dengan data yang benar
    update_user_meta( $user_id, 'wp_travel_engine_user_bookings', $correct_ids );

    file_put_contents(
        WP_CONTENT_DIR . '/bth-debug.log',
        date('Y-m-d H:i:s') . ' [fix-usermeta] User #' . $user_id . ' → ' . count( $correct_ids ) . ' booking: ' . implode( ', ', $correct_ids ) . "\n",
        FILE_APPEND
    );

}, 10 );