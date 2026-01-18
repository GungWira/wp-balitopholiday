<?php
/**
 * Title: Header Pattern
 * Slug: header-pattern
 * Categories: travelverse-patterns
 * Keywords: Header Pattern
 */

return array(
    'title'      => __( 'Header Pattern', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'header-pattern', 'header' ),
    'content'   => '
    <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|default","right":"15px","bottom":"var:preset|spacing|default","left":"15px"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--default);padding-right:15px;padding-bottom:var(--wp--preset--spacing--default);padding-left:15px"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"20px","padding":{"top":"20px","bottom":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:20px;padding-bottom:20px"><!-- wp:group {"align":"wide","style":{"border":{"bottom":{"width":"0px","style":"none"}},"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","orientation":"horizontal"}} -->
<div class="wp-block-group alignwide" style="border-bottom-style:none;border-bottom-width:0px"><!-- wp:group {"style":{"spacing":{"blockGap":"12px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-group"><!-- wp:site-logo {"width":45,"style":{"color":[]}} /-->

<!-- wp:site-title {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"medium"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center","orientation":"horizontal"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"full","style":{"layout":{"selfStretch":"fit","flexSize":null},"border":{"right":{"color":"#00000014","width":"1px"}},"spacing":{"padding":{"right":"24px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="border-right-color:#00000014;border-right-width:1px;padding-right:24px"><!-- wp:paragraph {"align":"right","style":{"typography":{"fontSize":"14px"},"spacing":{"margin":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}}} -->
<p class="has-text-align-right" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-size:14px">' . esc_html__('Quick Questions? Email Us', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"right":"0px","left":"0px","top":"0px","bottom":"0px"}}},"fontSize":"small"} -->
<p class="has-text-align-right has-small-font-size" style="margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px">' . esc_html__('contact@yourdomain.com', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"}}} -->
<p style="font-size:14px">' . esc_html__('Talk to an Expert (David)', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"heading","fontSize":"medium","fontFamily":"rowdies"} -->
<p class="has-heading-color has-text-color has-link-color has-rowdies-font-family has-medium-font-size" style="margin-top:0px;margin-bottom:0px;font-style:normal;font-weight:300">' . esc_html__('+01-123-456-7890', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:image {"id":6249,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/header-image.webp') )  .'" alt="" class="wp-image-6249"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.4"}},"className":"is-style-travelverse-primary-arrow"} -->
<div class="wp-block-button has-custom-font-size is-style-travelverse-primary-arrow" style="font-size:16px;font-style:normal;font-weight:500;line-height:1.4"><a class="wp-block-button__link wp-element-button">BOOK TOUR</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:separator {"align":"wide","style":{"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator alignwide has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"align":"wide","style":{"border":{"bottom":{"width":"0px","style":"none"}},"spacing":{"margin":{"top":"18px","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide" style="border-bottom-style:none;border-bottom-width:0px;margin-top:18px;margin-bottom:0"><!-- wp:navigation {"textColor":"base","className":"is-style-justify-right","layout":{"type":"flex","orientation":"horizontal","justifyContent":"left","flexWrap":"wrap"},"style":{"typography":{"fontSize":"16px"},"spacing":{"blockGap":"32px"}}} -->
<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Destination","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Activities","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Reviews","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0px","margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:social-links {"iconColor":"base","iconColorValue":"#404968","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"left":"32px"}}},"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);

