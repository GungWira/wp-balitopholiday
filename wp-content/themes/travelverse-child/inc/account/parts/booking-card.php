<?php
/**
 * Required variables:
 * $trip_title
 * $package_name
 * $status
 * $trip_date_fmt
 * $booking_date_fmt
 * $trip_cost
 * $pax_details
 * $image
 */
?>

<div class="bth-acc-card">
    <div class="bth-acc-card-img">
        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $trip_title ); ?>" />
    </div>

    <div class="bth-acc-card-content">
        <div class="bth-acc-card-header">
            <div class="bth-acc-card-title">
                <h2><?php echo esc_html( $trip_title ); ?></h2>
                <p><?php echo esc_html( $package_name ); ?></p>
            </div>

            <div class="bth-acc-card-badge">
                <span class="<?php echo esc_attr( $status ); ?>">
                    <?php echo esc_html( ucfirst($status) ); ?>
                </span>
            </div>
        </div>

        <div class="bth-acc-card-body">
            <div class="seperator"></div>

            <div class="table">
                <p class="book-detail">Booking Detail</p>

                <div class="table-item">
                    <p class="table-item-title">Tanggal Wisata</p>
                    <p class="table-item-description">
                        <?php echo esc_html( $trip_date_fmt ); ?>
                    </p>
                </div>

                <div class="table-item">
                    <p class="table-item-title">Detail Pax</p>
                    <div class="table-item-column">
                        <?php foreach ( $pax_details as $pax ) : ?>
                            <p class="table-item-description">
                                <?php echo esc_html( $pax['label'] ); ?>
                                (<?php echo intval( $pax['qty'] ); ?> pax)
                                — Rp <?php echo esc_html( $pax['total'] ); ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="bth-acc-card-footer">
            <div class="order_date">
                Dibooking pada: <?php echo esc_html( $booking_date_fmt ); ?>
            </div>
            <div class="price">
                Rp <?php echo esc_html( $trip_cost ); ?>
            </div>
        </div>
    </div>
</div>
