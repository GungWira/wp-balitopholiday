<?php
/**
 * Travelverse Child Theme
 */

// (FIX)
require_once get_stylesheet_directory() . '/inc/shortcodes.php';
// (FIX) REGISTER PATTERNS BTH
require_once get_stylesheet_directory() . '/inc/init.php';

// (FIX)
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'travelverse-child-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );
});

// (FIX)
add_action( 'init', function () {
    register_block_type( get_stylesheet_directory() . '/blocks/user-auth' );
});

// (FIX) Load auth CSS
add_action('wp_enqueue_scripts', function () {
    if (is_page('my-account')) {
        wp_enqueue_style(
            'auth-style',
            get_stylesheet_directory_uri() . '/assets/css/auth.css',
            [],
            '1.0'
        );
    }
});

// trial

// (FIX) Load button CSS di SEMUA halaman (untuk block user-auth)
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'user-auth-button-style',
        get_stylesheet_directory_uri() . '/blocks/user-auth/style.css',
        [],
        '1.0'
    );
});

//(FIX) Load editor preview
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script(
        'user-auth-editor',
        get_stylesheet_directory_uri() . '/blocks/user-auth/index.js',
        ['wp-blocks', 'wp-element'],
        '1.0'
    );
});

// trial

add_action('wp_enqueue_scripts', 'travelverse_child_enqueue_trip_card_css');
function travelverse_child_enqueue_trip_card_css() {

    wp_enqueue_style(
        'travelverse-child-trip-card',
        get_stylesheet_directory_uri() . '/assets/css/trip-card.css',
        array(),             
        wp_get_theme()->get('Version')
    );

}


// =========== DASHBOARD BOOKING ================
add_action('wp_enqueue_scripts', function () {
    global $post;

    if ( isset($post->post_content) && has_shortcode($post->post_content, 'wp_travel_engine_dashboard') ) {
        wp_enqueue_style(
            'bth-dashboard',
            get_stylesheet_directory_uri() . '/assets/css/dahsboard_booking.css',
            [],
            '1.0'
        );
    }
});
// =========== DASHBOARD BOOKING ================

// =========== COPY REFERRAL JS ================
add_action( 'wp_enqueue_scripts', function () {

    // Hanya load di halaman account / point (opsional tapi direkomendasikan)
    if ( ! is_user_logged_in() ) return;

    wp_enqueue_script(
        'bth-account-points',
        get_stylesheet_directory_uri() . '/assets/js/account-points.js',
        [],
        '1.0.0',
        true
    );

});
// =========== COPY REFERRAL JS ================