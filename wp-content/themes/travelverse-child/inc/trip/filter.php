<?php
/**
 * Trip Filter berdasarkan User Type
 * File ini memfilter trips yang ditampilkan berdasarkan cookie wte_user_type
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter utama untuk semua query trips
 * Hook: pre_get_posts
 */
function wte_filter_trips_by_user_type($query) {
    // Jangan jalankan di admin area
    if (is_admin()) {
        return;
    }
    
    // Hanya untuk main query
    if (!$query->is_main_query()) {
        return;
    }
    
    // Cek apakah cookie user type sudah ada
    if (!isset($_COOKIE['wte_user_type'])) {
        return; // Tidak ada filter jika belum pilih
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi user type
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return;
    }
    
    // Filter untuk post type 'trip' (WP Travel Engine)
    $post_type = $query->get('post_type');
    
    // Apply filter untuk:
    // 1. Archive trip
    // 2. Taxonomy pages (destinations, activities, trip_types)
    // 3. Search results yang include trips
    $is_trip_query = false;
    
    if ($post_type === 'trip' || 
        is_post_type_archive('trip') || 
        is_tax('destination') || 
        is_tax('activities') || 
        is_tax('trip_types')) {
        $is_trip_query = true;
    }
    
    // Untuk search results, cek apakah termasuk trip
    if (is_search()) {
        $search_post_types = $query->get('post_type');
        if (empty($search_post_types) || (is_array($search_post_types) && in_array('trip', $search_post_types)) || $search_post_types === 'trip') {
            $is_trip_query = true;
        }
    }
    
    if (!$is_trip_query) {
        return;
    }
    
    // Ambil tax_query yang sudah ada
    $tax_query = $query->get('tax_query');
    
    if (!is_array($tax_query)) {
        $tax_query = array();
    }
    
    // Tambahkan filter trip_types
    $tax_query[] = array(
        'taxonomy' => 'trip_types',
        'field'    => 'slug',
        'terms'    => $user_type, // 'personal' atau 'corporate'
        'operator' => 'IN',
    );
    
    // Set relation jika ada multiple tax queries
    if (count($tax_query) > 1) {
        $tax_query['relation'] = 'AND';
    }
    
    // Update query
    $query->set('tax_query', $tax_query);
    
    // Debug log (optional, hapus setelah testing)
    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('WTE Filter Applied: User Type = ' . $user_type);
    }
}
add_action('pre_get_posts', 'wte_filter_trips_by_user_type', 20);

/**
 * Filter untuk WP Travel Engine Blocks & Widgets
 * Hook ini untuk Gutenberg blocks dan widgets WTE
 */
function wte_filter_block_query_args($args) {
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $args;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $args;
    }
    
    // Pastikan tax_query ada
    if (!isset($args['tax_query'])) {
        $args['tax_query'] = array();
    }
    
    // Tambahkan filter trip_types
    $args['tax_query'][] = array(
        'taxonomy' => 'trip_types',
        'field'    => 'slug',
        'terms'    => $user_type,
        'operator' => 'IN',
    );
    
    // Set relation
    if (count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }
    
    return $args;
}

// Hook untuk berbagai WTE filters (coba beberapa yang umum digunakan)
add_filter('wptravelengine_trips_query_args', 'wte_filter_block_query_args', 20);
add_filter('wte_trips_query_args', 'wte_filter_block_query_args', 20);
add_filter('wpte_trips_args', 'wte_filter_block_query_args', 20);

/**
 * Filter untuk WP Travel Engine Shortcodes
 * Format: [WTE_Trips ... ]
 */
function wte_filter_shortcode_query($query_args, $attributes) {
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $query_args;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $query_args;
    }
    
    // Tambahkan tax_query
    if (!isset($query_args['tax_query'])) {
        $query_args['tax_query'] = array();
    }
    
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
add_filter('wptravelengine_shortcode_trips_args', 'wte_filter_shortcode_query', 20, 2);

/**
 * Filter untuk widget trips
 */
function wte_filter_widget_trips($args) {
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $args;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $args;
    }
    
    // Tambahkan tax_query
    if (!isset($args['tax_query'])) {
        $args['tax_query'] = array();
    }
    
    $args['tax_query'][] = array(
        'taxonomy' => 'trip_types',
        'field'    => 'slug',
        'terms'    => $user_type,
        'operator' => 'IN',
    );
    
    // Set relation
    if (count($args['tax_query']) > 1) {
        $args['tax_query']['relation'] = 'AND';
    }
    
    return $args;
}
add_filter('wte_widget_trips_args', 'wte_filter_widget_trips', 20);

/**
 * Filter untuk REST API queries (untuk blocks modern)
 */
function wte_filter_rest_query($args, $request) {
    // Cek cookie
    if (!isset($_COOKIE['wte_user_type'])) {
        return $args;
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    
    // Validasi
    if (!in_array($user_type, array('personal', 'corporate'))) {
        return $args;
    }
    
    // Filter hanya untuk post type trip
    if (isset($args['post_type']) && $args['post_type'] === 'trip') {
        if (!isset($args['tax_query'])) {
            $args['tax_query'] = array();
        }
        
        $args['tax_query'][] = array(
            'taxonomy' => 'trip_types',
            'field'    => 'slug',
            'terms'    => $user_type,
            'operator' => 'IN',
        );
        
        if (count($args['tax_query']) > 1) {
            $args['tax_query']['relation'] = 'AND';
        }
    }
    
    return $args;
}
add_filter('rest_trip_query', 'wte_filter_rest_query', 10, 2);

/**
 * Tambahkan informasi di admin bar (untuk debugging)
 * Hanya tampil jika WP_DEBUG aktif dan user login
 */
function wte_admin_bar_info($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    if (!defined('WP_DEBUG') || !WP_DEBUG) {
        return;
    }
    
    $user_type = isset($_COOKIE['wte_user_type']) ? $_COOKIE['wte_user_type'] : 'Not Set';
    $display_type = $user_type === 'personal' ? 'Personal' : ($user_type === 'corporate' ? 'Corporate' : 'Not Set');
    
    $wp_admin_bar->add_node(array(
        'id'    => 'wte-user-type',
        'title' => '🎯 Filter: ' . $display_type,
        'href'  => '#',
        'meta'  => array(
            'title' => 'Current WTE User Type Filter',
        ),
    ));
}
add_action('admin_bar_menu', 'wte_admin_bar_info', 100);

/**
 * Helper function untuk cek apakah filter aktif
 */
function wte_is_filter_active() {
    return isset($_COOKIE['wte_user_type']) && in_array($_COOKIE['wte_user_type'], array('personal', 'corporate'));
}

/**
 * Shortcode untuk debugging - tampilkan info filter
 * Usage: [wte_filter_debug]
 */
function wte_filter_debug_shortcode() {
    if (!wte_is_filter_active()) {
        return '<div class="wte-debug">Filter: Tidak Aktif</div>';
    }
    
    $user_type = sanitize_text_field($_COOKIE['wte_user_type']);
    $display_type = $user_type === 'personal' ? 'Personal' : 'Corporate';
    
    // Count trips untuk masing-masing tipe
    $personal_count = wp_count_posts_by_tax('trip', 'trip_types', 'personal');
    $corporate_count = wp_count_posts_by_tax('trip', 'trip_types', 'corporate');
    
    ob_start();
    ?>
    <div style="background: #f0f0f0; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #2196F3;">
        <h4 style="margin: 0 0 10px 0;">🔍 Filter Debug Info</h4>
        <p style="margin: 5px 0;"><strong>Filter Aktif:</strong> <?php echo esc_html($display_type); ?></p>
        <p style="margin: 5px 0;"><strong>Cookie Value:</strong> <?php echo esc_html($user_type); ?></p>
        <p style="margin: 5px 0;"><strong>Personal Trips:</strong> <?php echo esc_html($personal_count); ?></p>
        <p style="margin: 5px 0;"><strong>Corporate Trips:</strong> <?php echo esc_html($corporate_count); ?></p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('wte_filter_debug', 'wte_filter_debug_shortcode');

/**
 * Helper function untuk count trips by taxonomy
 */
function wp_count_posts_by_tax($post_type, $taxonomy, $term_slug) {
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term_slug,
            ),
        ),
    );
    
    $query = new WP_Query($args);
    return $query->found_posts;
}

/**
 * Notice di admin jika ada trips yang belum di-assign trip type
 */
function wte_admin_notice_unassigned_trips() {
    // Hanya untuk admin yang bisa manage options
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Hanya di halaman trips
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'trip') {
        return;
    }
    
    // Count trips tanpa trip type
    $args = array(
        'post_type' => 'trip',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => 'trip_types',
                'operator' => 'NOT EXISTS',
            ),
        ),
    );
    
    $query = new WP_Query($args);
    $unassigned_count = $query->found_posts;
    
    if ($unassigned_count > 0) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <strong>⚠️ Perhatian:</strong> Ada <?php echo $unassigned_count; ?> trip yang belum memiliki Trip Type (Personal/Corporate). 
                Trips ini tidak akan muncul saat filter aktif. 
                <a href="<?php echo admin_url('edit.php?post_type=trip'); ?>">Assign Trip Type sekarang</a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'wte_admin_notice_unassigned_trips');