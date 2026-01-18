<?php
/**
 * Title: Footer Pattern
 * Slug: footer-pattern
 * Categories: travelverse-patterns
 * Keywords: Footer Pattern
 */

return array(
    'title'      => __( 'Footer Pattern', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'footer-pattern', 'footer' ),
    'content'   => '
    <!-- wp:group {"align":"full","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull">
    <!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|primary"}}}},"spacing":{"padding":{"top":"64px","bottom":"64px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#281d17"}},"textColor":"background","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide has-background-color has-text-color has-background has-link-color"
        style="background-color:#281d17;margin-top:0px;margin-bottom:0px;padding-top:64px;padding-right:15px;padding-bottom:64px;padding-left:15px">
        <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"56px"}}}} -->
        <div class="wp-block-columns alignwide"><!-- wp:column {"width":"30%","style":{"spacing":{"blockGap":"16px"}}} -->
            <div class="wp-block-column" style="flex-basis:30%">   <!-- wp:site-title {"level":0,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium-large"} /-->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"id":3018,"width":"24px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/call.svg')) .'" alt="" class="wp-image-3018" style="object-fit:cover;width:24px;height:24px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}}} -->
                    <p style="font-size:16px">' .esc_html__('(+12) 123 456 7890', 'travelverse'). '</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"id":3018,"width":"24px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/mail.svg')) .'" alt="" class="wp-image-3018" style="object-fit:cover;width:24px;height:24px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}}} -->
                    <p style="font-size:16px">' .esc_html__('email@companyname.com', 'travelverse') .'</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"id":3018,"width":"24px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full is-resized"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/registration.svg')) .'" alt="" class="wp-image-3018" style="object-fit:cover;width:24px;height:24px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}}} -->
                    <p style="font-size:16px">' . esc_html__('Registration no: ABC123456789', 'travelverse') .'</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
                <div class="wp-block-group">
                    <!-- wp:image {"lightbox":{"enabled":false},"id":3018,"width":"24px","height":"24px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
                    <figure class="wp-block-image size-full is-resized"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/location.svg')) .'" alt="" class="wp-image-3018" style="object-fit:cover;width:24px;height:24px" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}}} -->
                    <p style="font-size:16px">' . esc_html__('G.P.O. Box:12589, Chandol Marg 2, Bishalnagar, Kathmandu, Nepal', 'travelverse') .' </p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group">
                    <!-- wp:social-links {"style":{"spacing":{"blockGap":{"left":"10px"}}},"className":"is-style-default"} -->
                    <ul class="wp-block-social-links is-style-default">
                        <!-- wp:social-link {"url":"#","service":"facebook"} /-->

                        <!-- wp:social-link {"url":"#","service":"x"} /-->

                        <!-- wp:social-link {"url":"#","service":"linkedin"} /-->

                        <!-- wp:social-link {"url":"#","service":"youtube"} /-->

                        <!-- wp:social-link {"url":"#","service":"instagram"} /-->
                    </ul>
                    <!-- /wp:social-links -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"style":{"spacing":{"blockGap":"24px"}}} -->
            <div class="wp-block-column">
                <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium"} -->
                <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-medium-font-size">' . esc_html__('Top Destinations', 'travelverse') .'</h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"customTextColor":"#bebbb9","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"20px"},"typography":{"fontSize":"16px"}}} -->
                <!-- wp:navigation-link {"label":"Everest Region","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Annapurna Region","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Langtang Region","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Short Trekking","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Newly Opened Trails","url":"#","kind":"custom","isTopLevelLink":true} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column {"width":"25%"} -->
            <div class="wp-block-column" style="flex-basis:25%">
                <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium"} -->
                <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-medium-font-size"> ' . esc_html__('Quick Links', 'travelverse') .'</h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"customTextColor":"#bebbb9","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"20px"},"typography":{"fontSize":"16px"}}} -->
                <!-- wp:navigation-link {"label":"Terms \u0026 Condition Policy","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Payment Method","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Visa Information","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Trekking \u0026 hiking- Complete Guide","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Travel Websites","url":"#","kind":"custom","isTopLevelLink":true} /-->
                <!-- /wp:navigation -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium"} -->
                <h2 class="wp-block-heading has-background-color has-text-color has-link-color has-medium-font-size">' . esc_html__('Archives', 'travelverse') .'</h2>
                <!-- /wp:heading -->

                <!-- wp:navigation {"customTextColor":"#bebbb9","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"style":{"spacing":{"blockGap":"20px"},"typography":{"fontSize":"16px"}}} -->
                <!-- wp:navigation-link {"label":"Jungle Safari","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Cruising","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Mountain Climbing","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- wp:navigation-link {"label":"Photography","url":"#","kind":"custom","isTopLevelLink":true} /-->

                <!-- /wp:navigation -->
            </div>
            <!-- /wp:column -->
        </div>
        <!-- /wp:columns -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"style":{"spacing":{"padding":{"top":"24px","bottom":"24px","left":"15px","right":"15px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group"
        style="margin-top:0px;margin-bottom:0px;padding-top:24px;padding-right:15px;padding-bottom:24px;padding-left:15px">
        <!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group alignwide">
            <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
            <p class="has-heading-color has-text-color has-link-color" style="font-size:16px">' . esc_html__('Copyright © TravelVerse. All Rights Reserved.', 'travelverse') .'</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
                <p class="has-heading-color has-text-color has-link-color"
                    style="font-size:16px;font-style:normal;font-weight:700"> We Accept:</p>
                <!-- /wp:paragraph -->

                <!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group"><!-- wp:image {"id":3032,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/payment-1.png')) .'" alt="'. esc_attr( 'payment', 'travelverse' ) . '" class="wp-image-3032" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"id":3032,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/payment-2.png')) .'" alt="'. esc_attr__( 'payment', 'travelverse' ) . '" class="wp-image-3032" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"id":3032,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/payment-3.png')) .'" alt="'. esc_attr__( 'payment', 'travelverse' ) . '" class="wp-image-3032" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"id":3032,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/payment-4.png')) .'" alt="'. esc_attr__( 'payment', 'travelverse' ) . '" class="wp-image-3032" />
                    </figure>
                    <!-- /wp:image -->

                    <!-- wp:image {"id":3032,"sizeSlug":"full","linkDestination":"none"} -->
                    <figure class="wp-block-image size-full"><img
                            src="'. esc_url(get_theme_file_uri('/assets/images/payment-5.png')) .'" alt="'. esc_attr__( 'payment', 'travelverse' ) . '" class="wp-image-3032" />
                    </figure>
                    <!-- /wp:image -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->'
);


