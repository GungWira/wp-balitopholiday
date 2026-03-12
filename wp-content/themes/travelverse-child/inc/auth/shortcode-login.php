<?php
/**
 * Shortcode [travelverse_login]
 * Path: wp-content/themes/travelverse-child/inc/auth/shortcode-login.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Proses login via POST — handle sendiri, tidak lewat wp-login.php
 */
add_action( 'init', function () {

    // Hanya proses kalau ada nonce login kita
    if ( ! isset( $_POST['bth_login_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['bth_login_nonce'], 'bth_login' ) ) return;

    $log      = sanitize_text_field( $_POST['log'] ?? '' );
    $password = $_POST['pwd'] ?? '';
    $remember = isset( $_POST['rememberme'] );

    $redirect_to = isset( $_POST['redirect_to'] )
        ? esc_url_raw( $_POST['redirect_to'] )
        : home_url( '/my-account' );

    if ( empty( $log ) || empty( $password ) ) {
        wp_safe_redirect( add_query_arg( 'login', 'failed', home_url( '/login' ) ) );
        exit;
    }

    // Coba login dengan email atau username
    $user = null;

    if ( is_email( $log ) ) {
        $user = get_user_by( 'email', $log );
    }

    if ( ! $user ) {
        $user = get_user_by( 'login', $log );
    }

    if ( ! $user ) {
        wp_safe_redirect( add_query_arg( 'login', 'failed', home_url( '/login' ) ) );
        exit;
    }

    // Verifikasi password
    if ( ! wp_check_password( $password, $user->user_pass, $user->ID ) ) {
        wp_safe_redirect( add_query_arg( 'login', 'failed', home_url( '/login' ) ) );
        exit;
    }

    // Set auth cookie & login
    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID, $remember );
    do_action( 'wp_login', $user->user_login, $user );

    wp_safe_redirect( $redirect_to );
    exit;

} );

/**
 * Shortcode output
 */
add_shortcode( 'travelverse_login', function () {
    if ( is_user_logged_in() ) {
        wp_safe_redirect( home_url( '/my-account' ) );
        exit;
    }
    ob_start();
    require get_stylesheet_directory() . '/inc/auth/login-page.php';
    return ob_get_clean();
} );

// Login gagal dari wp-login.php fallback → redirect ke /login
add_action( 'wp_login_failed', function() {
    wp_safe_redirect( add_query_arg( 'login', 'failed', home_url( '/login' ) ) );
    exit;
} );

// Logout → redirect ke /login
add_filter( 'logout_redirect', function() {
    return home_url( '/login' );
} );