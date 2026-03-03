<?php
/**
 * Plugin Name: WP Travel Engine - Personal Voucher System
 * Plugin URI: https://balitopholiday.com
 * Description: Sistem voucher personal untuk WP Travel Engine - voucher dapat dikirim ke user tertentu atau broadcast ke semua user
 * Version: 1.1.0
 * Author: Bali Top Holiday
 * Text Domain: wte-personal-voucher
 * Requires at least: 5.9
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) exit;

define('WTE_PV_VERSION', '1.1.0');
define('WTE_PV_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WTE_PV_PLUGIN_URL', plugin_dir_url(__FILE__));

class WTE_Personal_Voucher_System {
    
    private static $instance = null;
    
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        add_action('admin_init', array($this, 'check_dependencies'));
        add_action('init', array($this, 'init'));
        
        if (is_admin()) {
            add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
            add_action('add_meta_boxes_wte-coupon', array($this, 'add_voucher_meta_boxes'));
            add_action('save_post_wte-coupon', array($this, 'save_voucher_meta'), 10, 2);
            add_action('admin_menu', array($this, 'add_history_menu'), 99);
            add_action('admin_notices', array($this, 'show_admin_notice'));
        }
        
        // AJAX handlers
        add_action('wp_ajax_wte_pv_send_voucher', array($this, 'ajax_send_voucher'));
        add_action('wp_ajax_wte_pv_broadcast_voucher', array($this, 'ajax_broadcast_voucher'));
        add_action('wp_ajax_wte_pv_search_users', array($this, 'ajax_search_users'));
    }
    
    public function check_dependencies() {
        if (!class_exists('Wp_Travel_Engine')) {
            add_action('admin_notices', array($this, 'dependency_notice'));
            deactivate_plugins(plugin_basename(__FILE__));
        }
    }
    
    public function dependency_notice() {
        ?>
        <div class="notice notice-error">
            <p><strong>WP Travel Engine - Personal Voucher System</strong> memerlukan plugin <strong>WP Travel Engine</strong>.</p>
        </div>
        <?php
    }
    
    public function show_admin_notice() {
        global $pagenow;
        
        if ($pagenow === 'plugins.php' && get_transient('wte_pv_activated')) {
            delete_transient('wte_pv_activated');
            ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>✅ Personal Voucher System Aktif!</strong></p>
                <p>Pergi ke <strong>WP Travel Engine → Coupons</strong> → Edit coupon untuk melihat fitur distribusi voucher di sidebar kanan.</p>
            </div>
            <?php
        }
    }
    
    public function init() {
        $this->create_tables();
        load_plugin_textdomain('wte-personal-voucher', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    public function create_tables() {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'wte_user_vouchers';
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT,
            user_id bigint(20) NOT NULL,
            coupon_id bigint(20) NOT NULL,
            coupon_code varchar(100) NOT NULL,
            status varchar(20) NOT NULL DEFAULT 'active',
            assigned_date datetime NOT NULL,
            used_date datetime DEFAULT NULL,
            booking_id bigint(20) DEFAULT NULL,
            sent_by bigint(20) DEFAULT NULL,
            notes text,
            PRIMARY KEY (id),
            KEY user_id (user_id),
            KEY coupon_id (coupon_id),
            KEY status (status),
            KEY user_coupon (user_id, coupon_id)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        
        update_option('wte_pv_db_version', WTE_PV_VERSION);
    }
    
    public function admin_scripts($hook) {
        global $post_type;
        
        if (('post.php' === $hook || 'post-new.php' === $hook) && 'wte-coupon' === $post_type) {
            // Select2
            wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
            wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), null, true);
            
            // Plugin styles & scripts
            wp_enqueue_style('wte-pv-admin', WTE_PV_PLUGIN_URL . 'assets/css/admin.css', array(), WTE_PV_VERSION);
            wp_enqueue_script('wte-pv-admin', WTE_PV_PLUGIN_URL . 'assets/js/admin.js', array('jquery', 'select2'), WTE_PV_VERSION, true);
            
            // Localize
            wp_localize_script('wte-pv-admin', 'wtePvAdmin', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('wte_pv_nonce'),
                'strings' => array(
                    'sending' => __('Mengirim voucher...', 'wte-personal-voucher'),
                    'success' => __('Berhasil!', 'wte-personal-voucher'),
                    'error' => __('Terjadi kesalahan.', 'wte-personal-voucher'),
                    'confirmBroadcast' => __('Kirim voucher ini ke semua user?', 'wte-personal-voucher'),
                    'selectUser' => __('Pilih minimal 1 user', 'wte-personal-voucher'),
                    'searching' => __('Mencari...', 'wte-personal-voucher'),
                    'noResults' => __('Tidak ada hasil', 'wte-personal-voucher'),
                )
            ));
        }
    }
    
    public function add_history_menu() {
        add_submenu_page(
            'edit.php?post_type=trip',
            __('History Voucher', 'wte-personal-voucher'),
            __('History Voucher', 'wte-personal-voucher'),
            'manage_options',
            'wte-pv-voucher-history',
            array($this, 'render_history_page')
        );
    }
    
    public function add_voucher_meta_boxes() {
        add_meta_box(
            'wte-pv-distribution',
            __('📤 Distribusi Voucher', 'wte-personal-voucher'),
            array($this, 'render_distribution_metabox'),
            'wte-coupon',
            'side',
            'high'
        );
        
        add_meta_box(
            'wte-pv-stats',
            __('📊 Statistik Penggunaan', 'wte-personal-voucher'),
            array($this, 'render_stats_metabox'),
            'wte-coupon',
            'side',
            'default'
        );
    }
    
    public function render_distribution_metabox($post) {
        wp_nonce_field('wte_pv_save_voucher', 'wte_pv_nonce');
        
        $is_personal = get_post_meta($post->ID, '_wte_pv_is_personal', true);
        $one_time_use = get_post_meta($post->ID, '_wte_pv_one_time_use', true);
        $allow_duplicate = get_post_meta($post->ID, '_wte_pv_allow_duplicate', true);
        ?>
        <div class="wte-pv-box">
            <p style="margin:5px 0;">
                <label>
                    <input type="checkbox" name="wte_pv_is_personal" value="1" <?php checked($is_personal, '1'); ?>>
                    <strong><?php _e('Voucher Personal', 'wte-personal-voucher'); ?></strong>
                </label>
                <br><small style="color:#666;"><?php _e('User tidak bisa pakai kode manual', 'wte-personal-voucher'); ?></small>
            </p>
            
            <p style="margin:5px 0;">
                <label>
                    <input type="checkbox" name="wte_pv_one_time_use" value="1" <?php checked($one_time_use, '1'); ?>>
                    <strong><?php _e('Sekali pakai per user', 'wte-personal-voucher'); ?></strong>
                </label>
            </p>
            
            <p style="margin:5px 0 15px;">
                <label>
                    <input type="checkbox" name="wte_pv_allow_duplicate" value="1" <?php checked($allow_duplicate, '1'); ?>>
                    <strong><?php _e('Izinkan kirim ulang', 'wte-personal-voucher'); ?></strong>
                </label>
                <br><small style="color:#666;"><?php _e('User bisa dapat voucher yang sama >1x', 'wte-personal-voucher'); ?></small>
            </p>
            
            <hr style="margin:15px 0;border:0;border-top:1px solid #ddd;">
            
            <h4 style="margin:5px 0 10px;font-size:13px;"><?php _e('🎯 Kirim ke User Tertentu', 'wte-personal-voucher'); ?></h4>
            <select id="wte-pv-user-select" multiple style="width:100%;"></select>
            <p style="margin:10px 0 0;">
                <button type="button" class="button button-primary" id="wte-pv-send-voucher" style="width:100%;">
                    <?php _e('📨 Kirim ke User Terpilih', 'wte-personal-voucher'); ?>
                </button>
            </p>
            
            <hr style="margin:15px 0;border:0;border-top:1px solid #ddd;">
            
            <h4 style="margin:5px 0 10px;font-size:13px;"><?php _e('📢 Broadcast ke Semua User', 'wte-personal-voucher'); ?></h4>
            <p style="font-size:12px;color:#666;margin:5px 0 10px;">
                <?php _e('Kirim voucher ini ke semua user yang terdaftar', 'wte-personal-voucher'); ?>
            </p>
            <button type="button" class="button" id="wte-pv-broadcast-voucher" data-coupon-id="<?php echo $post->ID; ?>" style="width:100%;">
                <?php _e('📣 Broadcast Sekarang', 'wte-personal-voucher'); ?>
            </button>
            
            <div id="wte-pv-result" style="margin-top:10px;display:none;"></div>
        </div>
        <?php
    }
    
    public function render_stats_metabox($post) {
        global $wpdb;
        $table = $wpdb->prefix . 'wte_user_vouchers';
        
        $total = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE coupon_id = %d", $post->ID));
        $active = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE coupon_id = %d AND status = 'active'", $post->ID));
        $used = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE coupon_id = %d AND status = 'used'", $post->ID));
        ?>
        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="padding:8px;"><strong><?php _e('Total Dikirim:', 'wte-personal-voucher'); ?></strong></td>
                <td style="padding:8px;text-align:right;"><strong><?php echo number_format($total); ?></strong></td>
            </tr>
            <tr style="background:#f9f9f9;">
                <td style="padding:8px;"><?php _e('Masih Aktif:', 'wte-personal-voucher'); ?></td>
                <td style="padding:8px;text-align:right;color:#46b450;"><strong><?php echo number_format($active); ?></strong></td>
            </tr>
            <tr>
                <td style="padding:8px;"><?php _e('Sudah Digunakan:', 'wte-personal-voucher'); ?></td>
                <td style="padding:8px;text-align:right;color:#999;"><strong><?php echo number_format($used); ?></strong></td>
            </tr>
        </table>
        <?php if ($total > 0): ?>
            <p style="margin-top:10px;">
                <a href="<?php echo admin_url('edit.php?post_type=trip&page=wte-pv-voucher-history&coupon_id=' . $post->ID); ?>" class="button" style="width:100%;text-align:center;">
                    <?php _e('📋 Lihat Detail History', 'wte-personal-voucher'); ?>
                </a>
            </p>
        <?php endif; ?>
        <?php
    }
    
    public function save_voucher_meta($post_id, $post) {
        if (!isset($_POST['wte_pv_nonce']) || !wp_verify_nonce($_POST['wte_pv_nonce'], 'wte_pv_save_voucher')) {
            return;
        }
        
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $post_id)) return;
        
        update_post_meta($post_id, '_wte_pv_is_personal', isset($_POST['wte_pv_is_personal']) ? '1' : '0');
        update_post_meta($post_id, '_wte_pv_one_time_use', isset($_POST['wte_pv_one_time_use']) ? '1' : '0');
        update_post_meta($post_id, '_wte_pv_allow_duplicate', isset($_POST['wte_pv_allow_duplicate']) ? '1' : '0');
    }
    
    public function ajax_send_voucher() {
        check_ajax_referer('wte_pv_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => 'Tidak ada izin'));
        }
        
        $coupon_id = absint($_POST['coupon_id']);
        $user_ids = isset($_POST['user_ids']) ? array_map('absint', $_POST['user_ids']) : array();
        
        if (empty($user_ids)) {
            wp_send_json_error(array('message' => 'Pilih minimal 1 user'));
        }
        
        $result = $this->assign_voucher_to_users($coupon_id, $user_ids);
        
        if ($result['success']) {
            $message = sprintf(
                '✅ Berhasil! Terkirim ke %d user',
                $result['sent']
            );
            if ($result['skipped'] > 0) {
                $message .= sprintf(' (skip %d user yang sudah punya)', $result['skipped']);
            }
            wp_send_json_success(array('message' => $message));
        } else {
            wp_send_json_error(array('message' => $result['message']));
        }
    }
    
    public function ajax_broadcast_voucher() {
        check_ajax_referer('wte_pv_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => 'Tidak ada izin'));
        }
        
        $coupon_id = absint($_POST['coupon_id']);
        
        // Get ALL users tanpa filter role
        $users = get_users(array(
            'fields' => 'ID',
            'number' => -1 // -1 = unlimited, get ALL users
        ));
        
        if (empty($users)) {
            wp_send_json_error(array('message' => 'Tidak ada user ditemukan'));
        }
        
        $result = $this->assign_voucher_to_users($coupon_id, $users);
        
        if ($result['success']) {
            $message = sprintf(
                '✅ Broadcast selesai! Terkirim ke %d user',
                $result['sent']
            );
            if ($result['skipped'] > 0) {
                $message .= sprintf(' (skip %d user yang sudah punya)', $result['skipped']);
            }
            wp_send_json_success(array('message' => $message));
        } else {
            wp_send_json_error(array('message' => $result['message']));
        }
    }
    
    public function ajax_search_users() {
        check_ajax_referer('wte_pv_nonce', 'nonce');
        
        $search = isset($_POST['search']) ? trim(sanitize_text_field($_POST['search'])) : '';
        
        // Validasi: minimal 2 karakter
        if (strlen($search) < 2) {
            wp_send_json_success(array());
            return;
        }
        
        // Search users dengan query yang lebih akurat
        global $wpdb;
        
        $search_sql = '%' . $wpdb->esc_like($search) . '%';
        
        $user_ids = $wpdb->get_col($wpdb->prepare(
            "SELECT DISTINCT u.ID 
            FROM {$wpdb->users} u
            WHERE u.user_login LIKE %s 
            OR u.user_email LIKE %s 
            OR u.display_name LIKE %s
            LIMIT 50",
            $search_sql,
            $search_sql,
            $search_sql
        ));
        
        $results = array();
        
        if (!empty($user_ids)) {
            foreach ($user_ids as $user_id) {
                $user = get_userdata($user_id);
                if ($user) {
                    $results[] = array(
                        'id' => $user->ID,
                        'text' => sprintf('%s (%s)', $user->display_name, $user->user_email)
                    );
                }
            }
        }
        
        wp_send_json_success($results);
    }
    
    private function assign_voucher_to_users($coupon_id, $user_ids) {
        global $wpdb;
        
        $coupon = get_post($coupon_id);
        if (!$coupon || $coupon->post_type !== 'wte-coupon') {
            return array('success' => false, 'message' => 'Coupon tidak ditemukan');
        }
        
        $coupon_code = get_post_meta($coupon_id, 'wp_travel_engine_coupon_code', true);
        if (empty($coupon_code)) {
            return array('success' => false, 'message' => 'Kode coupon kosong');
        }
        
        $allow_duplicate = get_post_meta($coupon_id, '_wte_pv_allow_duplicate', true);
        $table = $wpdb->prefix . 'wte_user_vouchers';
        $sent_count = 0;
        $skipped_count = 0;
        $current_user = get_current_user_id();
        
        foreach ($user_ids as $user_id) {
            // Check duplicate HANYA jika allow_duplicate TIDAK dicentang
            if ($allow_duplicate !== '1') {
                $exists = $wpdb->get_var($wpdb->prepare(
                    "SELECT id FROM $table WHERE user_id = %d AND coupon_id = %d AND status = 'active'",
                    $user_id, $coupon_id
                ));
                
                if ($exists) {
                    $skipped_count++;
                    continue;
                }
            }
            
            // Insert voucher
            $inserted = $wpdb->insert(
                $table,
                array(
                    'user_id' => $user_id,
                    'coupon_id' => $coupon_id,
                    'coupon_code' => $coupon_code,
                    'status' => 'active',
                    'assigned_date' => current_time('mysql'),
                    'sent_by' => $current_user
                ),
                array('%d', '%d', '%s', '%s', '%s', '%d')
            );
            
            if ($inserted) {
                $sent_count++;
                
                // Send email (optional, bisa di-comment jika tidak ingin kirim email)
                $this->send_voucher_email($user_id, $coupon_id, $coupon_code);
            }
        }
        
        return array(
            'success' => true,
            'sent' => $sent_count,
            'skipped' => $skipped_count
        );
    }
    
    private function send_voucher_email($user_id, $coupon_id, $coupon_code) {
        $user = get_userdata($user_id);
        if (!$user) return;
        
        $coupon = get_post($coupon_id);
        $discount_type = get_post_meta($coupon_id, 'wp_travel_engine_coupon_value_type', true);
        $discount_value = get_post_meta($coupon_id, 'wp_travel_engine_coupon_value', true);
        
        $subject = sprintf('🎁 Voucher Baru: %s', $coupon->post_title);
        
        $discount_text = ($discount_type === 'percentage') 
            ? $discount_value . '%' 
            : 'Rp ' . number_format($discount_value, 0, ',', '.');
        
        $message = sprintf(
            "Halo %s,\n\nSelamat! Anda mendapat voucher baru:\n\n🎫 Kode: %s\n💰 Diskon: %s\n\nGunakan voucher ini saat booking trip!\n\nLogin ke akun Anda untuk melihat detail voucher.\n\nSalam,\n%s",
            $user->display_name,
            $coupon_code,
            $discount_text,
            get_bloginfo('name')
        );
        
        wp_mail($user->user_email, $subject, $message);
    }
    
    public function render_history_page() {
        global $wpdb;
        $table = $wpdb->prefix . 'wte_user_vouchers';
        
        $status = isset($_GET['filter_status']) ? sanitize_text_field($_GET['filter_status']) : 'all';
        $coupon_id = isset($_GET['coupon_id']) ? absint($_GET['coupon_id']) : 0;
        
        $where = '1=1';
        if ($status !== 'all') {
            $where .= $wpdb->prepare(" AND status = %s", $status);
        }
        if ($coupon_id > 0) {
            $where .= $wpdb->prepare(" AND coupon_id = %d", $coupon_id);
        }
        
        $records = $wpdb->get_results("SELECT * FROM $table WHERE $where ORDER BY assigned_date DESC LIMIT 100");
        $coupons = get_posts(array('post_type' => 'wte-coupon', 'posts_per_page' => -1, 'post_status' => 'any'));
        
        // Stats
        $total_all = $wpdb->get_var("SELECT COUNT(*) FROM $table");
        $total_active = $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE status = 'active'");
        $total_used = $wpdb->get_var("SELECT COUNT(*) FROM $table WHERE status = 'used'");
        ?>
        <div class="wrap">
            <h1><?php _e('History Distribusi Voucher', 'wte-personal-voucher'); ?></h1>
            
            <!-- Quick Stats -->
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin:20px 0;text-align:center;">
                <div style="background:#fff;padding:20px;border:1px solid #ccc;border-radius:4px;">
                    <h2 style="margin:0;font-size:32px;color:#0073aa;"><?php echo number_format($total_all); ?></h2>
                    <p style="margin:5px 0 0;color:#666;">Total Dikirim</p>
                </div>
                <div style="background:#fff;padding:20px;border:1px solid #ccc;border-radius:4px;">
                    <h2 style="margin:0;font-size:32px;color:#46b450;"><?php echo number_format($total_active); ?></h2>
                    <p style="margin:5px 0 0;color:#666;">Masih Aktif</p>
                </div>
                <div style="background:#fff;padding:20px;border:1px solid #ccc;border-radius:4px;">
                    <h2 style="margin:0;font-size:32px;color:#999;"><?php echo number_format($total_used); ?></h2>
                    <p style="margin:5px 0 0;color:#666;">Sudah Digunakan</p>
                </div>
            </div>
            
            <!-- Filter -->
            <form method="get" style="margin:20px 0;padding:15px;background:#fff;border:1px solid #ccc;">
                <input type="hidden" name="post_type" value="trip">
                <input type="hidden" name="page" value="wte-pv-voucher-history">
                
                <label><?php _e('Status:', 'wte-personal-voucher'); ?> </label>
                <select name="filter_status">
                    <option value="all"><?php _e('Semua', 'wte-personal-voucher'); ?></option>
                    <option value="active" <?php selected($status, 'active'); ?>><?php _e('Aktif', 'wte-personal-voucher'); ?></option>
                    <option value="used" <?php selected($status, 'used'); ?>><?php _e('Digunakan', 'wte-personal-voucher'); ?></option>
                </select>
                
                <label style="margin-left:15px;"><?php _e('Voucher:', 'wte-personal-voucher'); ?> </label>
                <select name="coupon_id">
                    <option value="0"><?php _e('Semua Voucher', 'wte-personal-voucher'); ?></option>
                    <?php foreach ($coupons as $c): ?>
                        <option value="<?php echo $c->ID; ?>" <?php selected($coupon_id, $c->ID); ?>>
                            <?php echo esc_html($c->post_title); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <button type="submit" class="button" style="margin-left:10px;"><?php _e('🔍 Filter', 'wte-personal-voucher'); ?></button>
                
                <?php if ($status !== 'all' || $coupon_id > 0): ?>
                    <a href="<?php echo admin_url('edit.php?post_type=trip&page=wte-pv-voucher-history'); ?>" class="button" style="margin-left:5px;">Reset</a>
                <?php endif; ?>
            </form>
            
            <!-- Table -->
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th width="50"><?php _e('ID', 'wte-personal-voucher'); ?></th>
                        <th><?php _e('User', 'wte-personal-voucher'); ?></th>
                        <th><?php _e('Voucher', 'wte-personal-voucher'); ?></th>
                        <th><?php _e('Kode', 'wte-personal-voucher'); ?></th>
                        <th width="100"><?php _e('Status', 'wte-personal-voucher'); ?></th>
                        <th><?php _e('Tanggal Kirim', 'wte-personal-voucher'); ?></th>
                        <th><?php _e('Tanggal Pakai', 'wte-personal-voucher'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($records)): ?>
                        <tr><td colspan="7" style="text-align:center;padding:40px;color:#999;">
                            <?php _e('Tidak ada data voucher', 'wte-personal-voucher'); ?>
                        </td></tr>
                    <?php else: ?>
                        <?php foreach ($records as $r): 
                            $user = get_userdata($r->user_id);
                            $coupon = get_post($r->coupon_id);
                        ?>
                            <tr>
                                <td><?php echo $r->id; ?></td>
                                <td>
                                    <?php if ($user): ?>
                                        <strong><?php echo esc_html($user->display_name); ?></strong><br>
                                        <small style="color:#666;"><?php echo esc_html($user->user_email); ?></small>
                                    <?php else: ?>
                                        <em style="color:#999;">User dihapus</em>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $coupon ? esc_html($coupon->post_title) : '<em style="color:#999;">Dihapus</em>'; ?></td>
                                <td><code style="background:#f0f0f0;padding:3px 6px;border-radius:3px;"><?php echo esc_html($r->coupon_code); ?></code></td>
                                <td>
                                    <?php if ($r->status === 'active'): ?>
                                        <span style="color:#46b450;font-weight:600;">● Aktif</span>
                                    <?php else: ?>
                                        <span style="color:#999;">● Digunakan</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date_i18n('d M Y, H:i', strtotime($r->assigned_date)); ?></td>
                                <td><?php echo $r->used_date ? date_i18n('d M Y, H:i', strtotime($r->used_date)) : '-'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            
            <?php if (count($records) >= 100): ?>
                <p style="margin-top:15px;padding:10px;background:#fffbcc;border-left:4px solid:#ffb900;">
                    <strong>ℹ️ Informasi:</strong> Menampilkan 100 record terakhir. Gunakan filter untuk melihat data spesifik.
                </p>
            <?php endif; ?>
        </div>
        <?php
    }
}

function wte_pv_init() {
    return WTE_Personal_Voucher_System::get_instance();
}
add_action('plugins_loaded', 'wte_pv_init');

register_activation_hook(__FILE__, 'wte_pv_activate');
function wte_pv_activate() {
    set_transient('wte_pv_activated', true, 30);
    $plugin = WTE_Personal_Voucher_System::get_instance();
}
