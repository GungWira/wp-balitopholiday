<?php
/**
 * Title: About Banner
 * Slug: about-banner
 * Categories: travelverse-patterns
 * Keywords: About Banner
 */

return array(
    'title'      => __( 'About Banner', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'about-banner', 'about-banner-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Banner Section"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"var:preset|spacing|64","bottom":"var:preset|spacing|64","left":"15px","right":"15px"}}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--64);padding-right:15px;padding-bottom:var(--wp--preset--spacing--64);padding-left:15px"><!-- wp:heading {"textAlign":"center","level":1,"align":"wide","style":{"typography":{"lineHeight":"1.3"}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading alignwide has-text-align-center has-xx-large-font-size" style="line-height:1.3">' . esc_html__('We are TravelVerse', 'travelverse') .'</h1>
<!-- /wp:heading --></div>
<!-- /wp:group -->'
);


