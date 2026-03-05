<?php
/**
 * Shortcode [travelverse_register]
 * Path: wp-content/themes/travelverse-child/inc/auth/shortcode-register.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Proses register via POST
 */
add_action( 'init', function () {
    if ( ! isset( $_POST['bth_register_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['bth_register_nonce'], 'bth_register' ) ) return;

    $first_name = sanitize_text_field( $_POST['first_name'] ?? '' );
    $last_name  = sanitize_text_field( $_POST['last_name'] ?? '' );
    $email      = sanitize_email( $_POST['email'] ?? '' );
    $phone      = sanitize_text_field( $_POST['phone'] ?? '' );
    $password   = $_POST['password'] ?? '';
    $password2  = $_POST['password2'] ?? '';

    $errors = [];

    if ( empty( $first_name ) ) $errors[] = 'Nama depan wajib diisi.';
    if ( empty( $last_name ) )  $errors[] = 'Nama belakang wajib diisi.';
    if ( empty( $email ) || ! is_email( $email ) ) $errors[] = 'Email tidak valid.';
    if ( empty( $phone ) )      $errors[] = 'Nomor telepon wajib diisi.';
    if ( strlen( $password ) < 8 ) $errors[] = 'Password minimal 8 karakter.';
    if ( $password !== $password2 ) $errors[] = 'Konfirmasi password tidak cocok.';
    if ( email_exists( $email ) ) $errors[] = 'Email sudah terdaftar.';

    if ( ! empty( $errors ) ) {
        // Simpan error & input ke session
        WP_Session_Tokens::get_instance( 0 );
        set_transient( 'bth_reg_errors_' . md5( $email . time() ), $errors, 60 );
        $query = http_build_query( [
            'reg_error' => base64_encode( implode( '|', $errors ) ),
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'email'      => $email,
            'phone'      => $phone,
        ] );
        wp_safe_redirect( home_url( '/register?' . $query ) );
        exit;
    }

    // Buat user
    $username = sanitize_user( strtolower( $first_name . '.' . $last_name ), true );
    // Pastikan username unik
    $base_username = $username;
    $i = 1;
    while ( username_exists( $username ) ) {
        $username = $base_username . $i;
        $i++;
    }

    $user_id = wp_create_user( $username, $password, $email );

    if ( is_wp_error( $user_id ) ) {
        $query = http_build_query( [ 'reg_error' => base64_encode( $user_id->get_error_message() ) ] );
        wp_safe_redirect( home_url( '/register?' . $query ) );
        exit;
    }

    // Update data user
    wp_update_user( [
        'ID'           => $user_id,
        'first_name'   => $first_name,
        'last_name'    => $last_name,
        'display_name' => $first_name . ' ' . $last_name,
    ] );
    update_user_meta( $user_id, 'phone', $phone );

    // Auto login
    wp_set_current_user( $user_id );
    wp_set_auth_cookie( $user_id, true );

    wp_safe_redirect( home_url( '/my-account' ) );
    exit;
} );

/**
 * Shortcode output
 */
add_shortcode( 'travelverse_register', function () {
    if ( is_user_logged_in() ) {
        wp_safe_redirect( home_url( '/my-account' ) );
        exit;
    }
    ob_start();
    require get_stylesheet_directory() . '/inc/auth/register-page.php';
    return ob_get_clean();
} );