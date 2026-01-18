( function ( wp, $ ) {
	'use strict';

	if ( ! wp ) {
		return;
	}

	/*
	 * Ajax request
	 */
	function travelverseDismissAction() {
		$.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				nonce: travelverseNotices.nonce,
				action: 'travelverse_dismiss_notice',
			},
			dataType: 'json',
		} );
	}

	$( function () {
		// Dismiss notice
		$( document ).on(
			'click',
			'.dashedit-dismiss-btn .notice-dismiss',
			function () {
				travelverseDismissAction();
			}
		);
	} );
} )( window.wp, jQuery );
