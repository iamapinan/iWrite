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
function write_customize_register( $wp_customize ) {

	// Site Identity
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Theme options
	$wp_customize->add_section( 'iWriteOption', array(
		'title'    => esc_html__( 'Theme options', 'iwrite' ),
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'iwrite_enable_site_info', array(
		'default'           => 0,
		'sanitize_callback' => 'iwrite_sanitize_checkbox',
	) );
	$wp_customize->add_control(  'iwrite_enable_site_info', array(
		'section'  => 'iWriteOption',
		'label'    => __( 'Display site info in the footer', 'iwrite' ),
		'type' => 'checkbox',
		'priority' => 1,
	) );


	// Colors
	// $wp_customize->get_section( 'colors' )->priority     = 35;
	// $wp_customize->add_setting( 'write_link_color' , array(
	// 	'default'   => '#a87d28',
	// 	'sanitize_callback' => 'sanitize_hex_color',
	// ) );
	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'write_link_color', array(
	// 	'label'    => esc_html__( 'Link Color', 'write' ),
	// 	'section'  => 'colors',
	// 	'priority' => 13,
	// ) ) );
	// $wp_customize->add_setting( 'write_link_hover_color' , array(
	// 	'default'           => '#c49029',
	// 	'sanitize_callback' => 'sanitize_hex_color',
	// ) );
	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'write_link_hover_color', array(
	// 	'label'    => esc_html__( 'Link Hover Color', 'write' ),
	// 	'section'  => 'colors',
	// 	'priority' => 14,
	// ) ) );


	// Home
	// $wp_customize->add_section( 'write_home', array(
	// 	'title'       => __( 'Home', 'write' ),
	// 	'description' => __( 'HTML tags are allowed in the home text.', 'write' ),
	// 	'priority'    => 75,
	// ) );
	// $wp_customize->add_setting( 'write_home_text', array(
	// 	'default'           => '',
	// 	'sanitize_callback' => 'wp_kses_post',
	// ) );
	// $wp_customize->add_control( 'write_home_text', array(
	// 	'label'    => __( 'Home Text', 'write' ),
	// 	'section'  => 'write_home',
	// 	'type'     => 'textarea',
	// 	'priority' => 11,
	// ) );
	// $wp_customize->add_setting( 'write_home_text_font', array(
	// 	'default'           => '',
	// 	'sanitize_callback' => 'write_sanitize_home_text_font',
	// ) );
	// $wp_customize->add_control( 'write_home_text_font', array(
	// 	'label'   => __( 'Font', 'write' ),
	// 	'section' => 'write_home',
	// 	'type'    => 'select',
	// 	'choices' => $write_home_text_font,
	// 	'priority' => 12,
	// ) );
	// $wp_customize->add_setting( 'write_home_text_font_size', array(
	// 	'default'           => ( 'ja' == get_bloginfo( 'language' ) ) ? '27' : '32',
	// 	'sanitize_callback' => 'write_sanitize_home_text_font_size',
	// ) );
	// $wp_customize->add_control( 'write_home_text_font_size', array(
	// 	'label'    => __( 'Font Size (px)', 'write' ),
	// 	'section'  => 'write_home',
	// 	'type'     => 'text',
	// 	'priority' => 13,
	// ));
	// $wp_customize->add_setting( 'write_home_text_display', array(
	// 	'default'           => '',
	// 	'sanitize_callback' => 'write_sanitize_home_display'
	// ) );
	// $wp_customize->add_control( 'write_home_text_display', array(
	// 	'label'   => esc_html__( 'Home Text Display', 'write' ),
	// 	'section' => 'write_home',
	// 	'type'    => 'radio',
	// 	'choices' => array(
	// 		''          => esc_html__( 'Display on the blog posts index page', 'write' ),
	// 		'front'     => esc_html__( 'Display on the static front page', 'write' ),
	// 		'site'      => esc_html__( 'Display on the whole site', 'write' ),
	// 	),
	// 	'priority' => 14,
	// ) );

	// Menus
	$wp_customize->add_setting( 'write_hide_navigation', array(
		'default'           => '',
		'sanitize_callback' => 'iwrite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'write_hide_navigation', array(
		'label'    => esc_html__( 'Hide Main Navigation', 'write' ),
		'section'  => 'menu_locations',
		'type'     => 'checkbox',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'write_hide_search', array(
		'default'           => '',
		'sanitize_callback' => 'iwrite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'write_hide_search', array(
		'label'    => esc_html__( 'Hide Search on Main Navigation', 'write' ),
		'section'  => 'menu_locations',
		'type'     => 'checkbox',
		'priority' => 2,
	) );
}
add_action( 'customize_register', 'write_customize_register' );

/**
 * Sanitize user inputs.
 */
function iwrite_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
	} else {
		return '';
	}
}
function iwrite_sanitize_margin( $value ) {
	if ( preg_match("/^-?[0-9]+$/", $value) ) {
		return $value;
	} else {
		return '0';
	}
}
// function iwrite_sanitize_header_display( $value ) {
// 	$valid = array(
// 		''         => esc_html__( 'Display on the blog posts index page', 'write' ),
// 		'page'     => esc_html__( 'Display on all static pages', 'write' ),
// 		'site'     => esc_html__( 'Display on the whole site', 'write' ),
// 	);

// 	if ( array_key_exists( $value, $valid ) ) {
// 		return $value;
// 	} else {
// 		return '';
// 	}
// }
// function write_sanitize_home_display( $value ) {
// 	$valid = array(
// 		''          => esc_html__( 'Display on the blog posts index page', 'write' ),
// 		'front'     => esc_html__( 'Display on the static front page', 'write' ),
// 		'site'      => esc_html__( 'Display on the whole site', 'write' ),
// 	);

// 	if ( array_key_exists( $value, $valid ) ) {
// 		return $value;
// 	} else {
// 		return '';
// 	}
// }
// function write_sanitize_home_text_font( $value ) {
// 	global $write_home_text_font;
// 	unset ( $write_home_text_font['Selected Fonts'] );
// 	unset ( $write_home_text_font['All Fonts'] );
// 	$valid = $write_home_text_font;

// 	if ( array_key_exists( $value, $valid ) ) {
// 		return $value;
// 	} else {
// 		return '';
// 	}
// }
// function write_sanitize_home_text_font_size( $value ) {
// 	if ( preg_match("/^[1-9][0-9]*$/", $value) ) {
// 		return $value;
// 	} else {
// 		return ( 'ja' == get_bloginfo( 'language' ) ) ? '27' : '32';
// 	}
// }

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
