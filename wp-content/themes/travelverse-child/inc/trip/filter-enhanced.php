<?php
/**
 * Trip Filter Update - Enhanced untuk Gutenberg Blocks
 * File ini menambahkan filter untuk blocks yang menggunakan render_callback
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter untuk block attributes sebelum render
 * Ini menangkap query args dari Gutenberg block
 */
function wte_filter_block_render_attributes($attributes, $block) {
    // Hanya untuk block WP Travel Engine Trips
    if (!isset($block['blockName']) || $block['blockName'] !== 'wptravelengine/trips') {
        return $attributes;
    }
    
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $attributes;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $attributes;
    }
    
    // Tambahkan trip type ke attributes
    if (!isset($attributes['tripTypes'])) {
        $attributes['tripTypes'] = array();
    }
    
    // Get term ID dari slug
    $term = get_term_by('slug', $user_type, 'trip_types');
    if ($term && !is_wp_error($term)) {
        $attributes['tripTypes'] = array($term->term_id);
    }
    
    return $attributes;
}
add_filter('render_block_data', 'wte_filter_block_render_attributes', 10, 2);

/**
 * Filter langsung untuk render block content
 */
function wte_filter_trips_block_content($block_content, $block) {
    // Hanya untuk WTE Trips block
    if (!isset($block['blockName']) || $block['blockName'] !== 'wptravelengine/trips') {
        return $block_content;
    }
    
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $block_content;
    }
    
    // Log untuk debugging
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('WTE Block Filter: Rendering trips block with user type = ' . $_COOKIE['wte_user_type']);
    }
    
    return $block_content;
}
add_filter('render_block', 'wte_filter_trips_block_content', 10, 2);

/**
 * Filter untuk WP_Query yang dipanggil dari block
 * Ini adalah backup jika render_block_data tidak bekerja
 */
function wte_filter_all_trip_queries($query) {
    // Skip jika admin atau bukan main query
    if (is_admin()) {
        return;
    }
    
    // Cek apakah ini query untuk trips
    if ($query->get('post_type') !== 'trip') {
        return;
    }
    
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return;
    }
    
    // Get existing tax_query
    $tax_query = $query->get('tax_query');
    if (!is_array($tax_query)) {
        $tax_query = array();
    }
    
    // Cek apakah sudah ada filter trip_types
    $has_trip_type_filter = false;
    foreach ($tax_query as $tq) {
        if (is_array($tq) && isset($tq['taxonomy']) && $tq['taxonomy'] === 'trip_types') {
            $has_trip_type_filter = true;
            break;
        }
    }
    
    // Hanya tambahkan jika belum ada
    if (!$has_trip_type_filter) {
        $tax_query[] = array(
            'taxonomy' => 'trip_types',
            'field'    => 'slug',
            'terms'    => $user_type,
            'operator' => 'IN',
        );
        
        if (count($tax_query) > 1) {
            $tax_query['relation'] = 'AND';
        }
        
        $query->set('tax_query', $tax_query);
        
        // Debug log
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('WTE Query Filter Applied: ' . $user_type);
        }
    }
}
add_action('pre_get_posts', 'wte_filter_all_trip_queries', 999); // Priority tinggi

/**
 * Filter untuk query args yang digunakan oleh blocks
 * Hook ini khusus untuk WTE blocks
 */
function wte_modify_block_query_args($query_args, $block_attributes) {
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $query_args;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $query_args;
    }
    
    // Ensure tax_query exists
    if (!isset($query_args['tax_query'])) {
        $query_args['tax_query'] = array();
    }
    
    // Add trip_types filter
    $query_args['tax_query'][] = array(
        'taxonomy' => 'trip_types',
        'field'    => 'slug',
        'terms'    => $user_type,
        'operator' => 'IN',
    );
    
    // Set relation
    if (count($query_args['tax_query']) > 1) {
        $query_args['tax_query']['relation'] = 'AND';
    }
    
    return $query_args;
}

// Coba berbagai hook yang mungkin digunakan WTE
add_filter('wptravelengine_block_trips_query_args', 'wte_modify_block_query_args', 10, 2);
add_filter('wte_block_query_args', 'wte_modify_block_query_args', 10, 2);
add_filter('wptravelengine/blocks/trips/query', 'wte_modify_block_query_args', 10, 2);

/**
 * JavaScript-based filtering sebagai fallback
 * Jika PHP filter tidak bekerja, kita filter di frontend via JS
 */
function wte_add_frontend_filter_script() {
    // Hanya load jika ada cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    ?>
    <script>
    (function($) {
        'use strict';
        
        var userType = '<?php echo esc_js($user_type); ?>';
        
        // Function untuk filter trips di frontend
        function filterTripsInBlock() {
            // Cari semua trip cards
            $('.category-trip, .trip-item, [class*="trip-"], article.trip').each(function() {
                var $trip = $(this);
                
                // Cek apakah trip ini punya class atau data attribute untuk trip type
                var tripTypes = $trip.data('trip-types') || '';
                
                // Jika tidak ada data-trip-types, coba cari dari class atau link
                if (!tripTypes) {
                    var $typeLinks = $trip.find('.trip-types a, .trip-type a, [class*="trip-type"]');
                    if ($typeLinks.length) {
                        var types = [];
                        $typeLinks.each(function() {
                            var href = $(this).attr('href') || '';
                            var text = $(this).text().toLowerCase();
                            types.push(text);
                        });
                        tripTypes = types.join(',');
                    }
                }
                
                // Filter berdasarkan user type
                if (tripTypes) {
                    if (tripTypes.toLowerCase().indexOf(userType) === -1) {
                        $trip.hide();
                        console.log('Hiding trip (wrong type):', $trip);
                    }
                }
            });
        }
        
        // Jalankan saat document ready
        $(document).ready(function() {
            console.log('WTE Frontend Filter Active: ' + userType);
            
            // Delay sedikit untuk memastikan block sudah render
            setTimeout(filterTripsInBlock, 500);
        });
        
        // Re-run saat block di-load via AJAX (jika ada infinite scroll, dll)
        $(document).on('DOMNodeInserted', function(e) {
            if ($(e.target).hasClass('category-trip') || $(e.target).hasClass('trip-item')) {
                filterTripsInBlock();
            }
        });
        
    })(jQuery);
    </script>
    <?php
}
add_action('wp_footer', 'wte_add_frontend_filter_script', 999);

/**
 * Tambahkan data attribute ke trip items untuk memudahkan filtering
 */
function wte_add_trip_type_data_attribute($post_classes, $class, $post_id) {
    // Hanya untuk post type trip
    if (get_post_type($post_id) !== 'trip') {
        return $post_classes;
    }
    
    // Get trip types
    $trip_types = get_the_terms($post_id, 'trip_types');
    
    if ($trip_types && !is_wp_error($trip_types)) {
        $type_slugs = array();
        foreach ($trip_types as $type) {
            $type_slugs[] = $type->slug;
            $post_classes[] = 'has-trip-type-' . $type->slug;
        }
        
        // Tambahkan sebagai class juga
        $post_classes[] = 'trip-types-' . implode('-', $type_slugs);
    }
    
    return $post_classes;
}
add_filter('post_class', 'wte_add_trip_type_data_attribute', 10, 3);

/**
 * Alternative: Inject CSS untuk hide trips yang tidak sesuai
 */
function wte_inject_filter_css() {
    if (!isset($_COOKIE['wte_user_type'])) {
        return;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    $hide_type = ($user_type === 'personal') ? 'corporate' : 'personal';
    
    ?>
    <style>
        /* Hide trips yang tidak sesuai user type */
        .has-trip-type-<?php echo esc_attr($hide_type); ?>:not(.has-trip-type-<?php echo esc_attr($user_type); ?>) {
            display: none !important;
        }
        
        /* Debug: highlight trips yang sesuai */
        <?php if (defined('WP_DEBUG') && WP_DEBUG): ?>
        .has-trip-type-<?php echo esc_attr($user_type); ?> {
            border: 2px solid green !important;
        }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'wte_inject_filter_css', 999);

/**
 * Debug function: tampilkan info trip types di console
 */
function wte_debug_trip_info() {
    if (!isset($_COOKIE['wte_user_type']) || !defined('WP_DEBUG') || !WP_DEBUG) {
        return;
    }
    
    ?>
    <script>
    console.log('%c WTE Filter Debug ', 'background: #2196F3; color: white; font-weight: bold; padding: 5px;');
    console.log('User Type:', '<?php echo esc_js($_COOKIE['wte_user_type']); ?>');
    console.log('Available Filters:', 'CSS class-based, JavaScript-based, PHP query-based');
    
    // Log all trips found on page
    jQuery(document).ready(function($) {
        var trips = $('.category-trip, .trip-item, article.trip');
        console.log('Trips found on page:', trips.length);
        
        trips.each(function(index) {
            console.log('Trip ' + (index + 1) + ':', {
                classes: this.className,
                html: $(this).html().substring(0, 100)
            });
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'wte_debug_trip_info', 998);