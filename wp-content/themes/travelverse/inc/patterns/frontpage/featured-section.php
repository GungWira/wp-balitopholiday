<?php
/**
 * Title: Featured Section
 * Slug: featured-section
 * Categories: travelverse-patterns
 * Keywords: Featured Section
 */

return array(
    'title'      => __( 'featured-section', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'featured', 'featured-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Awards Section"},"align":"wide","style":{"spacing":{"padding":{"right":"15px","left":"15px"},"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:group {"metadata":{"name":"Title"},"style":{"spacing":{"padding":{"bottom":"32px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-bottom:32px"><!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"color":{"background":"#f3f2f3"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"1px"},"spacing":{"padding":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f3f2f3;min-height:1px;padding-top:0px;padding-bottom:0px"></div>
<!-- /wp:group -->

<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"small-medium"} -->
<h2 class="wp-block-heading has-small-medium-font-size" style="font-style:normal;font-weight:300">'. esc_html__('Proud to be Awarded', 'travelverse') . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"color":{"background":"#f3f2f3"},"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"1px"},"spacing":{"padding":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f3f2f3;min-height:1px;padding-top:0px;padding-bottom:0px"></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Award Images"},"style":{"spacing":{"blockGap":"40px"}},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:image {"id":2986,"width":"185px","height":"159px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/tripadvisor-logo.webp')) .'" alt="" class="wp-image-2986" style="object-fit:contain;width:185px;height:159px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":2986,"width":"185px","height":"159px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/tripadvisor-logo.webp')) .'" alt="" class="wp-image-2986" style="object-fit:contain;width:185px;height:159px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":2986,"width":"185px","height":"159px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/tripadvisor-logo.webp')) .'" alt="" class="wp-image-2986" style="object-fit:contain;width:185px;height:159px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":2986,"width":"185px","height":"159px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/tripadvisor-logo.webp')) .'" alt="" class="wp-image-2986" style="object-fit:contain;width:185px;height:159px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":2986,"width":"185px","height":"159px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/tripadvisor-logo.webp')) .'" alt="" class="wp-image-2986" style="object-fit:contain;width:185px;height:159px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);
