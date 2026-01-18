<?php
if ( ! defined('ABSPATH') ) exit;

add_action( 'wp_login', function( $user_login, $user ) {
    bth_ensure_user_point_meta( $user->ID );
}, 10, 2 );

/**
 * Saat user register → set saldo awal
 */
add_action( 'user_register', function( $user_id ) {
    bth_ensure_user_point_meta( $user_id );
});

/**
 * Contoh hook booking selesai
 * (aktifkan jika sudah siap)
 */
/*
add_action('wp_travel_engine_booking_completed', function( $booking_id ) {

    $user_id = get_post_meta($booking_id, 'wp_travel_engine_booking_user_id', true);
    if ( ! $user_id ) return;

    bth_add_point_log([
        'user_id'      => $user_id,
        'type'         => 'earn',
        'source'       => 'booking',
        'reference_id' => $booking_id,
        'points'       => 100,
        'note'         => 'Point dari booking selesai'
    ]);

});
*/
