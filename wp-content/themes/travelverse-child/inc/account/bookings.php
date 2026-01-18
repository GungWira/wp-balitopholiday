<?php
require_once __DIR__ . '/helpers/booking-helper.php';

if ( ! is_user_logged_in() ) {
    echo '<p>Silakan login untuk melihat dashboard.</p>';
    return;
}

$user      = wp_get_current_user();
$user_id   = $user->ID;

/**
 * Ambil semua booking milik user
 * disimpan di usermeta: wp_travel_engine_user_bookings
 */
$booking_ids = get_user_meta( $user_id, 'wp_travel_engine_user_bookings', true );
$booking_ids = is_array($booking_ids) ? $booking_ids : [];
?>

<div class="bth-acc-container">

    <!-- SIDEBAR -->
    <?php require __DIR__ . '/parts/sidebar.php'; ?>

    <!-- MAIN -->
    <main class="bth-acc-main">
        <h1 class="bth-acc-title">Perjalananmu</h1>

        <!-- SEDANG BERLANGSUNG -->
        <section class="bth-acc-section">
            <h2 class="bth-acc-section-title">Akan datang</h2>

            <?php foreach ( $booking_ids as $booking_id ) :

                $card = bth_get_booking_card_data( $booking_id, 'upcoming' );
                if ( ! $card ) continue;

                extract($card);

                require __DIR__ . '/parts/booking-card.php';

            endforeach; ?>
        </section>


        <!-- SELESAI -->
        <section class="bth-acc-section">
            <h2 class="bth-acc-section-title">Selesai</h2>

            <?php foreach ( $booking_ids as $booking_id ) :

                $card = bth_get_booking_card_data( $booking_id, 'completed' );
                if ( ! $card ) continue;

                extract($card);

                require __DIR__ . '/parts/booking-card.php';

            endforeach; ?>
        </section>

    </main>
</div>
