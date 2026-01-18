<?php
/**
 * Title: Sidebar
 * Slug: travelverse-sidebar
 * Categories: travelverse-patterns
 * Keywords: TravelVerse Sidebar
 */
return array(
	'title'      => __( 'Sidebar', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'travelverse-sidebar'),
	'content' => '
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|default","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--default);margin-bottom:56px"><!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"padding":{"top":"0","bottom":"24px"}}},"className":"is-style-travelverse-underline-heading","fontSize":"medium"} -->
<h2 class="wp-block-heading is-style-travelverse-underline-heading has-medium-font-size" style="padding-top:0;padding-bottom:24px">About Author</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:image {"id":22,"width":"120px","height":"120px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"color":[],"border":{"radius":"999px"}},"className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border is-style-default"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/author-img.webp')) .' " alt="" class="wp-image-22" style="border-radius:999px;object-fit:cover;width:120px;height:120px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300","lineHeight":"1.4"}},"fontSize":"medium-large"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-large-font-size" style="font-style:normal;font-weight:300;line-height:1.4">' . esc_html__('Isabella Summers', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.8"},"spacing":{"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","bottom":"32px","left":"var:preset|spacing|default"}}},"fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size" style="margin-top:var(--wp--preset--spacing--default);margin-right:var(--wp--preset--spacing--default);margin-bottom:32px;margin-left:var(--wp--preset--spacing--default);line-height:1.8">' . esc_html__('Her experiences, insights, and tips for conscious travel, inspires others to explore the world responsibly and make a positive impact on the places they visit.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"size":"has-small-icon-size","align":"center","style":{"spacing":{"blockGap":{"top":"20px","left":"24px"}}}} -->
<ul class="wp-block-social-links aligncenter has-small-icon-size"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"56px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:56px"><!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"padding":{"bottom":"24px"}}},"className":"is-style-travelverse-underline-heading","fontSize":"medium"} -->
<h2 class="wp-block-heading is-style-travelverse-underline-heading has-medium-font-size" style="padding-bottom:24px">' . esc_html__('Categories', 'travelverse') .'</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px","top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:categories {"style":{"typography":{"textDecoration":"none"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"spacing":{"padding":{"bottom":"24px"}}},"className":"is-style-travelverse-underline-heading","fontSize":"medium"} -->
<h2 class="wp-block-heading is-style-travelverse-underline-heading has-medium-font-size" style="padding-bottom:24px">' . esc_html__('Popular Posts', 'travelverse') . '</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:latest-posts {"postsToShow":3,"displayPostDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":100,"featuredImageSizeHeight":100,"style":{"spacing":{"padding":{"right":"var:preset|spacing|default","bottom":"var:preset|spacing|default","left":"var:preset|spacing|default","top":"24px"},"margin":{"top":"var:preset|spacing|default","right":"var:preset|spacing|default","bottom":"0px","left":"var:preset|spacing|default"}}}} /--></div>
<!-- /wp:group -->' 
);
