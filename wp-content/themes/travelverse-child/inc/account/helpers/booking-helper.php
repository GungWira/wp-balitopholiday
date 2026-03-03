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

    // ── Status ──────────────────────────────────────────────
    $status = get_post_meta( $booking_id, 'wp_travel_engine_booking_status', true );

    if ( $context === 'upcoming' && ! in_array( $status, [ 'pending', 'booked' ], true ) ) {
        return null;
    }

    // ── Tanggal booking dibuat ───────────────────────────────
    $booking_date = get_post_field( 'post_date', $booking_id );
    if ( ! $booking_date ) return null;
    $booking_date_fmt = date_i18n( 'd F Y', strtotime( $booking_date ) );

    // ── order_trips ──────────────────────────────────────────
    $order_trips = maybe_unserialize(
        get_post_meta( $booking_id, 'order_trips', true )
    );

    if ( empty( $order_trips ) || ! is_array( $order_trips ) ) {
        return null;
    }

    $trip = reset( $order_trips );

    if ( empty( $trip['datetime'] ) || empty( $trip['title'] ) ) {
        return null;
    }

    $trip_ts = strtotime( $trip['datetime'] );

    // filter berdasarkan context
    if ( $context === 'upcoming' && $trip_ts <= current_time( 'timestamp' ) ) {
        return null;
    }
    if ( $context === 'completed' ) {
        $is_active_status = in_array( $status, [ 'pending', 'booked' ], true );
        if ( $is_active_status && $trip_ts > current_time( 'timestamp' ) ) {
            return null;
        }
    }

    $trip_title    = $trip['title'];
    $trip_date_fmt = date_i18n( 'd F Y', $trip_ts );

    // ── cost & package_name — baca dari order_trips dulu ────
    $trip_cost    = null;
    $package_name = null;
    $pax_details  = [];

    if ( ! empty( $trip['cost'] ) ) {
        $trip_cost = number_format( (float) $trip['cost'], 0, ',', '.' );
    }
    if ( ! empty( $trip['package_name'] ) ) {
        $package_name = $trip['package_name'];
    }

    $pricing_items = $trip['_cart_item_object']['line_items']['pricing_category'] ?? [];
    foreach ( $pricing_items as $row ) {
        if ( empty( $row['label'] ) || empty( $row['quantity'] ) ) continue;
        $pax_details[] = [
            'label' => $row['label'],
            'qty'   => (int) $row['quantity'],
            'total' => number_format( $row['total'] ?? 0, 0, ',', '.' ),
        ];
    }

    // Fallback ke _initial_order_items (format booking lama)
    if ( ! $trip_cost || ! $package_name ) {
        $initial_items = json_decode(
            get_post_meta( $booking_id, '_initial_order_items', true ),
            true
        );
        $item = $initial_items[0] ?? null;

        if ( is_array( $item ) ) {
            if ( ! $trip_cost && ! empty( $item['cost'] ) ) {
                $trip_cost = number_format( (float) $item['cost'], 0, ',', '.' );
            }
            if ( ! $package_name && ! empty( $item['package_name'] ) ) {
                $package_name = $item['package_name'];
            }
            if ( empty( $pax_details ) ) {
                $pricing_items_old = $item['_cart_item_object']['line_items']['pricing_category'] ?? [];
                foreach ( $pricing_items_old as $row ) {
                    if ( empty( $row['label'] ) || empty( $row['quantity'] ) ) continue;
                    $pax_details[] = [
                        'label' => $row['label'],
                        'qty'   => (int) $row['quantity'],
                        'total' => number_format( $row['total'] ?? 0, 0, ',', '.' ),
                    ];
                }
            }
        }
    }

    // Fallback dari cart_info + booking_setting
    if ( ! $trip_cost || ! $package_name ) {
        $cart_info = maybe_unserialize(
            get_post_meta( $booking_id, 'cart_info', true )
        );
        if ( is_array( $cart_info ) ) {
            if ( ! $trip_cost && ! empty( $cart_info['total'] ) ) {
                $trip_cost = number_format( (float) $cart_info['total'], 0, ',', '.' );
            }
            if ( ! $package_name ) {
                $setting = maybe_unserialize(
                    get_post_meta( $booking_id, 'wp_travel_engine_booking_setting', true )
                );
                $package_name = $setting['place_order']['trip_package'] ?? null;
            }
        }
    }

    if ( ! $trip_cost || ! $package_name ) {
        return null;
    }

    // ── Trip image ───────────────────────────────────────────
    $image   = '';
    $trip_id = $trip['ID'] ?? 0;
    if ( $trip_id ) {
        $image = get_the_post_thumbnail_url( $trip_id, 'medium' );
    }

    // ── Display status (hanya tampilan, tidak ubah database) ─
    // pending + tanggal sudah lewat = tampilkan sebagai expired
    $display_status = $status;
    if ( $status === 'pending' && $trip_ts <= current_time( 'timestamp' ) ) {
        $display_status = 'failed';
    }

    return [
        'booking_id'        => $booking_id,
        'trip_title'        => $trip_title,
        'package_name'      => $package_name,
        'status'            => $display_status,
        'trip_date_fmt'     => $trip_date_fmt,
        'booking_date_fmt'  => $booking_date_fmt,
        'trip_cost'         => $trip_cost,
        'pax_details'       => $pax_details,
        'image'             => $image,
    ];
}