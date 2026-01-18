<?php
/**
 * Title: Contact Form
 * Slug: contact-form
 * Categories: travelverse-patterns
 * Keywords: Contact Form
 */

return array(
    'title'      => __( 'Contact Form', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'contact-form', 'contact-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Contact Form"},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"padding":{"right":"15px","left":"15px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--80);margin-bottom:var(--wp--preset--spacing--80);padding-right:15px;padding-left:15px"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%","metadata":{"name":"Get in Touch"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"24px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-bottom:24px;font-style:normal;font-weight:300">' .esc_html__('Get In Touch', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3018,"width":"60px","height":"60px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-color-duotone"}}} -->
<figure class="wp-block-image size-full is-resized"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/location-circle.svg') )  .'  " alt="" class="wp-image-3018" style="object-fit:contain;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:300">' .esc_html__('Office', 'travelverse') .'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' .esc_html__('1817 Marshville Road, Ste 125', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3018,"width":"60px","height":"60px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-color-duotone"}}} -->
<figure class="wp-block-image size-full is-resized"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/mail-circle.svg') )  .'" alt="" class="wp-image-3018" style="object-fit:contain;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:300">' .esc_html__('Email', 'travelverse') .'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' . esc_html__('email@domain.com', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3018,"width":"60px","height":"60px","scale":"contain","sizeSlug":"full","linkDestination":"none","style":{"color":{"duotone":"var:preset|duotone|primary-color-duotone"}}} -->
<figure class="wp-block-image size-full is-resized"><img src=" ' . esc_url(get_theme_file_uri('/assets/images/phone.svg') )  .'" alt="" class="wp-image-3018" style="object-fit:contain;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h4 class="wp-block-heading has-medium-font-size" style="font-style:normal;font-weight:300">' . esc_html__('Contact', 'travelverse') .'</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>' . esc_html__('0123-456-789', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"135px","className":"is-style-has-mb-50"} -->
<div style="height:135px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-50"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="font-style:normal;font-weight:300">' .esc_html__('Lets Get Connected', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:social-links {"style":{"spacing":{"blockGap":{"left":"10px"}}},"className":"is-style-default"} -->
<ul class="wp-block-social-links is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","metadata":{"name":"Form"}} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:everest-forms/form-selector {"formId":"37071","displayTitle":false,"displayDescription":false} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->'
);
