<?php
/**
 * Title: Testimonials
 * Slug: testimonials
 * Categories: travelverse-patterns
 * Keywords: Testimonials
 */

return array(
    'title'      => __( 'Testimonials', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'testimonials', 'testimonials-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Testimonials Section"},"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-top:0"><!-- wp:group {"metadata":{"name":"Testimonials"},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"' . esc_url(get_theme_file_uri('/assets/images/testimonials.webp') )  .'","id":2984,"dimRatio":50,"overlayColor":"transparent","isUserOverlayColor":true,"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"right":"var:preset|spacing|140","left":"var:preset|spacing|140","top":"var:preset|spacing|100","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--100);padding-right:var(--wp--preset--spacing--140);padding-bottom:0px;padding-left:var(--wp--preset--spacing--140)"><span aria-hidden="true" class="wp-block-cover__background has-transparent-background-color has-background-dim"></span><img class="wp-block-cover__image-background wp-image-2984" alt="" src="' . esc_url(get_theme_file_uri('/assets/images/testimonials.webp') )  .'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"8px","top":"0px"}}},"textColor":"primary","fontSize":"small-medium"} -->
<p class="has-text-align-center has-primary-color has-text-color has-link-color has-small-medium-font-size" style="margin-top:0px;margin-bottom:8px;font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('Testimonials', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:56px">'. esc_html__('Happy Travellers', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[trustindex no-registration=tripadvisor]
<!-- /wp:shortcode -->

<!-- wp:spacer {"height":"528px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:528px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);


