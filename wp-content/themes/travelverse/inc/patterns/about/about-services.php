<?php
/**
 * Title: About Services
 * Slug: about-services
 * Categories: travelverse-patterns
 * Keywords: About Services
 */

return array(
    'title'      => __( 'About Services', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'about-services', 'about-services-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Our Services"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"padding":{"right":"15px","left":"15px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:group {"metadata":{"name":"Services Title"},"style":{"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|56"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--56)"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:24px">' . esc_html__('Our Services', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-link-color has-small-font-size" style="margin-top:0px">' . esc_html__('We offers a comprehensive range of services to meet your travel need.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"metadata":{"name":"Services List"},"align":"wide","style":{"spacing":{"blockGap":{"top":"30px","left":"34px"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"metadata":{"name":"Itinerary Planning"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37142,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/calender-dynamic.png') )  .'" alt="" class="wp-image-37142" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Itinerary Planning', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">' .esc_html__('Let us create a tailor-made itinerary that reflects your interests, preferences &amp; budget.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Expert Guidance"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37143,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/guidance.png') )  .'" alt="" class="wp-image-37143" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Expert Guidance', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">' .esc_html__('Our team of experts is here to offer personalized guidance and support every step of the way.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"24/7 Customer Support"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":40,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/support.png') )  .'" alt="" class="wp-image-40" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('24/7 Customer Support', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">' .esc_html__('Book places effortlessly with our secure platform, backed by expert support.','travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Exclusive Experiences"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37144,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/exclusive.png') )  .'" alt="" class="wp-image-37144" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Travel Logistics', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">' .esc_html__('We handle flights, accommodation and transport, so you just relax and explore.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->'
);


