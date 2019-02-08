( function( $ ) {
	"use strict";

	// Set Drawer for Main Navigation.
	$( document ).ready( function() {
		$( '.drawer' ).drawer();
	});

	$(document).scroll(function() {
		var y = $(this).scrollTop();
		if (y > 800) {
			$('.gotoTop').fadeIn();
		} else {
			$('.gotoTop').fadeOut();
		}
	});

	$('.gotoTop').click(function(e) {
		e.preventDefault();
		$('html, body').animate({ scrollTop: 0 }, 500, 'linear');
		return false;
	});

	// Set Double Tap To Go for Main Navigation.
	var $site_navigation = $( '#site-navigation li:has(ul)' );
	if ( $site_navigation[0] && 783 <= window.innerWidth ) {
		$site_navigation.doubleTapToGo();
	}

} )( jQuery );