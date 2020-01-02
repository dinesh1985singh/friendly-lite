<?php
/**
 * Sets up theme defaults and register support for various WordPress features.
 *
 * The theme defaults and support for various features should be done after_setup_theme hook,
 * which runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! function_exists( 'friendly_lite_setup' ) ) {

	/**
	 * Add support for different theme features.
	 */
	function friendly_lite_setup() {
		/*
		 * Make theme translation ready.
		 * Translations can be find in the /languages/ directory.
		 */
		load_theme_textdomain( 'friendly-lite', CHILD_DIR . '/languages' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'friendly-lite-featured-large', 960, 400, true );
		add_image_size( 'friendly-lite-featured-medium', 640, 420, true );
		add_image_size( 'friendly-lite-featured-small', 360, 216, true );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Recommended way to display title.
		 * This should be used in favor of using wp_title().
		 *
		 * @since 4.1
		 */
		add_theme_support( 'title-tag' );
		
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 68,
				'width'       => 480,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Enable custom background feature in friendly lite theme.
		add_theme_support(
			'custom-background',
			apply_filters(
				'friendly_lite_custom_background',
				array(
					'default-color' => '#ffffff',
					'default-image' => '',
				)
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
			)
		);

		/**
		 * Enable support for Post Formats.
		 *
		 * @link https://codex.wordpress.org/Post_Formats
		 * @since 3.1
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'audio',
				'chat',
				'gallery',
				'image',
				'link',
				'video',
				'quote',
				'status',
			)
		);

		/*
		 * Register menus location for primary header menu.
		 * use wp_nav_menu( 'location' ) to list menu at given location.
		 */
		register_nav_menus(
			array(
				'header_menu' => __( 'Header Menu', 'friendly-lite' ),
			)
		);
		 
	}
}

add_action( 'after_setup_theme', 'friendly_lite_setup' );

if ( ! function_exists( 'friendly_lite_content_width' ) ) {

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function friendly_lite_content_width() {
		$content_width = 840;
		/**
		 * Filter Friendly Lite content width of the theme.
		 *
		 * @param $content_width integer
		 */
		$GLOBALS['content_width'] = apply_filters( 'friendly_lite_content_width', $content_width );
	}
}

add_action( 'after_setup_theme', 'friendly_lite_content_width', 0 );

/**
 * Reset the content width for a full width page template.
 */
function friendly_lite_adjust_content_width() {
	global $content_width;

	if ( is_page_template( 'template-fullwidth.php' ) ) {
		$content_width = 1140;
	}
}

add_action( 'template_redirect', 'friendly_lite_adjust_content_width' );
