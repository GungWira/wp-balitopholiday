<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Pastikan meta point user ada
 */
function bth_ensure_user_point_meta( $user_id ) {
    if ( get_user_meta($user_id, 'bth_points_total', true) === '' ) {
        update_user_meta($user_id, 'bth_points_total', 0);
        update_user_meta($user_id, 'bth_points_used', 0);
        update_user_meta($user_id, 'bth_points_available', 0);
    }
}

/**
 * Ambil saldo point user
 */
function bth_get_user_point_balance( $user_id ) {
    bth_ensure_user_point_meta($user_id);

    return [
        'total'     => (int) get_user_meta($user_id, 'bth_points_total', true),
        'used'      => (int) get_user_meta($user_id, 'bth_points_used', true),
        'available' => (int) get_user_meta($user_id, 'bth_points_available', true),
    ];
}

/**
 * Tambah / kurangi point (SATU PINTU)
 */
function bth_add_point_log( array $args ) {
    global $wpdb;

    $defaults = [
        'user_id'      => 0,
        'type'         => '', // earn | spend
        'source'       => '',
        'reference_id' => null,
        'points'       => 0,
        'note'         => '',
    ];

    $args = wp_parse_args($args, $defaults);

    if ( ! $args['user_id'] || ! in_array($args['type'], ['earn','spend'], true) ) {
        return false;
    }

    bth_ensure_user_point_meta($args['user_id']);

    $balance = bth_get_user_point_balance($args['user_id']);

    // validasi spend
    if ( $args['type'] === 'spend' && $balance['available'] < $args['points'] ) {
        return false;
    }

    // hitung saldo baru
    if ( $args['type'] === 'earn' ) {
        $new_total     = $balance['total'] + $args['points'];
        $new_used      = $balance['used'];
        $new_available = $balance['available'] + $args['points'];
    } else {
        $new_total     = $balance['total'];
        $new_used      = $balance['used'] + $args['points'];
        $new_available = $balance['available'] - $args['points'];
    }

    // insert log
    $table = $wpdb->prefix . 'bth_point_logs';

    $inserted = $wpdb->insert(
        $table,
        [
            'user_id'       => $args['user_id'],
            'type'          => $args['type'],
            'source'        => $args['source'],
            'reference_id'  => $args['reference_id'],
            'points'        => (int) $args['points'],
            'balance_after' => (int) $new_available,
            'note'          => $args['note'],
            'created_at'    => current_time('mysql'),
        ],
        ['%d','%s','%s','%d','%d','%d','%s','%s']
    );

    if ( ! $inserted ) return false;

    // update meta
    update_user_meta($args['user_id'], 'bth_points_total', $new_total);
    update_user_meta($args['user_id'], 'bth_points_used', $new_used);
    update_user_meta($args['user_id'], 'bth_points_available', $new_available);

    return true;
}
