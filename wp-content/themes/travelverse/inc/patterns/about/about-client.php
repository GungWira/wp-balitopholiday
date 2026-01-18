<?php
/**
 * Title: About Client
 * Slug: about-client
 * Categories: travelverse-patterns
 * Keywords: About Client
 */

return array(
    'title'      => __( 'About Client', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'about-client', 'about-client-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Client Section"},"align":"wide","style":{"spacing":{"padding":{"right":"15px","left":"15px","top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary-accent","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-primary-accent-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--100);padding-right:15px;padding-bottom:var(--wp--preset--spacing--100);padding-left:15px"><!-- wp:group {"metadata":{"name":"Client Text"},"style":{"spacing":{"padding":{"bottom":"32px"}}},"layout":{"type":"constrained","contentSize":"780px"}} -->
<div class="wp-block-group" style="padding-bottom:32px"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' .esc_html__('We empower clients to showcase their unique brand identity and captivate their audience with a visually striking and highly functional website', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Client List"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained","contentSize":"1098px"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px"><!-- wp:group {"metadata":{"name":"Client Images"},"align":"wide","style":{"spacing":{"blockGap":"40px"}},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide is-style-slide-up-fade-in-animation"><!-- wp:image {"id":37158,"width":"182px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/client.png') )  .'" alt="" class="wp-image-37158" style="object-fit:contain;width:182px;height:40px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":37157,"width":"147px","height":"40px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/client1.png') )  .'" alt="" class="wp-image-37157" style="object-fit:cover;width:147px;height:40px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":37160,"width":"174px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/client2.png') )  .'" alt="" class="wp-image-37160" style="object-fit:contain;width:174px;height:40px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":37161,"width":"191px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/client3.png') )  .'" alt="" class="wp-image-37161" style="object-fit:contain;width:191px;height:40px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":37159,"width":"173px","height":"40px","scale":"contain","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url(get_theme_file_uri('/assets/images/client4.png') )  .'" alt="" class="wp-image-37159" style="object-fit:contain;width:173px;height:40px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);


