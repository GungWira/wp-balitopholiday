<?php
/**
 * TravelVerse Admin Notices
 *
 * @package  TravelVerse
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Travelverse_Admin_Notice' ) ) :

	/**
	 * TravelVerse Admin Notices
	 */
	class Travelverse_Admin_Notice {
		/**
		 * @since 1.0.0
		 */
		public function __construct() {
            add_action( 'admin_notices', array( $this, 'admin_notices' ), 99 );
			add_action( 'wp_ajax_travelverse_dismiss_notice', array( $this, 'travelverse_dismiss_notices' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Output admin notices.
		 *
		 * @since 1.0.0
		 */
		public function admin_notices() {
			global $pagenow;

			if ( true === (bool) get_option( 'travelverse_notice_dismissed' ) ) {
				return;
			}
			if ( 'themes.php' === $pagenow  && !( isset( $_GET['page'] ) && $_GET['page'] == 'travelverse-dashboard' ) ) { ?>
			<div class="notice notice-info dashedit-dismiss-btn is-dismissible">
				<div class="dashedit-install-notification">
					<div class="text">
						<h1 class="dashedit-notification-title"><?php esc_html_e( 'Start with Ready-Made Templates', 'travelverse' ); ?></h1>
						<p class="dashedit-notification-desc"><?php esc_html_e( 'TravelVerse is a feature-rich Full Site Editing (FSE) theme with lots of pre-built patterns and templates for beautiful a professional website using Gutenberg Editor.', 'travelverse' ); ?></p>
						<div class="links">
							<a class="dashedit-btn btn-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=travelverse-dashboard' ) ); ?>"> <?php esc_html_e( 'Go to Dashboard', 'travelverse' ); ?></a>
							<a class="dashedit-btn btn-secondary" rel="nofollow" target="_blank" href="https://wptravelengine.com/wordpress-travel-themes/travelverse/?utm_source=travelverse&utm_medium=dashboard&utm_campaign=theme_demo"><?php esc_html_e( 'Learn More', 'travelverse' ); ?></a>
						</div>

					</div>
					<div class="image">
						<img src="<?php echo esc_url( get_theme_file_uri('/assets/images/welcometotravelverse.png')); ?>" alt="<?php esc_attr_e( 'Banner Image', 'travelverse' ); ?>">
					</div>
				</div>
			</div>
			<?php
			}
		}

        /**
		 * Enqueue scripts.
		 *
		 * @since 2.2.0
		 */
		public function enqueue_scripts() {

			$suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			
			wp_enqueue_style(
				'travelverse-admin-notices',
				get_theme_file_uri( 'assets/css/admin' . $suffix . '.css' ),
				array(),
				TRAVELVERSE_VERSION
			);

			wp_enqueue_script( 'travelverse-admin-notices', get_template_directory_uri() . '/assets/js/admin' . $suffix . '.js', array( 'jquery' ), TRAVELVERSE_VERSION, 'all' );

			$admin_nonce = array(
				'nonce' => wp_create_nonce( 'travelverse_notice_dismiss' ),
			);

			wp_localize_script( 'travelverse-admin-notices', 'travelverseNotices', $admin_nonce );
		}

		/**
		 * AJAX dismiss notice.
		 *
		 * @since 1.0.0
		 */
		public function travelverse_dismiss_notices() {
			if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'travelverse_notice_dismiss' ) || ! current_user_can( 'manage_options' ) ) { // WPCS: input var ok.
				die();
			}

			update_option( 'travelverse_notice_dismissed', true );
		}

	}

endif;

return new Travelverse_Admin_Notice();
