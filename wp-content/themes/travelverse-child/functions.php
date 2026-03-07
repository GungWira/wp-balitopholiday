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

    if ( isset($post->post_content) && has_shortcode($post->post_content, 'travelverse_account') ) {
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

// FIX
require_once get_stylesheet_directory() . '/inc/trip/filter.php';
require_once get_stylesheet_directory() . '/inc/trip/filter-enhanced.php';
require_once get_stylesheet_directory() . '/inc/user/user-type-selector.php';

// FIX (BOOKING API)
require_once get_stylesheet_directory() . '/inc/api/booking-api.php';
require_once get_stylesheet_directory() . '/inc/api/payment-redirect.php';

// FIX LOGIN FEATURE
add_action( 'login_init', function() {
    if ( isset( $_GET['action'] ) ) return;
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) return;
    wp_safe_redirect( home_url( '/login' ) );
    exit;
} );

// FIX LOGIN FEATURE
require_once get_stylesheet_directory() . '/inc/auth/shortcode-login.php';

// FIX REGISTER FEATURE
require_once get_stylesheet_directory() . '/inc/auth/shortcode-register.php';

// FIX NAVBAR CUSTOM
function travelverse_register_custom_navbar_block() {
    // Pastikan folder block ada
    $block_dir = get_stylesheet_directory() . '/blocks/custom-navbar';

    if ( ! file_exists( $block_dir . '/block.json' ) ) {
        return; // Block belum tersedia, skip
    }

    register_block_type( $block_dir );
}
add_action( 'init', 'travelverse_register_custom_navbar_block' );

// LOADING ANIMATION
function travelverse_loading_screen() {
    // CSS — priority 1 agar load paling awal
    wp_enqueue_style(
        'tv-loading-screen',
        get_stylesheet_directory_uri() . '/assets/css/loading-screen.css',
        [],
        '1.0.0'
    );

    // JS — load di footer
    wp_enqueue_script(
        'tv-loading-screen',
        get_stylesheet_directory_uri() . '/assets/js/loading-screen.js',
        [],
        '1.0.0',
        true
    );

    // HTML — inject langsung setelah <body> terbuka
    add_action( 'wp_body_open', function () {
        echo '
        <div id="tv-loading-screen" role="status" aria-label="Memuat halaman...">
          <div class="tv-loading__text-wrap">
            <span class="tv-loading__brand">Bali Top Holiday</span>
          </div>
          <div class="tv-loading__subtitle-wrap">
            <span class="tv-loading__subtitle">Tour &amp; Travel</span>
          </div>
        </div>';
    });
}
add_action( 'wp_enqueue_scripts', 'travelverse_loading_screen' );
