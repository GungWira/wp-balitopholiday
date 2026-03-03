<?php
/**
 * Checkout Override - Child Theme
 * Path: wp-content/themes/[child-theme]/wp-travel-engine/template-checkout/content-checkout.php
 */

$current_user = wp_get_current_user();
$user_name    = trim( $current_user->first_name . ' ' . $current_user->last_name );
if ( empty( $user_name ) ) {
	$user_name = $current_user->display_name;
}
$user_email = $current_user->user_email;

global $wte_cart;
$cart_totals      = $wte_cart->get_totals( false );
$cart_total       = isset( $cart_totals['total'] ) ? floatval( $cart_totals['total'] ) : 0;
$estimated_points = floor( $cart_total / 10000 );

if ( 'show' === ( $attributes['checkout-steps'] ?? 'show' ) ) {
	wptravelengine_get_template( 'template-checkout/content-checkout-steps.php' );
}

global $post;
$shortcode_present = has_shortcode( $post->post_content, 'WP_TRAVEL_ENGINE_PLACE_ORDER' );
if ( ! $shortcode_present ) : ?>
<main class="wpte-checkout__main bth-checkout-main">
	<div class="wpte-checkout__container bth-checkout-container">
<?php endif; ?>

<div class="bth-checkout-layout">

	<div class="bth-checkout-left">

		<!-- User Card -->
		<div class="bth-user-card">
			<div class="bth-user-card__avatar">
				<?php echo esc_html( mb_strtoupper( mb_substr( $user_name, 0, 1 ) ) ); ?>
			</div>
			<div class="bth-user-card__info">
				<p class="bth-user-card__label"><?php esc_html_e( 'Memesan sebagai', 'wp-travel-engine' ); ?></p>
				<p class="bth-user-card__name"><?php echo esc_html( $user_name ); ?></p>
				<p class="bth-user-card__email"><?php echo esc_html( $user_email ); ?></p>
			</div>
			<div class="bth-user-card__badge">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
				<?php esc_html_e( 'Terverifikasi', 'wp-travel-engine' ); ?>
			</div>
		</div>

		<!-- Points Banner -->
		<?php if ( $estimated_points > 0 ) : ?>
		<div class="bth-points-banner">
			<div class="bth-points-banner__icon">&#10022;</div>
			<div class="bth-points-banner__text">
				<strong><?php echo esc_html( sprintf( __( 'Dapatkan %s Poin', 'wp-travel-engine' ), number_format( $estimated_points, 0, ',', '.' ) ) ); ?></strong>
				<span><?php esc_html_e( 'dari pembelian ini · 1 poin tiap Rp10.000 transaksi', 'wp-travel-engine' ); ?></span>
			</div>
		</div>
		<?php endif; ?>

		<!-- Benefits Banner -->
		<div class="bth-benefits-banner">
			<div class="bth-benefits-banner__title">
				<?php esc_html_e( 'Keuntungan Perjalanan Anda', 'wp-travel-engine' ); ?>
			</div>
			<ul class="bth-benefits-banner__list">
				<li><?php esc_html_e( 'Pemandu wisata berpengalaman', 'wp-travel-engine' ); ?></li>
				<li><?php esc_html_e( 'Asuransi perjalanan inklusif', 'wp-travel-engine' ); ?></li>
				<li><?php esc_html_e( 'Poin reward di setiap transaksi', 'wp-travel-engine' ); ?></li>
				<li><?php esc_html_e( 'Dukungan 24/7 selama perjalanan', 'wp-travel-engine' ); ?></li>
			</ul>
		</div>

		<!-- Coupon -->
		<div class="bth-coupon-box">
			<div class="bth-coupon-box__header">
				<?php esc_html_e( 'Punya kode kupon?', 'wp-travel-engine' ); ?>
			</div>
			<?php do_action( 'checkout_template_parts_cart-summary' ); ?>
		</div>

		<!-- Semua disembunyikan via CSS kecuali terms checkbox + tombol submit -->
		<div class="bth-original-form">
			<?php do_action( 'checkout_template_parts_checkout-form' ); ?>
		</div>

	</div>

	<!-- Kanan: Ringkasan Pesanan -->
	<div class="bth-checkout-right">
		<div class="bth-summary-box">
			<div class="bth-summary-box__header">
				<?php esc_html_e( 'Ringkasan Pesanan', 'wp-travel-engine' ); ?>
			</div>
			<div class="bth-summary-box__content">
				<?php do_action( 'checkout_template_parts_tour-details' ); ?>
			</div>
		</div>
	</div>

</div>

<?php if ( ! $shortcode_present ) : ?>
	</div>
</main>
<?php endif; ?>

<?php wptravelengine_get_template( 'template-checkout/content-sprite-svg.php' ); ?>

<style>
header{
	border-bottom: 1px solid #ececec;
}
.entry-content{
	margin-top: 0 !important;
}
.wpte-checkout__steps{
	display: none !important;
}
.wpte-material-ui-input-control:focus-within fieldset {
    border-color: #075d37 !important;
}
.wpte-checkout__booking-summary-table .wpte-checkout__booking-summary-total td{
	background-color: #054c2c08 !important;
}
#privacy-policy,
#terms-and-conditions{
	color: #137333;
}
.wpte-checkout__form-submit button{
	background-color: #075d37 !important;
	border-radius: 4px !important;
}
.wpte-checkout__tour-details{
	background-color: white;
}
.bth-summary-box__content .wpte-checkout__box{
	padding: 0 !important;
}
.bth-summary-box__content .wpte-checkout__box .wpte-checkout__box-content{
	padding: 0 !important;
}
.wpte-checkout__booking-summary-title{
	font-family: 'Montserrat';
}
.wpte-checkout__booking-summary-payable{
	display: none;
}
.wp-block-group-is-layout-constrained{
	display: none;
}
.bth-checkout-main {
	background: #f7f8fa;
	min-height: 100vh;
	padding: 0 0 60px;
}
.bth-checkout-container {
	max-width: 1280px;
	margin: 0 auto;
	padding: 0 24px;
}
.bth-checkout-layout {
	display: grid;
	grid-template-columns: 1fr 400px;
	gap: 32px;
	align-items: start;
	padding: 0 40px;
	max-width: 1280px;
	margin-top: 0;
}

/* User Card */
.bth-user-card {
	display: flex;
	align-items: center;
	gap: 16px;
	background: #fff;
	border: 1px solid #e8eaed;
	border-radius: 16px;
	padding: 20px 24px;
	margin-bottom: 16px;
}
.bth-user-card__avatar {
	width: 48px;
	height: 48px;
	border-radius: 50%;
	background: linear-gradient(135deg, #138452, #054c2c);
	color: #fff;
	font-size: 20px;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}
.bth-user-card__info { flex: 1; }
.bth-user-card__label { font-size: 11px; color: #9aa0a6; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 0 2px; }
.bth-user-card__name { font-size: 15px; font-weight: 600; color: #202124; margin: 0 0 2px; }
.bth-user-card__email { font-size: 13px; color: #5f6368; margin: 0; }
.bth-user-card__badge {
	display: flex;
	align-items: center;
	gap: 4px;
	background: #e6f4ea;
	color: #137333;
	font-size: 12px;
	font-weight: 600;
	padding: 4px 10px;
	border-radius: 20px;
	flex-shrink: 0;
}

/* Points Banner */
.bth-points-banner {
	display: flex;
	align-items: center;
	gap: 14px;
	background: linear-gradient(135deg, #fdfffe, #fdfffe);
	border: 1px solid #075d37;
	border-radius: 14px;
	padding: 16px 20px;
	margin-bottom: 16px;
}
.bth-points-banner__icon { font-size: 24px; color: #075d37; flex-shrink: 0; }
.bth-points-banner__text { display: flex; flex-direction: column; gap: 2px; }
.bth-points-banner__text strong { font-size: 15px; color: #075d37; font-weight: 700; }
.bth-points-banner__text span { font-size: 12px; color: #795548; }

/* Benefits Banner */
.bth-benefits-banner {
	background: #fff;
	border: 1px solid #e8eaed;
	border-radius: 16px;
	padding: 20px 24px;
	margin-bottom: 16px;
}
.bth-benefits-banner__title {
	font-size: 13px;
	font-weight: 700;
	color: #202124;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	margin-bottom: 14px;
}
.bth-benefits-banner__list {
	list-style: none;
	margin: 0;
	padding: 0;
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 10px;
}
.bth-benefits-banner__list li {
	font-size: 13px;
	color: #3c4043;
	padding-left: 20px;
	position: relative;
}
.bth-benefits-banner__list li::before {
	content: '\2713';
	position: absolute;
	left: 0;
	color: #075d37;
	font-weight: 700;
}

/* Coupon Box */
.bth-coupon-box {
	background: #fff;
	border: 1px solid #e8eaed;
	border-radius: 16px;
	padding: 20px 24px;
	margin-bottom: 16px;
}
.bth-coupon-box__header {
	font-size: 13px;
	font-weight: 700;
	color: #202124;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	margin-bottom: 16px;
}
.bth-coupon-box .wpte-bf-book-summary .wpte-bf-summary-wrap,
.bth-coupon-box .wpte-bf-book-summary .wpte-bf-summary-total {
	display: none !important;
}
.wpte-checkout__coupon-form label{
	display: none;
}

.wpte-checkout__coupon-form label[for='wpte-checkout__coupon']{
	display: block !important;
}

/* Original form: sembunyikan semua kecuali terms + tombol submit */
.bth-original-form .wpte-checkout__box:not(:last-child) {
	position: absolute !important;
	width: 1px !important;
	height: 1px !important;
	overflow: hidden !important;
	opacity: 0 !important;
	clip: rect(0, 0, 0, 0) !important;
	pointer-events: none !important;
}
/* Box terakhir = payments box, tampilkan tapi sembunyikan elemen tidak perlu */
.bth-original-form .wpte-checkout__box:last-child {
	border: none !important;
	box-shadow: none !important;
	padding: 0 !important;
	margin: 0 !important;
	background: transparent !important;
}
.bth-original-form .wpte-checkout__box:last-child .wpte-checkout__box-content {
	padding: 0 !important;
}
.bth-original-form h3,
.bth-original-form .wpte-checkout__box-title,
.bth-original-form .wpte-checkout__ssl-message,
.bth-original-form [data-checkout-payment-modes],
.bth-original-form [data-checkout-payment-methods-details] {
	display: none !important;
}
.bth-original-form .wpte-checkout__term-condition {
	background: #fff;
	border: 1px solid #e8eaed;
	border-radius: 16px;
	padding: 16px 20px;
	margin-bottom: 12px;
}
.bth-original-form .wpte-checkout__form-submit { margin: 0; }
.bth-original-form .wpte-checkout__form-submit-button,
.bth-original-form [data-checkout-form-submit] button {
	width: 100%;
	background: linear-gradient(135deg, #075d37, #075d37);
	color: #fff !important;
	border: none;
	border-radius: 12px;
	padding: 16px 24px;
	font-size: 16px;
	font-weight: 700;
	cursor: pointer;
	transition: opacity 0.2s, transform 0.1s;
	display: block;
}
.bth-original-form .wpte-checkout__form-submit-button:hover,
.bth-original-form [data-checkout-form-submit] button:hover {
	opacity: 0.9;
	transform: translateY(-1px);
}

/* Summary Box */
.bth-summary-box {
	background: #fff;
	border: 1px solid #e8eaed;
	border-radius: 16px;
	overflow: hidden;
	position: sticky;
	top: 24px;
}
.bth-summary-box__header {
	padding: 18px 24px;
	font-size: 14px;
	text-transform: uppercase;
	font-weight: 700;
	color: #202124;
	border-bottom: 1px solid #e8eaed;
	background: #f8f9fa;
}
.bth-summary-box__content .wpte-checkout__box {
	border: none !important;
	border-radius: 0 !important;
	box-shadow: none !important;
	margin: 0 !important;
}
.bth-summary-box__content .wpte-checkout__form-title { display: none !important; }
.bth-summary-box__content .wpte-checkout__box-content { padding: 16px 24px !important; }

/* Responsive */
@media screen and (max-width: 1024px) {
	.bth-checkout-layout { grid-template-columns: 1fr; }
	.bth-checkout-right {order : 1}
	.bth-checkout-left {order : 2}
}
@media (max-width: 768px) {
	.bth-checkout-layout{
		padding: 0 24px;
	}
	.bth-checkout-right { order: -1; }
	.bth-benefits-banner__list { grid-template-columns: 1fr; }
	.bth-summary-box { position: static; }
}
@media screen and (max-width: 492px) {
	.bth-user-card{
		position: relative;
		flex-direction: column;
	}
	.bth-user-card__info{
		display: flex;
		flex-direction: column;
		justify-content:  center;
		align-items: center;
	}
}
@media screen and (max-width: 320px) {
	.wpte-checkout__coupon-form{
		flex-direction: column;
	}
}
</style>