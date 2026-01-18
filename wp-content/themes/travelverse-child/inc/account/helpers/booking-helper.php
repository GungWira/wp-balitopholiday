<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Ambil & normalisasi data booking untuk card
 *
 * @param int    $booking_id
 * @param string $context upcoming | completed
 * @return array|null
 */
function bth_get_booking_card_data( $booking_id, $context = 'upcoming' ) {

    // status booking
    $status = get_post_meta($booking_id, 'wp_travel_engine_booking_status', true);

    if ( $context === 'upcoming' && ! in_array($status, ['pending', 'booked'], true) ) {
        return null;
    }

    // tanggal booking
    $booking_date = get_post_field('post_date', $booking_id);
    if ( ! $booking_date ) return null;

    $booking_date_fmt = date_i18n('d F Y', strtotime($booking_date));

    /**
     * === order_trips (struktur) ===
     */
    $order_trips = maybe_unserialize(
        get_post_meta($booking_id, 'order_trips', true)
    );

    if ( empty($order_trips) || ! is_array($order_trips) ) {
        return null;
    }

    $trip = reset($order_trips);

    if ( empty($trip['datetime']) || empty($trip['title']) ) {
        return null;
    }

    $trip_ts = strtotime($trip['datetime']);

    if ( $context === 'upcoming' && $trip_ts <= current_time('timestamp') ) {
        return null;
    }

    if ( $context === 'completed' && in_array($status, ['pending','booked'], true) ) {
        if ( $trip_ts > current_time('timestamp') ) {
            return null;
        }
    }

    $trip_title     = $trip['title'];
    $trip_date_fmt  = date_i18n('d F Y', $trip_ts);

    /**
     * === _initial_order_items (kebenaran transaksi) ===
     */
    $initial_items = json_decode(
        get_post_meta($booking_id, '_initial_order_items', true),
        true
    );

    if ( empty($initial_items[0]) || ! is_array($initial_items[0]) ) {
        return null; // TANPA pricing = jangan render
    }

    $item = $initial_items[0];

    // harga & paket
    if ( empty($item['cost']) || empty($item['package_name']) ) {
        return null;
    }

    $trip_cost    = number_format($item['cost'], 0, ',', '.');
    $package_name = $item['package_name'];

    /**
     * Pax detail
     */
    $pax_details = [];
    $pricing_items = $item['_cart_item_object']['line_items']['pricing_category'] ?? [];

    foreach ( $pricing_items as $row ) {
        if ( empty($row['label']) || empty($row['quantity']) ) continue;

        $pax_details[] = [
            'label' => $row['label'],
            'qty'   => (int) $row['quantity'],
            'total' => number_format($row['total'] ?? 0, 0, ',', '.'),
        ];
    }

    /**
     * Image trip
     */
    $image = '';
    if ( ! empty($item['ID']) ) {
        $image = get_the_post_thumbnail_url($item['ID'], 'medium');
    }

    return [
        'trip_title'        => $trip_title,
        'package_name'      => $package_name,
        'status'            => $status,
        'trip_date_fmt'     => $trip_date_fmt,
        'booking_date_fmt'  => $booking_date_fmt,
        'trip_cost'         => $trip_cost,
        'pax_details'       => $pax_details,
        'image'             => $image,
    ];
}
