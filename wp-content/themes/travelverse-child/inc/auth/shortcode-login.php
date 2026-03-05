<?php
/**
 * Shortcode [travelverse_login]
 * Path: wp-content/themes/travelverse-child/inc/auth/shortcode-login.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode( 'travelverse_login', function () {
    if ( is_user_logged_in() ) {
        wp_safe_redirect( home_url( '/my-account' ) );
        exit;
    }
    ob_start();
    require get_stylesheet_directory() . '/inc/auth/login-page.php';
    return ob_get_clean();
} );

// Login gagal → redirect balik ke /login
add_action( 'wp_login_failed', function() {
    wp_safe_redirect( add_query_arg( 'login', 'failed', home_url( '/login' ) ) );
    exit;
} );

// Logout → redirect ke /login
add_filter( 'logout_redirect', function() {
    return home_url( '/login' );
} );