( function( $ ) {
	"use strict";

	// Set Drawer for Main Navigation.
	$( document ).ready( function() {
		$( '.drawer' ).drawer();
	});

	$(document).scroll(function() {
		var y = $(this).scrollTop();
		if (y > 800) {
			$('.gotoTop').css('opacity', 1);
			$('.gotoTop').click(function() {
				scrollTo(0,0)
			})
		} else {
			$('.gotoTop').css('opacity', 0);
		}
	});

	// Set Double Tap To Go for Main Navigation.
	var $site_navigation = $( '#site-navigation li:has(ul)' );
	if ( $site_navigation[0] && 783 <= window.innerWidth ) {
		$site_navigation.doubleTapToGo();
	}

} )( jQuery );