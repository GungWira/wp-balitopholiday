<?php
/** @var array $points */
?>

<div class="bth-point-summary">

    <div class="bth-point-card">
        <span class="label">Total Point</span>
        <strong><?= esc_html( $points['total'] ); ?></strong>
    </div>

    <div class="bth-point-card">
        <span class="label">Digunakan</span>
        <strong><?= esc_html( $points['used'] ); ?></strong>
    </div>

    <div class="bth-point-card highlight">
        <span class="label">Tersedia</span>
        <strong><?= esc_html( $points['available'] ); ?></strong>
    </div>

</div>
