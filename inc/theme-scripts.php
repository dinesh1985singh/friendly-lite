<?php
/**
 * Register and enqueue scripts and styles for the theme.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! function_exists( 'friendly_lite_enqueue_scripts' ) ) {
	/**
	 * Register and enqueue scripts and styles.
	 */
	function friendly_lite_enqueue_scripts() {

		// Register and enqueue google open sans fonts.
		wp_register_style( 
			'friendly-lite-google-opensans', 
			'http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', 
			false 
		);
		wp_enqueue_style( 'friendly-lite-google-opensans' );

		wp_register_style( 
			'friendly-lite-google-raleway', 
			'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 
			false 
		);

		wp_enqueue_style( 'friendly-lite-google-raleway' );
		wp_register_style( 
			'friendly-lite-google-ubuntu-mono',
			'https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,400i,700,700i',
			false 
		);

		wp_enqueue_style( 'friendly-lite-google-ubuntu-mono' );

		// Enqueue font-awesome and bootstrap stylesheets.
		wp_enqueue_style(
			'font-awesome',
			PARENT_URL . '/assets/css/font-awesome.min.css',
			false,
			'4.7',
			'all'
		);

		wp_enqueue_style( 'bootstrap', PARENT_URL . '/assets/css/bootstrap.min.css', false, '3.3.7', 'all' );

		// Theme stylesheet.
		wp_enqueue_style( 'friendly-lite-style', PARENT_URL . '/style.css', array( 'font-awesome', 'bootstrap' ), '1.0.0', 'all' );

		// Register and enqueue bootstrap Scripts.
		wp_enqueue_script( 'bootstrap', PARENT_URL . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );

		wp_enqueue_script( 'friendly-lite-skip-link-focus-fix', PARENT_URL . '/assets/js/skip-link-focus-fix.js', array( 'jquery', 'bootstrap' ), '1.0.0', true );

		// Need to fix when i specify the version number on friendly-lite.js it would not be included.
		wp_enqueue_script( 'friendly-lite-js', PARENT_URL . '/assets/js/friendly-lite.js', array( 'jquery', 'bootstrap', 'friendly-lite-skip-link-focus-fix' ), '1.0.0', true );
		$script_params = array(
			'nav_menu_display' => get_theme_mod( 'nav_menu_display', 'static' ),
			'site_preloader'   => get_theme_mod( 'site_preloader', true ),
			'back_to_top'      => get_theme_mod( 'back_to_top', true ),
		);
		wp_localize_script( 'friendly-lite-js', 'params_obj', $script_params );

		// Enqueue the html5 shiv for supporting HTML5 elements below ie 9.
		wp_enqueue_script( 'html5shiv', PARENT_URL . '/assets/js/html5shiv.min.js', array(), '3.7.3' );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

		// Enqueue the respond.js for min/max-width media query polyfill.
		wp_enqueue_script( 'respond', PARENT_URL . '/assets/js/respond.min.js', array(), '1.4.2' );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'friendly_lite_enqueue_scripts' );
