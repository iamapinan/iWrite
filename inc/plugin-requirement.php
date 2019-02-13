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
);

tgmpa( $plugins, $config );