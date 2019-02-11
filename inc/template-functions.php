<?php
/**
 * Functions which enhance the theme by hooking into WordPress and Core theme Functions.
 *
 * @package iWrite
 */

 /*----------------------------------------------------------------------
# Exit if accessed directly
-------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Footer credit
 */
if ( !function_exists( 'footer_credit_named' ) ) {

    function footer_credit_named() {
        echo 'iWrite theme';
    }
}
add_action( 'footer_credit_name', 'footer_credit_named' );

/**
 * After left footer
 */
function iwrite_after_footer_left() {
	echo '<h2>'.get_bloginfo('name').'</h2>';
	echo '<p>'.get_bloginfo('description').'</p>';
}
add_action( 'after_footer_left', 'iwrite_after_footer_left' );