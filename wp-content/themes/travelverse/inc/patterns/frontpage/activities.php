<?php
/**
 * Title: Activities
 * Slug: activities
 * Categories: travelverse-patterns
 * Keywords: Activities
 */

return array(
    'title'      => __( 'Activities', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'activities', 'activities-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Activities Section"},"align":"wide","style":{"spacing":{"padding":{"right":"16px","left":"16px"},"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:16px;padding-left:16px"><!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small-medium"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500">'. esc_html__('Most Popular', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"8px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:8px;margin-bottom:56px">'. esc_html__('Adventurous Activities', 'travelverse') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Activities"},"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"bottom":"56px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:0px;margin-bottom:0px;padding-bottom:56px"><!-- wp:wptravelengine/activities {"listItems":[13,15,20,22,23,24]} /--></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button">'. esc_html__('VIEW ALL ACTIVITIES', 'travelverse') .'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
