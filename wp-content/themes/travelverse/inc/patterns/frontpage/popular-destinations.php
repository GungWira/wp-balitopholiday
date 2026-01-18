<?php
/**
 * Title: Popular Destinations
 * Slug: popular-destinations
 * Categories: travelverse-patterns
 * Keywords: Popular Destinations
 */

return array(
    'title'      => __( 'Popular Destinations', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'popular-destinations', 'destination-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Destinations Section"},"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"15px","right":"15px"},"blockGap":"0","margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-top:0;padding-right:15px;padding-bottom:0;padding-left:15px"><!-- wp:group {"metadata":{"name":"Section Title"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small-medium"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500">'. esc_html__('Unforgettable Adventures', 'travelverse') . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"8px"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="margin-top:8px;margin-bottom:56px">'. esc_html__('Most Popular Destinations', 'travelverse') . '</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Destionation Lists"},"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"bottom":"56px"},"blockGap":"0"},"dimensions":{"minHeight":""}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-bottom:56px"><!-- wp:wptravelengine/destinations {"cardlayout":2,"listItems":[12,19,23,28,31,32]} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"metadata":{"name":"Destinations Button"},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":" is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button  is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button">'. esc_html__('VIEW ALL DESTINATIONS', 'travelverse') . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
