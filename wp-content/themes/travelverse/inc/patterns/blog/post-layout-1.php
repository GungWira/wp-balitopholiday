<?php
/**
 * Title: Post Layout 1
 * Slug: post-layout-1
 * Categories: travelverse-patterns
 * Keywords: Post Layout 1
 */

return array(
    'title'      => __( 'Post Layout 1', 'travelverse' ),
	'categories' => array( 'travelverse-patterns' ),
	'keywords'   => array( 'post-layout-1', 'post-layout' ),
    'content'   => '
    <!-- wp:group {"metadata":{"name":"Post Template"},"align":"wide","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0"><!-- wp:query {"queryId":0,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[]},"enhancedPagination":true,"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"metadata":{"name":"Post"},"style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"36px"}}},"backgroundColor":"white","className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default has-white-background-color has-background" style="border-radius:12px;margin-top:0px;margin-bottom:36px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-featured-image {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}},"border":{"radius":"16px"}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"left":"16px","top":"24px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:24px;padding-left:16px"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"16px"},"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:16px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"16px","lineHeight":"1.8"}}} /-->

<!-- wp:post-date {"isLink":true,"displayType":"modified","style":{"typography":{"fontSize":"16px","lineHeight":"1.8"},"elements":{"link":{"color":{"text":"var:preset|color|inherit"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"16px","left":"0"}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.4"}},"className":"is-style-on-hover","fontSize":"medium-large"} /-->

<!-- wp:post-excerpt {"moreText":"Continue Reading →","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"right":"0px","bottom":"0px","left":"0px","top":"16px"}}},"className":"is-style-show-three-lines","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"26px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:26px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"paginationArrow":"arrow","align":"wide","layout":{"type":"flex","justifyContent":"space-between","orientation":"horizontal","flexWrap":"wrap"}} -->
<!-- wp:query-pagination-previous {"label":"Previous","style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.7"}}} /-->

<!-- wp:query-pagination-numbers {"style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.4"}}} /-->

<!-- wp:query-pagination-next {"label":"Next","style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"500","lineHeight":"1.7"}}} /-->
<!-- /wp:query-pagination -->

<!-- wp:spacer {"height":"70px","className":"is-style-has-mb-40","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
<div style="margin-top:0px;margin-bottom:0px;height:70px" aria-hidden="true" class="wp-block-spacer is-style-has-mb-40"></div>
<!-- /wp:spacer --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->'
);


