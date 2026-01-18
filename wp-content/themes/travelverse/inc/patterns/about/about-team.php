<?php
/**
 * Title: About Team
 * Slug: about-team
 * Categories: travelverse-patterns
 * Keywords: About Team
 */

return array(
    'title'      => __( 'About Team', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'about-team', 'about-team-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Expert Team"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"padding":{"right":"15px","left":"15px"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:group {"metadata":{"name":"Title"},"style":{"spacing":{"margin":{"top":"0px","bottom":"var:preset|spacing|56"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:var(--wp--preset--spacing--56)"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"24px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:24px">' . esc_html__('Expert Team', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small"} -->
<p class="has-text-align-center has-heading-color has-text-color has-link-color has-small-font-size" style="margin-top:0px">' . esc_html__('Our Team of Travel Visionaries', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"metadata":{"name":"Team List"},"align":"wide","style":{"spacing":{"blockGap":{"top":"30px","left":"34px"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"metadata":{"name":"Team Member"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37149,"width":"160px","height":"160px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-1.webp') )  .'" alt="" class="wp-image-37149" style="object-fit:contain;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"8px","top":"24px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Samantha Reynolds', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"16px","lineHeight":"1.75"}}} -->
<p class="has-text-align-center" style="margin-top:0px;font-size:16px;line-height:1.75">' .esc_html__('Founder &amp; CEO', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Team Member"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37150,"width":"160px","height":"160px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-2.webp') )  .'" alt="" class="wp-image-37150" style="object-fit:contain;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"8px","top":"24px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Michael Thompson', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"16px","lineHeight":"1.75"}}} -->
<p class="has-text-align-center" style="margin-top:0px;font-size:16px;line-height:1.75">' .esc_html__('Chief Operating Officer (COO)', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Team Member"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37147,"width":"160px","height":"160px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-3.webp') )  .'" alt="" class="wp-image-37147" style="object-fit:contain;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"8px","top":"24px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Emily Carter', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"16px","lineHeight":"1.75"}}} -->
<p class="has-text-align-center" style="margin-top:0px;font-size:16px;line-height:1.75">' .esc_html__('Head of Marketing', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Team Member"}} -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-hover-animation","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-hover-animation"><!-- wp:image {"id":37148,"width":"160px","height":"160px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","className":"is-style-default"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-default"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-4.webp') )  .'" alt="" class="wp-image-37148" style="object-fit:contain;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"8px","top":"24px"}}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Benjamin Nguyen', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0px"}},"typography":{"fontSize":"16px","lineHeight":"1.75"}}} -->
<p class="has-text-align-center" style="margin-top:0px;font-size:16px;line-height:1.75">' .esc_html__('Director of Sales', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|56","bottom":"0px"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--56);margin-bottom:0px"><!-- wp:button {"className":"is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button">' .esc_html__('VIEW ALL TEAM', 'travelverse') .'</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);