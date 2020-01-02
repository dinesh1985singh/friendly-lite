<?php
/**
 * Friendly Lite  functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Define global constants used globally throughout the theme.
 * Set Proper Parent/Child theme paths/urls for inclusion.
 */

// Parent theme diectory path.
define( 'PARENT_DIR', trailingslashit( get_parent_theme_file_path() ) );

// Child theme diectory path.
define( 'CHILD_DIR', trailingslashit( get_theme_file_path() ) );

// Parent theme diectory url.
define( 'PARENT_URL', trailingslashit( get_parent_theme_file_uri() ) );

// child theme diectory url.
define( 'CHILD_URL', trailingslashit( get_theme_file_uri() ) );

/*
 * Handle backward compatibility of a theme.
 * Restrict switching to Friendly Lite below WordPress 4.7.0.
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	include_once( PARENT_DIR . '/inc/back-compat.php' );
}

// Loading Custom theme specific functions.
include_once( CHILD_DIR . '/inc/custom-function.php' );

// Enqueue theme specific scripts and styles.
include_once( CHILD_DIR . '/inc/theme-scripts.php' );

// Include bootstrap friendly lite navwalker class.
if ( ! file_exists( PARENT_DIR . '/inc/class-friendly-lite-navwalker.php' ) ) {
	// If file does not exist... return an error.
	return new WP_Error(
		'friendly-lite-navwalker-missing',
		__( 'It appears that the friendly-lite-navwalker.php file may be missing.', 'friendly-lite' )
	);

} else {
	// If file exists... include it.
	require_once( PARENT_DIR . '/inc/class-friendly-lite-navwalker.php' );
}

// Theme initialization.
include_once( CHILD_DIR . '/inc/theme-init.php' );

// Theme sidebars.
include_once( CHILD_DIR . '/inc/theme-widgets.php' );

// Implement the Custom Header feature.
include_once( CHILD_DIR . '/inc/custom-header.php' );

// Add custom sections and controls in Apperance > customize.
include_once( CHILD_DIR . '/inc/customizer/customizer.php' );

// Theme specific template tags definitions.
include_once( PARENT_DIR . '/inc/template-tags.php' );
