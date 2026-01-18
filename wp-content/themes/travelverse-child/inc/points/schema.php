<?php
if ( ! defined('ABSPATH') ) exit;

function bth_create_point_logs_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'bth_point_logs';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        type VARCHAR(10) NOT NULL,
        source VARCHAR(50) DEFAULT NULL,
        reference_id BIGINT(20) DEFAULT NULL,
        points INT NOT NULL,
        balance_after INT NOT NULL,
        note TEXT DEFAULT NULL,
        created_at DATETIME NOT NULL,
        PRIMARY KEY (id),
        KEY user_id (user_id),
        KEY type (type)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

/**
 * Jalankan sekali saja
 */
if ( ! get_option('bth_point_logs_table_created') ) {
    bth_create_point_logs_table();
    update_option('bth_point_logs_table_created', 1);
}
