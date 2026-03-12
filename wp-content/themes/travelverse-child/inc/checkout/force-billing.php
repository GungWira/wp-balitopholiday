<?php
/**
 * Force Billing Data dari User yang Login
 * 
 * WTE hook ke wp_insert_post priority 10 untuk proses billing.
 * Kita hook priority 9 — jalan tepat sebelumnya — override $_POST['billing']
 * dengan data user yang benar-benar sedang login.
 * 
 * Path: wp-content/themes/travelverse-child/inc/checkout/force-billing.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_insert_post', function ( $post_id, $post, $update ) {

    // Hanya untuk post type booking
    if ( ! $post || $post->post_type !== 'booking' ) return;

    // Hanya saat ada request billing dari frontend (bukan dari admin)
    if ( empty( $_POST['billing'] ) ) return;

    // Hanya kalau user sedang login
    if ( ! is_user_logged_in() ) return;

    $user    = wp_get_current_user();
    $fname   = $user->first_name ?: $user->display_name;
    $lname   = $user->last_name ?: '';
    $email   = $user->user_email;
    $phone   = get_user_meta( $user->ID, 'phone', true ) ?: '-';
    $address = get_user_meta( $user->ID, 'billing_address', true ) ?: '-';
    $city    = get_user_meta( $user->ID, 'billing_city', true ) ?: '-';
    $country = get_user_meta( $user->ID, 'billing_country', true ) ?: 'ID';

    // Override $_POST['billing'] — WTE akan baca ini via Functions::create_request('POST')
    $_POST['billing'] = [
        'fname'   => $fname,
        'lname'   => $lname,
        'email'   => $email,
        'phone'   => $phone,
        'address' => $address,
        'city'    => $city,
        'country' => $country,
    ];

    error_log( sprintf(
        '[BTH Force Billing] Booking #%d → paksa billing ke user #%d (%s)',
        $post_id,
        $user->ID,
        $email
    ) );

}, 9, 3 ); // priority 9 = sebelum WTE (priority 10)