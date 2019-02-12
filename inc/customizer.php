<?php
/**
 * iWrite Theme Customizer
 *
 * @package iWrite
 */

/**
 * Set the Customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iwrite_customize_register( $wp_customize ) {

	// Site Identity
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Main menu
	 */
	// Theme options
	$wp_customize->add_section( 'iwrite_options', array(
		'title'    => esc_html__( 'Theme options', 'iwrite' ),
		'priority' => 1,
	) );
	// Fonts
	$wp_customize->add_section( 'iwrite_font', array(
		'title'    => esc_html__( 'Font', 'iwrite' ),
		'description' => __('Add font name from google fonts.', 'iwrite'),
		'priority' => 1,
	) );
	// Google Analytic
	$wp_customize->add_section( 'iwrite_ga', array(
		'title'    => esc_html__( 'Google Analytic', 'iwrite' ),
		'description' => __('Add your google analytic ID to track your site.', 'iwrite'),
		'priority' => 1,
	) );

	// site info at footer
	$wp_customize->add_setting( 'iwrite_enable_site_info', array(
		'default'           => 0,
		'sanitize_callback' => 'iwrite_sanitize_checkbox',
	) );
	$wp_customize->add_control(  'iwrite_enable_site_info', array(
		'section'  => 'iwrite_options',
		'label'    => __( 'Display site info in the footer 1 widget', 'iwrite' ),
		'type' => 'checkbox',
		'priority' => 1,
	) );
	// search
	$wp_customize->add_setting( 'iwrite_show_search', array(
		'default'           => 1,
		'sanitize_callback' => 'iwrite_sanitize_checkbox',
	) );
	$wp_customize->add_control(  'iwrite_show_search', array(
		'section'  => 'iwrite_options',
		'label'    => __( 'Display search box', 'iwrite' ),
		'type' => 'checkbox',
		'priority' => 1,
	) );

	/**
	 * Menu for theme font
	 */
	$wp_customize->add_setting( 'iwrite_google_font', array(
		'default'           => 'Kanit',
		'placeholder'		=> 'Google font name',
		'sanitize_callback' => 'iwrite_sanitize_text',
	) );
	$wp_customize->add_control( 'iwrite_google_font', array(
		'label'    => __( 'Google font name', 'iwrite' ),
		'section'  => 'iwrite_font',
		'type'     => 'text',
		'priority' => 1,
	));
	/**
	 * Menu for theme Google Analytic
	 */
	$wp_customize->add_setting( 'iwrite_google_ga', array(
		'default'           => '',
		'sanitize_callback' => 'iwrite_sanitize_text',
	) );
	$wp_customize->add_control( 'iwrite_google_ga', array(
		'label'    => __( 'Google Analytic ID', 'iwrite' ),
		'section'  => 'iwrite_ga',
		'type'     => 'text',
		'priority' => 1,
	));

}
add_action( 'customize_register', 'iwrite_customize_register' );

/**
 * Sanitize user inputs.
 */
function iwrite_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
	} else {
		return 0;
	}
}

function iwrite_sanitize_text ( $value ) {
	if( $value != '' ) {
		return $value;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function write_customize_preview_js() {
	wp_enqueue_script( 'write_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180907', true );
}
add_action( 'customize_preview_init', 'write_customize_preview_js' );

/**
 * Enqueue Customizer CSS
 */
function write_customizer_style() {
	wp_enqueue_style( 'write-customizer-style', get_template_directory_uri() . '/css/customizer.css', array() );
}
add_action( 'customize_controls_print_styles', 'write_customizer_style');
