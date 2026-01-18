<?php

/**
 * Title: Blog
 * Slug: blog
 * Categories: travelverse-patterns
 * Keywords: blog
 */

return array(
	'title'      => __( 'Blog', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'blog' ),
	'content'    => '<!-- wp:group {"metadata":{"name":"Blog Section"},"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"15px","left":"15px"},"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"backgroundColor":"section-bg","className":"is-style-slide-up-fade-in-animation","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull is-style-slide-up-fade-in-animation has-section-bg-background-color has-background" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:15px"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"8px","top":"0px"}}},"textColor":"primary"} -->
	<p class="has-text-align-center has-primary-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:8px;font-style:normal;font-weight:500;line-height:1.6">'. esc_html__('Knowledge Center', 'travelverse') .'</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"56px","top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
	<h2 class="wp-block-heading has-text-align-center has-heading-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:56px">'. esc_html__('Latest Articles &amp; Blog', 'travelverse') .'</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"metadata":{"name":"Posts List"},"align":"wide","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide"><!-- wp:query {"queryId":55,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide","className":"is-style-mg-0"} -->
	<div class="wp-block-query alignwide is-style-mg-0"><!-- wp:post-template {"style":{"spacing":{"blockGap":"20px"}},"className":"is-style-mg-0 is-style-default","layout":{"type":"grid","columnCount":3}} -->
	<!-- wp:post-featured-image {"isLink":true,"height":"","style":{"spacing":{"margin":{"bottom":"0px","top":"0px"}},"border":{"radius":"16px"}},"className":"fr-hover-scale-img"} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0px","padding":{"top":"24px","left":"16px","bottom":"0px","right":"16px"},"margin":{"top":"0px","bottom":"0px"}},"border":{"radius":{"bottomLeft":"12px","bottomRight":"12px","topLeft":"0px","topRight":"0px"}}},"backgroundColor":"white"} -->
	<div class="wp-block-group has-white-background-color has-background" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:12px;border-bottom-right-radius:12px;margin-top:0px;margin-bottom:0px;padding-top:24px;padding-right:16px;padding-bottom:0px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group"><!-- wp:post-terms {"term":"category","textAlign":"left","separator":"  ","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"16px","lineHeight":"1.8"}}} /-->
	
	<!-- wp:post-date {"format":"F j, Y","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"400","lineHeight":"1.8"}}} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"lineHeight":"1.6","letterSpacing":"-0.02em","fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"10px"}}},"className":"is-style-on-hover","fontSize":"medium"} /-->
	
	<!-- wp:post-excerpt {"moreText":"Continue Reading → ","excerptLength":25,"style":{"spacing":{"margin":{"top":"12px"}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"className":"is-style-show-two-lines"} /--></div>
	<!-- /wp:group -->
	<!-- /wp:post-template --></div>
	<!-- /wp:query --></div>
	<!-- /wp:group -->
	
	<!-- wp:spacer {"height":"56px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div style="margin-top:0px;margin-bottom:0px;height:56px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:buttons {"metadata":{"name":"Blog Button"},"layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"className":"is-style-travelverse-primary-arrow"} -->
	<div class="wp-block-button is-style-travelverse-primary-arrow"><a class="wp-block-button__link wp-element-button">'. esc_html__('READ ALL ARTICLES', 'travelverse') .'</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group -->'
);




