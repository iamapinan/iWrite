( function( $ ) {
	"use strict";

	// Set Drawer for Main Navigation.
	$( document ).ready( function() {
		$( '.drawer' ).drawer();
	});

	// Set Double Tap To Go for Main Navigation.
	var $site_navigation = $( '#site-navigation li:has(ul)' );
	if ( $site_navigation[0] && 783 <= window.innerWidth ) {
		$site_navigation.doubleTapToGo();
	}

} )( jQuery );