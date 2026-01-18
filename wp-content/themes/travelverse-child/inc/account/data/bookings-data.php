<?php
if ( ! defined('ABSPATH') ) exit;

function tv_get_user_bookings($user_id) {

    $booking_ids = get_user_meta($user_id, 'wp_travel_engine_user_bookings', true);
    $booking_ids = is_array($booking_ids) ? $booking_ids : [];

    $results = [];

    foreach ($booking_ids as $booking_id) {

        $status = get_post_meta($booking_id, 'wp_travel_engine_booking_status', true);
        if ( ! in_array($status, ['pending','booked'], true) ) continue;

        $order_trips = maybe_unserialize(
            get_post_meta($booking_id, 'order_trips', true)
        );
        if ( empty($order_trips) ) continue;

        $trip = reset($order_trips);
        $trip_ts = strtotime($trip['datetime']);

        $items = json_decode(
            get_post_meta($booking_id, '_initial_order_items', true),
            true
        );
        if ( empty($items[0]) ) continue;

        $item = $items[0];

        $results[] = [
            'status'       => $status,
            'booking_date' => get_post_field('post_date', $booking_id),
            'trip' => [
                'id'    => $trip['ID'],
                'title' => $trip['title'],
                'ts'    => $trip_ts,
                'image' => get_the_post_thumbnail_url($trip['ID'], 'medium'),
            ],
            'package' => [
                'name' => $item['package_name'],
                'cost' => $item['cost'],
            ],
            'pricing' => $item['_cart_item_object']['line_items']['pricing_category'] ?? [],
        ];
    }

    return $results;
}
