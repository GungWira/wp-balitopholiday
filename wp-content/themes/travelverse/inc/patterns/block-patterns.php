<?php
/**
 * TravelVerse: Block Patterns
 *
 * Registers block patterns, categories, and type.
 */
function travelverse_register_block_patterns() {
	/**
	 * Add Block Pattern Category.
	 */
	$pattern_categories = array(
		
		'travelverse-patterns' => array(
			'label'         => __( 'TravelVerse Patterns', 'travelverse' ),
			'description'   => __( 'Patterns for sections and components', 'travelverse' ),
			'categoryTypes' => array( 'travelverse' ),
		),
		
	);
	
	/**
	 * Filters the theme block pattern categories.
	 */
	$pattern_categories = apply_filters( 'travelverse_block_pattern_categories', $pattern_categories );

    foreach ( $pattern_categories as $name => $properties ) {
		register_block_pattern_category( $name, $properties );
	}

	$block_patterns = array(
		'frontpage/banner',
		'frontpage/services',
		'frontpage/about',
		'frontpage/popular-package',
		'frontpage/featured-section',
		'frontpage/popular-destinations',
		'frontpage/best-offers',
		'frontpage/testimonials',
		'frontpage/activities',
		'frontpage/how-it-works',
		'frontpage/cta-section',
		'frontpage/blog',

		'footer/footer-pattern',
		'header/header-pattern',
		'header/header-one-pattern',

		'sidebar/travelverse-sidebar',

		'blog/post-layout-1',
		'blog/post-layout-2',

		'about/about-banner',
		'about/about-mission',
		'about/about-features',
		'about/about-services',
		'about/about-team',
		'about/about-client',
		
		'team/team-banner',
		'team/team',

		'contact/contact-form',
		'contact/faq',

	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'travelverse_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		register_block_pattern(
			'travelverse/' . $block_pattern,
			require get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' )
		);
	}

}
add_action( 'init', 'travelverse_register_block_patterns', 9 );