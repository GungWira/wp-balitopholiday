<?php
/**
 * Title: CTA-Section
 * Slug: cta-section
 * Categories: travelverse-patterns
 * Keywords: CTA-Section
 */

return array(
    'title'      => __( 'CTA-Section', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'cta', 'about-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"CTA Section"},"align":"full","style":{"spacing":{"padding":{"right":"32px","left":"32px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull" style="margin-top:0px;margin-bottom:0px;padding-right:32px;padding-left:32px"><!-- wp:cover {"url":"'. esc_url(get_theme_file_uri('/assets/images/cta-background.webp')) .'","id":22,"hasParallax":true,"dimRatio":40,"overlayColor":"black","isUserOverlayColor":true,"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}},"heading":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"132px","bottom":"132px"}},"border":{"radius":"32px"}},"textColor":"background","layout":{"type":"constrained"}} -->
    <div class="wp-block-cover alignfull has-parallax has-background-color has-text-color has-link-color" style="border-radius:32px;padding-top:132px;padding-bottom:132px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__image-background wp-image-22 has-parallax" style="background-position:50% 50%;background-image:url('. esc_url(get_theme_file_uri('/assets/images/cta-background.webp')) .')"></div><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
    <div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Title and Description"},"layout":{"type":"constrained","contentSize":"874px"}} -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.18"}},"fontSize":"xx-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="line-height:1.18">'. esc_html__('Ready to Explore? Let\'s Chat About Your Dream Trip.', 'travelverse') .'</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"bottom":"32px"}}}} -->
    <p class="has-text-align-center" style="padding-bottom:32px">'. esc_html__('We\'ll turn your travel ideas into reality. Start your next adventure with TravelVerse – your ultimate travel companion. Let your wanderlust soar! Start exploring today and let unforgettable experiences await!', 'travelverse') .'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons"><!-- wp:button {"textAlign":"left","className":"is-style-travelverse-white-arrow"} -->
    <div class="wp-block-button is-style-travelverse-white-arrow"><a class="wp-block-button__link has-text-align-left wp-element-button">'. esc_html__('PLAN YOUR TRIP', 'travelverse') .'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:group --></div></div>
    <!-- /wp:cover --></div>
    <!-- /wp:group -->'
);


