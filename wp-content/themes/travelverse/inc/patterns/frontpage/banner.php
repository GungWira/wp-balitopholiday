<?php
/**
 * Title: Banner
 * Slug: banner
 * Categories: travelverse-patterns
 * Keywords: Banner
 */

return array(
    'title'      => __( 'Banner', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'banner', 'banner-section' ),
    'content'   => '
    <!-- wp:group {"tagName":"main","metadata":{"name":"Banner"},"align":"full","style":{"spacing":{"padding":{"right":"32px","left":"32px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-right:32px;padding-left:32px"><!-- wp:cover {"url":" ' . esc_url(get_theme_file_uri('/assets/images/banner-img.webp') )  .'","id":22,"dimRatio":60,"overlayColor":"black","isUserOverlayColor":true,"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}},"heading":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"32px"},"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-background-color has-text-color has-link-color" style="border-radius:32px;padding-top:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--100)"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-22" alt="" src=" ' . esc_url(get_theme_file_uri('/assets/images/banner-img.webp') )  .'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Title"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"115px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:115px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.18"},"spacing":{"margin":{"top":"0px"}}},"fontSize":"xxxx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xxxx-large-font-size" style="margin-top:0px;line-height:1.18">'. esc_html__('Discover Your Next Great Adventure!', 'travelverse'). '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'. esc_html__('Book your adventure with confidence and explore with peace of mind.', 'travelverse') . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:wptravelengine/trip-search {"layoutFilters":{"showDropdownIcon":true,"showIcons":true,"showFilterLabels":true,"showDestinations":true,"showDateSelector":false,"showActivities":true,"showDurationRange":true,"showPriceRange":true,"showTitle":false,"showSubtitle":false}} /-->

<!-- wp:spacer {"height":"114px","className":"is-style-has-mb-50","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:114px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></main>
<!-- /wp:group -->     '
);

