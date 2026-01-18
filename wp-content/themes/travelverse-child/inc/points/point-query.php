<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Ambil histori point user
 */
function bth_get_point_logs( $user_id, $limit = 20, $offset = 0 ) {
    global $wpdb;

    $table = $wpdb->prefix . 'bth_point_logs';

    return $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table
             WHERE user_id = %d
             ORDER BY created_at DESC
             LIMIT %d OFFSET %d",
            $user_id,
            $limit,
            $offset
        ),
        ARRAY_A
    );
}
