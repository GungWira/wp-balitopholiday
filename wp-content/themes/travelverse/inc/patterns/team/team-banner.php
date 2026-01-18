<?php
/**
 * Title: Team Banner
 * Slug: team-banner
 * Categories: travelverse-patterns
 * Keywords: Team Banner
 */

return array(
    'title'      => __( 'Team Banner', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'team-banner', 'team-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Team Banner"},"align":"full","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"0","bottom":"0","left":"15px","right":"15px"},"blockGap":"var:preset|spacing|56"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-accent-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-right:15px;padding-bottom:0;padding-left:15px"><!-- wp:group {"metadata":{"name":"Page Title"},"style":{"spacing":{"padding":{"right":"15px","left":"var:preset|spacing|100","top":"var:preset|spacing|64"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--64);padding-right:15px;padding-left:var(--wp--preset--spacing--100)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:400;line-height:1">' . esc_html__('Meet the TravelVerse Team', 'travelverse') .'</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__('Meet our dynamic team of seasoned travel professionals, who bring a unique blend of expertise and innovation to crafting your dream adventure.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Video Section"},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:embed {"url":"' . esc_url('https://www.youtube.com/watch?v=FL8_X_2WLqU\u0026t=493s') .'","type":"video","providerNameSlug":"youtube","responsive":true,"align":"wide","className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed alignwide is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=FL8_X_2WLqU&amp;t=493s
</div></figure>
<!-- /wp:embed --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);
