<?php
/**
 * Title: Team
 * Slug: team
 * Categories: travelverse-patterns
 * Keywords: Team
 */

return array(
    'title'      => __( 'Team', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'team', 'team-section' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Team Section"},"align":"full","style":{"spacing":{"padding":{"right":"15px","left":"15px","top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"},"blockGap":"var:preset|spacing|100"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--100);padding-right:15px;padding-bottom:var(--wp--preset--spacing--100);padding-left:15px"><!-- wp:group {"metadata":{"name":"Administration Section"},"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:300">' . esc_html__('Administration', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"24px","bottom":"var:preset|spacing|56"}}},"backgroundColor":"primary","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-default" style="margin-top:24px;margin-bottom:var(--wp--preset--spacing--56)"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|56"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-1.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:contain;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' . esc_html__('Samantha Reynolds', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__('Founder &amp; CEO', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>' . esc_html__('Samantha Reynolds is the driving force behind TravelVerse, bringing with her a wealth of experience, passion for travel, and a visionary approach to the industry. With a background in business management and a lifelong love for exploration, Samantha founded TravelVerse with the mission of revolutionizing the travel experience.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('Prior to founding TravelVerse, Samantha gained invaluable experience working in various roles within the travel sector, from managing boutique hotels to coordinating large-scale travel events. Her hands-on experience provided her with insights into the challenges and opportunities facing travelers today.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('In addition to her role at TravelVerse, Samantha is actively involved in philanthropic efforts aimed at promoting sustainable tourism and supporting local communities in the destinations where TravelVerse operates. She believes in the power of travel to create positive change and is committed to making a difference in the world through responsible and ethical practices.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('Samantha\'s leadership, vision, and commitment to excellence are the driving forces behind TravelVerse\'s success. Under her guidance, the company continues to innovate, evolve, and redefine the travel industry, one unforgettable journey at a time.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-2.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' . esc_html__('Michael Thompson', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__('Chief Operating Officer (COO)', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>' . esc_html__('Michael Thompson serves as the Chief Operating Officer (COO) of TravelVerse, bringing with him a wealth of experience in operations management and logistics. With a background in business administration and a passion for delivering exceptional customer experiences, Michael plays a crucial role in ensuring that TravelVerse\'s operations run smoothly and efficiently.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('As COO, Michael oversees all aspects of TravelVerse\'s day-to-day operations, including logistics, customer service, and quality control. He works closely with the CEO and other members of the leadership team to develop and implement strategies that drive growth, improve efficiency, and enhance the overall customer experience. With his analytical mindset, attention to detail, and dedication to excellence, Michael is instrumental in ensuring that TravelVerse continues to exceed the expectations of its clients and maintain its reputation as a leader in the travel industry.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Leaders Section"},"align":"wide","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:300">' . esc_html__('Trekking Leaders', 'travelverse') .'</h2>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"24px","bottom":"var:preset|spacing|64"}}},"backgroundColor":"primary","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-default" style="margin-top:24px;margin-bottom:var(--wp--preset--spacing--64)"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|56"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-3.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' . esc_html__('Emily Carter', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__('Head of Marketing', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>' . esc_html__('Emily Carter leads TravelVerse\'s marketing efforts with creativity, strategic insight, and a passion for storytelling. With a background in digital marketing and brand management, Emily is responsible for shaping TravelVerse\'s brand identity, engaging with audiences, and driving growth through innovative marketing strategies.', 'travelverse') .' </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('As Head of Marketing, Emily oversees all aspects of TravelVerse\'s marketing initiatives, including digital advertising, social media, content creation, and brand partnerships. She works closely with the CEO and other members of the leadership team to develop and execute marketing campaigns that resonate with travelers and inspire them to embark on unforgettable adventures with TravelVerse. With her creative flair, strategic mindset, and deep understanding of consumer behavior, Emily plays a crucial role in driving brand awareness, customer acquisition, and revenue growth for TravelVerse.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-4.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">'. esc_html__('Benjamin Nguyen', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'. esc_html__('Director of Sales', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>'. esc_html__('Benjamin Nguyen is the Director of Sales at TravelVerse, responsible for driving revenue growth and building strong relationships with clients. With a background in sales management and a passion for delivering exceptional customer service, Benjamin plays a crucial role in ensuring that TravelVerse remains a trusted partner for travelers seeking exceptional experiences.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>'. esc_html__('As Director of Sales, Benjamin oversees all aspects of TravelVerse\'s sales operations, including business development, client acquisition, and sales strategy. He works closely with the CEO and other members of the leadership team to identify new opportunities for growth, develop targeted sales initiatives, and cultivate relationships with key partners and stakeholders. With his strategic mindset, leadership skills, and dedication to excellence, Benjamin is instrumental in driving revenue growth and expanding TravelVerse\'s presence in the travel industry.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-5.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">'. esc_html__('Sarah Lewis', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">'. esc_html__('Head of Customer Experience', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>'. esc_html__('Sarah Lewis serves as the Head of Customer Experience at TravelVerse, overseeing all aspects of the customer journey and ensuring that clients receive exceptional service from start to finish. With a background in hospitality management and a passion for delivering memorable experiences, Sarah plays a crucial role in maintaining TravelVerse\'s reputation for excellence in customer service.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>'. esc_html__('As Head of Customer Experience, Sarah leads a team of dedicated professionals who are responsible for assisting clients with inquiries, resolving issues, and ensuring that their travel experience with TravelVerse exceeds expectations. She works closely with the CEO and other members of the leadership team to develop and implement strategies that enhance the overall customer experience and drive customer satisfaction. With her proactive approach, attention to detail, and commitment to excellence, Sarah is instrumental in ensuring that TravelVerse remains a trusted partner for travelers seeking unforgettable adventures.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-6.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' .esc_html__('Matthew Wilson', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' .esc_html__('Lead Travel Consultant', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>' . esc_html__('Matthew Wilson is a seasoned travel expert and the Lead Travel Consultant at TravelVerse, with a passion for exploring new destinations and creating unforgettable experiences for clients. With over a decade of experience in the travel industry, Matthew brings a wealth of knowledge and expertise to his role, helping clients plan and book their dream vacations with confidence.', 'travelverse') .'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('In his role, Matthew works closely with clients to understand their travel preferences, interests, and budget constraints. He utilizes his network of industry contacts and destination expertise to craft unique and immersive experiences tailored to each client\'s needs. Matthew\'s personalized approach, attention to detail, and commitment to customer satisfaction set TravelVerse apart as a trusted advisor for travelers worldwide.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:separator {"style":{"layout":{"selfStretch":"fill","flexSize":null},"color":{"background":"#2b263614"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#2b263614;color:#2b263614"/>
<!-- /wp:separator -->

<!-- wp:group {"metadata":{"name":"Team"},"className":"is-style-slide-up-fade-in-animation","layout":{"type":"default"}} -->
<div class="wp-block-group is-style-slide-up-fade-in-animation"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|100"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"25%","metadata":{"name":"Image and Title"}} -->
<div class="wp-block-column" style="flex-basis:25%"><!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":3009,"width":"160px","height":"160px","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":"1000px"}}} -->
<figure class="wp-block-image aligncenter size-full is-resized has-custom-border"><img src="' . esc_url(get_theme_file_uri('/assets/images/team-7.webp') )  .'" alt="" class="wp-image-3009" style="border-radius:1000px;object-fit:cover;width:160px;height:160px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"style":{"spacing":{"margin":{"top":"24px","bottom":"8px"}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"medium"} -->
<h3 class="wp-block-heading has-text-align-center has-medium-font-size" style="margin-top:24px;margin-bottom:8px;font-style:normal;font-weight:300">' . esc_html__('Jessica Patel', 'travelverse') .'</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__('Marketing Coordinator', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","metadata":{"name":"Description"}} -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p>' . esc_html__('Jessica Patel plays a crucial role in TravelVerse\'s marketing team as the Marketing Coordinator, responsible for executing campaigns and driving engagement across various channels. With a background in marketing communications and a creative flair, Jessica brings fresh ideas and innovative strategies to the table.', 'travelverse') . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>' . esc_html__('In her role, Jessica supports the marketing team in developing and implementing marketing initiatives to promote TravelVerse\'s brand and offerings. She collaborates with internal stakeholders to create engaging content, manage social media platforms, and coordinate promotional activities. Jessica\'s attention to detail, organizational skills, and passion for marketing contribute to the success of TravelVerse\'s marketing efforts.', 'travelverse') .'</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);


