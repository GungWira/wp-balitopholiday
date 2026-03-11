<?php
require_once __DIR__ . '/helpers/points-helper.php';
require_once __DIR__ . '/helpers/referral-helper.php';

if ( ! is_user_logged_in() ) {
    echo '<p>Silakan login untuk melihat point.</p>';
    return;
}

$user_id = get_current_user_id();

/**
 * Data point user
 */
$points = bth_get_user_point_balance( $user_id );

/**
 * Data referral coupon user
 */
$referral_coupon = bth_get_user_referral_coupon( $user_id );

/**
 * Data histori point user
 */
$point_logs = bth_get_point_logs( $user_id, 10, 0 );

/**
 * Generate title histori point
 */
function bth_render_point_log_title( $log ) {

    switch ( $log['source'] ) {

        case 'booking':
            if ( ! empty( $log['reference_id'] ) ) {
                // Ambil order_trips dari booking meta
                $order_trips = maybe_unserialize(
                    get_post_meta( $log['reference_id'], 'order_trips', true )
                );
                if ( is_array( $order_trips ) && ! empty( $order_trips ) ) {
                    $trip = reset( $order_trips );
                    $trip_title = $trip['title'] ?? '';
                    if ( $trip_title ) {
                        return 'Booking Paket: ' . html_entity_decode( $trip_title, ENT_QUOTES, 'UTF-8' );
                    }
                }
                return 'Booking #' . $log['reference_id'];
            }
            return 'Booking Paket Wisata';

        case 'purchase':
            if ( ! empty( $log['reference_id'] ) ) {
                return 'Membeli Paket: ' . get_the_title( $log['reference_id'] );
            }
            return 'Membeli Paket';

        case 'referral':
            return 'Seseorang menggunakan kode referralmu';

        case 'redeem':
            return 'Melakukan redeem koin';

        default:
            return ! empty( $log['note'] ) ? $log['note'] : 'Aktivitas Point';
    }
}
?>

<div class="bth-acc-container">

    <!-- SIDEBAR -->
    <?php require __DIR__ . '/parts/sidebar.php'; ?>

    <!-- MAIN -->
    <main class="bth-acc-main acc-main-point">
        <div id="bth-toast" class="bth-toast">
            Kode referral berhasil disalin 📋
        </div>

        <h1 class="bth-acc-title">Point Saya</h1>

        <!-- POINT WIDGETS -->
        <div class="bth-acc-box-widgets">

            <!-- TOTAL POINT -->
            <div class="bth-acc-widget tpoint">
                <div class="bth-acc-main-content-widget">
                    <h3 class="bth-acc-widget-title">Point Tersedia</h3>
                    <div class="cover">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-point-icon.svg" alt="point icon">
                        <p class="bth-acc-widget-value"><?php echo number_format( $points['available'], 0, ',', '.' ); ?></p>
                    </div>
                    <div class="bth-point-detail">
                        <span>Total diperoleh: <strong><?php echo number_format( $points['total'], 0, ',', '.' ); ?></strong></span>
                        <span>Terpakai: <strong><?php echo number_format( $points['used'], 0, ',', '.' ); ?></strong></span>
                    </div>
                    <a href="" class="bth-acc-button-redeem">Redeem Point</a>
                </div>
                <div class="bth-acc-widget-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-acc-point.webp" alt="">
                </div>
            </div>

            <!-- KODE REFERRAL -->
            <div class="bth-acc-widget tpoint is-clickable js-copy-referral"
                data-referral="<?php echo esc_attr( $referral_coupon ); ?>">
                <div class="bth-acc-main-content-widget">
                    <h3 class="bth-acc-widget-title">Kode Referral</h3>
                    <div class="cover">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-copy-icon.svg" alt="copy icon">
                        <p class="bth-acc-widget-value"><?php echo esc_html( $referral_coupon ); ?></p>
                    </div>
                    <span>Klik untuk menyalin kode</span>
                </div>
                <div class="bth-acc-widget-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-acc-point.webp" alt="">
                </div>
            </div>

        </div>

        <!-- POINT HISTORY -->
        <div class="bth-acc-box-history">
            <div class="bth-acc-box-history-head">
                <h2>Riwayat Point</h2>
            </div>
            <div class="bth-acc-box-history-body">

                <?php if ( empty( $point_logs ) ) : ?>

                    <div class="bth-point-log-empty">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-placeholder-empty.webp" alt="empty point">
                        <p class="bth-empty">Belum ada riwayat point.</p>
                    </div>

                <?php else : ?>

                    <?php foreach ( $point_logs as $log ) :
                        $is_plus = $log['type'] === 'earn';
                        $title   = bth_render_point_log_title( $log );
                        $date    = date_i18n( 'd F Y', strtotime( $log['created_at'] ) );
                    ?>

                        <div class="bth-acc-point-history-item <?php echo $is_plus ? 'plus' : 'minus'; ?>">
                            <div class="cover">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-point-icon.svg" alt="">
                                <p>
                                    <span class="m"><?php echo $is_plus ? '' : '-'; ?></span>
                                    <span class="p"><?php echo $is_plus ? '+' : ''; ?></span>
                                    <?php echo number_format( abs( (int) $log['points'] ), 0, ',', '.' ); ?>
                                </p>
                            </div>
                            <div class="text">
                                <p><?php echo esc_html( $title ); ?></p>
                                <span><?php echo esc_html( $date ); ?></span>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>
    </main>
</div>