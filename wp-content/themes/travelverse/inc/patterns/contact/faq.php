<?php
/**
 * Title: FAQ
 * Slug: faq
 * Categories: travelverse-patterns
 * Keywords: FAQ
 */

return array(
    'title'      => __( 'FAQ', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'faq', 'faq-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"FQA Section"},"align":"wide","style":{"spacing":{"blockGap":"0","padding":{"right":"15px","left":"15px"},"margin":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--100);margin-bottom:var(--wp--preset--spacing--100);padding-right:15px;padding-left:15px"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|56"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--56);font-style:normal;font-weight:300">' . esc_html__('Frequently Asked Questions (FAQs)', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:details {"showContent":true,"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500" open><summary>' . esc_html__('What travel services do you offer?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('We offer a variety of travel services to cater to your needs, including destination planning, itinerary creation, activity booking, travel logistics management, and 24/7 support throughout your trip.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('Do you specialize in any particular destinations?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('While we love exploring the entire world, we have certain regions where our travel experts possess in-depth knowledge and experience.  Feel free to inquire about your dream destination, and we\'ll be happy to discuss how we can create the perfect itinerary for you.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('Do you offer custom travel packages?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('Absolutely! We believe travel should be a personal experience.  We don\'t offer one-size-fits-all packages.  We tailor each itinerary to your specific interests, pace, and budget.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('How much does your service cost?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('The cost of your trip will vary depending on your chosen destination, travel style, desired activities, and duration. Contact us for a free consultation to discuss your travel dreams and receive a personalized quote.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('What is included in the trip cost?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('The cost will vary depending on your itinerary.  Generally, it includes flights, accommodation, transportation within your destination, some meals (as specified), guided tours and activities (as chosen), and local taxes.  We\'ll provide a detailed breakdown of inclusions and exclusions for your specific trip.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('How do I book a trip with TravelVerse?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('The easiest way to book your trip is to contact us through our website or phone.  We\'ll discuss your travel preferences and create a customized itinerary.  Once finalized, you can confirm your booking and make a secure payment online.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('What payment methods do you accept?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('We accept all major credit cards and secure online bank transfers.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<!-- wp:separator {"style":{"color":{"background":"#dddcdf"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#dddcdf;color:#dddcdf"/>
<!-- /wp:separator -->

<!-- wp:details {"style":{"spacing":{"blockGap":"16px"},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small-medium"} -->
<details class="wp-block-details has-heading-color has-text-color has-link-color has-small-medium-font-size" style="font-style:normal;font-weight:500"><summary>' . esc_html__('What is your cancellation policy?', 'travelverse') .'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__('Our cancellation policy varies depending on the specific services booked and the timeframe before departure. When you finalize your itinerary, we\'ll provide a detailed breakdown of the policy.', 'travelverse') .'</p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);