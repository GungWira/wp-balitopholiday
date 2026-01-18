<?php
/**
 * Title: Services
 * Slug: services
 * Categories: travelverse-patterns
 * Keywords: Services
 */

return array(
    'title'      => __( 'Services', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'services', 'services-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Services Section"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"padding":{"right":"15px","left":"15px"},"blockGap":"0"}},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"40px"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns alignwide" style="margin-top:0px;margin-bottom:0px"><!-- wp:column {"width":"22%","metadata":{"name":"Our Services"},"layout":{"type":"default"}} -->
<div class="wp-block-column" style="flex-basis:22%"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"8px"}}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color has-link-color" style="margin-bottom:8px;font-size:20px;font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('Our Service', 'travelverse') . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.33"},"spacing":{"margin":{"top":"0px","bottom":"16px"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size" style="margin-top:0px;margin-bottom:16px;font-style:normal;font-weight:400;line-height:1.33">'. esc_html__('Top Values For You', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0","top":"0px"}}}} -->
<p style="margin-top:0px;margin-bottom:0">'. esc_html__('Relax &amp; enjoy your journey while we handle the details with care.', 'travelverse') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"78%","metadata":{"name":"Services Detail"},"style":{"spacing":{"padding":{"top":"32px"}}}} -->
<div class="wp-block-column" style="padding-top:32px;flex-basis:78%"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"40px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"metadata":{"name":"Personalized Service"}} -->
<div class="wp-block-column"><!-- wp:image {"id":41,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/personalized-service.png') )  .'" alt="" class="wp-image-41" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:400">'. esc_html__('Personalized Service', 'travelverse') . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">'. esc_html__('Explore destinations perfectly matched to your interests and preferences.', 'travelverse') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Best Price Guaranteed"}} -->
<div class="wp-block-column"><!-- wp:spacer {"height":"56px","className":"is-style-has-mb-20","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-20"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":39,"width":"77px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/secure.png') )  .'" alt="" class="wp-image-39" style="object-fit:contain;width:77px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:400">'. esc_html__('Best Price Guaranteed', 'travelverse') . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">'. esc_html__('No hidden fees, no surprises. Just the best price for your dream adventure.', 'travelverse') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"24/7 Support"}} -->
<div class="wp-block-column"><!-- wp:image {"id":40,"width":"80px","height":"80px","scale":"contain","sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-full is-resized is-style-default"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/support.png') )  .'" alt="" class="wp-image-40" style="object-fit:contain;width:80px;height:80px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"32px","bottom":"8px"}}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-medium-large-font-size" style="margin-top:32px;margin-bottom:8px;font-style:normal;font-weight:400">'. esc_html__('24/7 Support', 'travelverse') . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0px"}}}} -->
<p style="margin-top:0px">'. esc_html__('Stress-free booking and expert assistance throughout your journey.', 'travelverse') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->'
);


