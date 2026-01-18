<?php
/**
 * Title: Best Offers
 * Slug: best-offers
 * Categories: travelverse-patterns
 * Keywords: Best Offers
 */

return array(
    'title'      => __( 'Best offers', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'best-offers', 'best-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Best Offers Section"},"align":"wide","style":{"spacing":{"padding":{"right":"16px","left":"16px"},"margin":{"top":"var:preset|spacing|100","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:0;padding-right:16px;padding-left:16px"><!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small-medium"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500">'. esc_html__('Best Offers', 'travelverse') . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"8px"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:8px;margin-bottom:56px">'. esc_html__('Best Tour Offers', 'travelverse') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Trips"},"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"bottom":"56px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-bottom:56px"><!-- wp:wptravelengine/trips {"cardlayout":3,"filters":{"tripsCount":6,"listby":"onsale","tripsToDisplay":[]},"layoutFilters":{"showFeaturedRibbon":true,"showDescription":true,"showFeaturedImage":true,"showPrice":true,"showStrikedPrice":true,"showDuration":true,"showLocation":true,"showReviews":false,"showDiscount":true,"showActivities":false,"showTripType":false,"showGroupSize":true,"showTripAvailableTime":false,"showViewMoreButton":true,"showViewAll":false}} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button">'. esc_html__('VIEW ALL OFFERS', 'travelverse') .'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
