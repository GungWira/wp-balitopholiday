<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Create referral coupon at register
 */
add_action( 'user_register', function( $user_id ) {
    bth_create_referral_coupon( $user_id );
});

/**
 * Ensure coupon exists at login
 */
add_action( 'wp_login', function( $user_login, $user ) {
    bth_create_referral_coupon( $user->ID );
}, 10, 2 );

/**
 * Logic after booking complete:
 * If booking used a referral coupon
 * reward point for the coupon owner
 */
add_action( 'wp_travel_engine_after_booking_completed', function( $booking_id ) {

    $used_coupon = get_post_meta( $booking_id, 'used_coupon_code', true );
    if ( ! $used_coupon ) {
        return;
    }

    // find coupon post
    $coupon_post = get_page_by_title( $used_coupon, OBJECT, 'wp_travel_engine_coupon' );
    if ( ! $coupon_post ) {
        return;
    }

    // find owner from coupon meta
    $coupon_owner = get_post_meta( $coupon_post->ID, 'bth_coupon_owner', true );
    if ( ! $coupon_owner ) {
        return;
    }

    // skip if owner booked self coupon
    $booking_user = get_post_meta( $booking_id, 'wp_travel_engine_booking_user_id', true );
    if ( intval( $booking_user ) === intval( $coupon_owner ) ) {
        return;
    }

    // reward point; formula = total_cost / 1000
    $total_cost = (float) get_post_meta( $booking_id, '_order_total', true );
    $points     = intval( $total_cost / 1000 );

    bth_add_point_log([
        'user_id'      => $coupon_owner,
        'type'         => 'earn',
        'source'       => 'referral',
        'reference_id' => $booking_id,
        'points'       => $points,
        'note'         => sprintf( 'Referral bonus dari booking %d', $booking_id ),
    ]);

});
