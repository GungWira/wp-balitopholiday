<?php
/**
 * Register custom block pattern categories and patterns
 */

/**
 * Register custom pattern category (BTH Patterns)
 */
add_filter( 'travelverse_block_pattern_categories', function ( $categories ) {

    $categories['bth-patterns'] = array(
        'label'       => __( 'BTH Patterns', 'travelverse-child' ),
        'description' => __( 'Custom patterns from TravelVerse Child Theme', 'travelverse-child' ),
        'categoryTypes' => array( 'travelverse' ),
    );

    return $categories;
});

/**
 * Register custom block patterns
 */
add_filter( 'travelverse_block_patterns', function ( $patterns ) {

    $child_patterns = array(
        'frontpage/hero-section',
        'frontpage/about-section',
        'frontpage/about-two-section',
        'frontpage/recommendation-package-section',
        'frontpage/favorite-destination-section',
        'frontpage/video-section',
        
        'frontpage/testimonial-section',
        'frontpage/header-section',
        'frontpage/footer-section',
    );

    return array_merge( $patterns, $child_patterns );
});
