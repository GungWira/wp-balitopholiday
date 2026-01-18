<?php
/**
 * Title: Popular Package
 * Slug: popular-package
 * Categories: travelverse-patterns
 * Keywords: Polupar Package
 */

return array(
    'title'      => __( 'Popular Package', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'popular-package', 'popular-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Popular Packages"},"align":"wide","style":{"spacing":{"padding":{"right":"15px","left":"15px"},"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:group {"metadata":{"name":"Section Title"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small-medium"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500">'. esc_html__('Popular Packages', 'travelverse') . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"8px"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:8px;margin-bottom:56px">'. esc_html__('Choose Best Holiday Package', 'travelverse') . '</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Trips"},"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"bottom":"56px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-bottom:56px"><!-- wp:wptravelengine/trips {"cardlayout":2,"layoutFilters":{"showFeaturedRibbon":true,"showDescription":true,"showFeaturedImage":true,"showPrice":true,"showStrikedPrice":true,"showDuration":true,"showLocation":true,"showReviews":false,"showDiscount":true,"showActivities":false,"showTripType":false,"showGroupSize":true,"showTripAvailableTime":false,"showViewMoreButton":true,"showViewAll":false}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button" href="#">'. esc_html__('VIEW ALL TOURS', 'travelverse') . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
