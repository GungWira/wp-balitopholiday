<?php
/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function travelverse_register_block_styles(){
	register_block_style(
		'core/heading',
		array(
			'name'  => 'travelverse-underline-heading',
			'label' => esc_html__('Underline heading', 'travelverse'),
		)
	);
	register_block_style(
		'core/button',
		array(
			'name'  => 'travelverse-primary-arrow',
			'label' => esc_html__('Primary Arrow', 'travelverse'),
		)
	);
	register_block_style(
		'core/button',
		array(
			'name'  => 'travelverse-white-arrow',
			'label' => esc_html__('White Arrow', 'travelverse'),
		)
	);

	register_block_style(
		'core/post-excerpt',
		array(
			'name'  => 'show-two-lines',
			'label' => esc_html__('Show two lines', 'travelverse'),
		)
	);
	register_block_style(
		'core/post-excerpt',
		array(
			'name'  => 'show-three-lines',
			'label' => esc_html__('Show three lines', 'travelverse'),
		)
	);

	register_block_style(
		'core/columns',
		array(
			'name'  => 'mob-2-cols',
			'label' => esc_html__('Mob 2 Col', 'travelverse'),
		)
	);


	// animations

	register_block_style(
		'core/group',
		array(
			'name'  => 'hover-animation',
			'label' => esc_html__('Hover Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-up-fade-in-animation',
			'label' => esc_html__('Slide Up Fade In Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-down-fade-in-animation',
			'label' => esc_html__('Slide Down Fade In Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-left-fade-in-animation',
			'label' => esc_html__('Slide Left Fade In Animation', 'travelverse'),
		)
	);
	
	register_block_style(
		'core/group',
		array(
			'name'  => 'slide-right-fade-in-animation',
			'label' => esc_html__('Slide Right Fade In Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'clipIn',
			'label' => esc_html__('ClipIn Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'flip-left-animation',
			'label' => esc_html__('Flip Left Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'flip-right-animation',
			'label' => esc_html__('Flip Right Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'flip-up-animation',
			'label' => esc_html__('Flip Up Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'flip-down-animation',
			'label' => esc_html__('Flip Down Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-in-animation',
			'label' => esc_html__('Zoom In Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-out-animation',
			'label' => esc_html__('Zoom Out Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-in-up-animation',
			'label' => esc_html__('Zoom In Up Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-in-down-animation',
			'label' => esc_html__('Zoom In Down Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-in-right-animation',
			'label' => esc_html__('Zoom In Right Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-in-left-animation',
			'label' => esc_html__('Zoom In Left Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-out-up-animation',
			'label' => esc_html__('Zoom Out Up Animation', 'travelverse'),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-out-down-animation',
			'label' => esc_html__('Zoom Out Down Animation', 'travelverse'),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-out-right-animation',
			'label' => esc_html__('Zoom Out Right Animation', 'travelverse'),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'zoom-out-left-animation',
			'label' => esc_html__('Zoom Out Left Animation', 'travelverse'),
		)
	);


	register_block_style(
		'core/post-template',
		array(
			'name'  => 'hover-animation',
			'label' => esc_html__('Hover Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/post-title',
		array(
			'name'  => 'on-hover',
			'label' => esc_html__('Hover Animation', 'travelverse'),
		)
	);

	register_block_style(
		'core/column',
		array(
			'name'  => 'justify-right',
			'label' => esc_html__('Mobile Justify Right', 'travelverse'),
		)
	);

	register_block_style(
		'core/column',
		array(
			'name'  => 'hide-mb',
			'label' => esc_html__('Hide in Mobile', 'travelverse'),
		)
	);

	register_block_style(
		'core/buttons',
		array(
			'name'  => 'justify-right',
			'label' => esc_html__('Mobile Justify Right', 'travelverse'),
		)
	);

	register_block_style(
		'core/social-links',
		array(
			'name'  => 'social-square',
			'label' => esc_html__('Square Shape', 'travelverse'),
		)
	);

	register_block_style(
		'core/post-terms',
		array(
			'name'  => 'bg-color-terms',
			'label' => esc_html__('With Background Color', 'travelverse'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-20',
			'label' => esc_html__('Mob Gap-20px', 'travelverse'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-30',
			'label' => esc_html__('Mob Gap-30px', 'travelverse'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-40',
			'label' => esc_html__('Mob Gap-40px', 'travelverse'),
		)
	);

	register_block_style(
		'core/spacer',
		array(
			'name'  => 'has-mb-50',
			'label' => esc_html__('Mob Gap-50px', 'travelverse'),
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'  => 'clipIn',
			'label' => esc_html__('ClipIn Animation', 'travelverse'),
		)
	);
}
add_action( 'init', 'travelverse_register_block_styles' );

/**
 * Include conditional assets
 * 
 * @since 1.0.0
 */
function travelverse_theme_conditional_assets( $html, $block ){
	$block_style = '';

	if (!is_admin()) { //prevent loading conditional assets in admin
		//We use checking by class name until WordPress will have proper inline style registration for block styles
		if (isset($block['blockName'])) {
			if (!empty($block['attrs']['className'])) {
				if ($block['blockName'] == 'core/post-excerpt') {
					if (str_contains($block['attrs']['className'], 'is-style-show-two-lines') !== false) {
						$block_style .= '.is-style-show-two-lines>p{display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-two-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					} else if (str_contains($block['attrs']['className'], 'is-style-show-three-lines') !== false) {
						$block_style .= '.is-style-show-three-lines>p{display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;  overflow: hidden; margin:0} .wp-block-post-excerpt.is-style-show-three-lines .wp-block-post-excerpt__more-text{ margin-top: 24px;}';
					}
				}
			}
		}

		if ($block_style) {
			$html =  $html . '<style scoped>' . $block_style . '</style>';
		}
	}
	return $html;
}
add_filter( 'render_block', 'travelverse_theme_conditional_assets', 10, 2 );

/**
 * Enqueue the block styles
 *
 * @since 1.0.0
 */
function travelverse_register_editor_styles(){
	$suffix   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style(
		'travelverse-block-style',
		get_theme_file_uri( 'assets/css/style' . $suffix . '.css' ),
		array(),
		filemtime(get_theme_file_path( 'assets/css/style' . $suffix . '.css' ))
	);

	wp_enqueue_script(
		'travelverse-custom-scripts',
		get_theme_file_uri( 'assets/js/custom' . $suffix . '.js' ),
		array(),
		filemtime(get_theme_file_path( 'assets/js/custom' . $suffix . '.js' )),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'travelverse_register_editor_styles' );


/**
 * Enqueue admin scripts
 *
 * @since 1.0.0
 */
function travelverse_register_admin_scripts( $hook ){
	
	// Load styles only on our page
	if( 'appearance_page_travelverse-dashboard' != $hook ) return;
	
	wp_register_style(
		'travelverse-admin',
		get_theme_file_uri( 'build/admin.css' ),
		array(),
		TRAVELVERSE_VERSION
	);

	$admin_assets_file    = get_template_directory() . '/build/admin.asset.php';
	if ( file_exists( $admin_assets_file ) ) {
        $components_assets = require $admin_assets_file;
        $components_js_dependencies = ( ! empty( $components_assets['dependencies'] ) ) ? $components_assets['dependencies'] : [];
        $com_version                = ( ! empty( $components_assets['version'] ) ) ? $components_assets['version'] : TRAVELVERSE_VERSION;
        wp_register_script(
            'travelverse-admin',
            get_theme_file_uri( 'build/admin.js' ),
            $components_js_dependencies,
            $com_version,
            true
        );

		// Add Translation support for Dashboard 
        wp_set_script_translations( 'travelverse-admin', 'travelverse' );

		$installed_plugins 	= get_plugins();
		$data_action  = '';
		$button_label = esc_html__( 'Browse TravelVerse Starter Templates', 'travelverse' );

		if ( ! defined( 'DEMO_IMPORTER_PLUS_VER' ) ) {
			if ( ! isset( $installed_plugins['demo-importer-plus/demo-importer-plus.php'] ) ) {
				$button_label = esc_html__( 'Install TravelVerse Starter Templates', 'travelverse' );
				$data_action  = 'install';
			} elseif ( ! travelverse_active_plugin_check( 'demo-importer-plus/demo-importer-plus.php' ) ) {
				$button_label = esc_html__( 'Activate TravelVerse Starter Templates', 'travelverse' );
				$data_action  = 'activate';
			}
		}

        wp_localize_script( 'travelverse-admin', 'travelverse_dashboard', array(
			'ajaxUrl'              => admin_url( 'admin-ajax.php' ),
			'siteEditor'           => admin_url( 'site-editor.php' ),
			'proActivated'         => travelverse_pro_is_activated(),
			'ThemeVersion'         => TRAVELVERSE_VERSION,
			'status'           	   => $data_action,
			'starterLabel' 	       => $button_label,
			'ajax_nonce' 	   	   => wp_create_nonce( 'travelverse-ajax-verification' ),
			'starterURL' 	   	   => esc_url( admin_url( 'themes.php?page=demo-importer-plus' ) ),
			'starterTemplates' 	   => defined( 'DEMO_IMPORTER_PLUS_VER' ),
		));
    }

}
add_action( 'admin_enqueue_scripts', 'travelverse_register_admin_scripts' );


if( ! function_exists( 'travelverse_active_plugin_check' ) ) :
	/**
	 * Active Plugin Check
	 *
	 * @param string $plugin_base_name is plugin folder/filename.php.
	 */
	function travelverse_active_plugin_check( $plugin_base_name ) {
	
		$active_plugins = (array) get_option( 'active_plugins', array() );
	
		if ( is_multisite() ) {
			$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
		}
	
		return in_array( $plugin_base_name, $active_plugins, true ) || array_key_exists( $plugin_base_name, $active_plugins );
	}
	endif;

/**
 * Add Menu Page
 *
 * @return void
 */
function travelverse_add_menu_page() {

	add_theme_page(
		__( 'TravelVerse', 'travelverse' ),
		__( 'TravelVerse', 'travelverse' ),
		'edit_themes',
		'travelverse-dashboard',
		'travelverse_render_menu_page',
		'2'
	);
}
add_action( 'admin_menu', 'travelverse_add_menu_page' ) ;

/**
 * Render Menu Page
 *
 * @return void
 */
function travelverse_render_menu_page(){
	wp_enqueue_style( 'travelverse-admin' );
	wp_enqueue_script( 'travelverse-admin' );
	?>
	<div class="wrapper">
		<div id="travelverse-dashboard"></div>
	</div>
	<?php
}
/**
 * Default Removed the Archive Title and desc for FSE THEME
 */
add_filter( 'wte_trip_archive_description_page_header',function(){
	return false;
});
