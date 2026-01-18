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
$point_logs = bth_get_point_logs($user_id, 10, 0);

/**
 * Generate title histori point
 */
function bth_render_point_log_title( $log ) {

    switch ( $log['source'] ) {

        case 'purchase':
            if ( ! empty($log['reference_id']) ) {
                return 'Membeli Paket: ' . get_the_title( $log['reference_id'] );
            }
            return 'Membeli Paket';

        case 'referral':
            return 'Seseorang menggunakan kode referralmu';

        case 'redeem':
            return 'Melakukan redeem koin';

        default:
            return 'Aktivitas Point';
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
                    <h3 class="bth-acc-widget-title">Total Point</h3>
                    <div class="cover">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-point-icon.svg" alt="point icon">
                        <p class="bth-acc-widget-value"><?= $points['total'] ?></p>
                    </div>
                    <a href="" class="bth-acc-button-redeem">Redeem Point</a>
                </div>
                <div class="bth-acc-widget-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-acc-point.webp" alt="">
                </div>
            </div>

            <!-- KODE REFERRAL -->
            <div class="bth-acc-widget tpoint is-clickable js-copy-referral"
                data-referral="<?= esc_attr( $referral_coupon ); ?>">

                <div class="bth-acc-main-content-widget">
                    <h3 class="bth-acc-widget-title">Kode Referral</h3>
                    <div class="cover">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-copy-icon.svg" alt="copy icon">
                        <p class="bth-acc-widget-value"><?= esc_html( $referral_coupon ); ?></p>
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
            <?php if ( empty($point_logs) ) : ?>

                <div class="bth-point-log-empty">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-placeholder-empty.webp" alt="empty point">
                    <p class="bth-empty">Belum ada riwayat point.</p>
                </div>

            <?php else : ?>

                <?php foreach ( $point_logs as $log ) :

                    $is_plus = $log['type'] === 'earn';
                    $title   = bth_render_point_log_title( $log );
                    $date    = date_i18n('d F Y', strtotime($log['created_at']));
                ?>

                    <div class="bth-acc-point-history-item <?= $is_plus ? 'plus' : 'minus'; ?>">

                        <div class="cover">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bth-point-icon.svg" alt="">
                            <p>
                                <span class="m"><?= $is_plus ? '' : '-' ?></span>
                                <span class="p"><?= $is_plus ? '+' : '' ?></span>
                                <?= abs( (int) $log['points'] ); ?>
                            </p>
                        </div>

                        <div class="text">
                            <p><?= esc_html( $title ); ?></p>
                            <span><?= esc_html( $date ); ?></span>
                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

         </div>
    </main>
</div>
