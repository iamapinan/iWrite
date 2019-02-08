<?php
/**
 * Plugin requirements
 * 
 * @package: iWrite
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

/*
* Array of plugin arrays. Required keys are name and slug.
* If the source is NOT from the .org repo, then source is also required.
*/
$plugins = array(
    array(
        'name'               => 'Categories Images', // The plugin name.
        'slug'               => 'categories-images', // The plugin slug (typically the folder name).
        'source'             => get_stylesheet_directory() . '/plugins/categories-images.2.5.4.zip', // The plugin source.
    ),
    array(
        'name'               => 'Contact Form 7', // The plugin name.
        'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
        'source'             => get_stylesheet_directory() . '/plugins/contact-form-7.5.1.1.zip', // The plugin source.
    ),
);

tgmpa( $plugins, $config );