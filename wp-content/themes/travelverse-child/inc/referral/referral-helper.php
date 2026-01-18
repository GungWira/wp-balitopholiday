<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Generate coupon for user
 */
function bth_create_referral_coupon( $user_id ) {

    $existing = get_user_meta( $user_id, 'bth_referral_coupon_id', true );
    if ( $existing ) return $existing;

    $code = 'BTH-' . strtoupper( wp_generate_password(8, false, false) );

    $coupon_id = wp_insert_post([
        'post_title'  => $code,
        'post_type'   => 'wte-coupon',
        'post_status' => 'publish',
    ]);

    if ( is_wp_error($coupon_id) ) return false;

    update_post_meta(
        $coupon_id,
        'wp_travel_engine_coupon_code',
        $code
    );

    $coupon_metas = [
        'general' => [
            'coupon_type'        => 'percentage',
            'coupon_value'       => '10', // 10%
            'coupon_start_date'  => date('Y-m-d'),
            'coupon_expiry_date' => '',
        ],
        'restriction' => [
            'coupon_limit_number' => '',
        ],
    ];

    update_post_meta(
        $coupon_id,
        'wp_travel_engine_coupon_metas',
        $coupon_metas
    );

    update_user_meta( $user_id, 'bth_referral_coupon_id', $coupon_id );
    update_user_meta( $user_id, 'bth_referral_coupon_code', $code );

    return $coupon_id;
}

/**
 * Get user referral coupon
 */
function bth_get_user_referral_coupon( $user_id ) {
    $code = get_user_meta( $user_id, 'bth_referral_coupon', true );
    if ( $code ) {
        return $code;
    }
    return bth_create_referral_coupon( $user_id );
}
