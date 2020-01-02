<?php
/**
 * Add widget areas into the theme.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! function_exists( 'friendly_lite_sidebar' ) ) {
	/**
	 *
	 * Register different sidebars for a theme.
	 *
	 * There should be one sidebar  for theme to be successful on wordpress.org.
	 */
	function friendly_lite_sidebar() {
		register_sidebar(
			array(
				'id'            => 'primary-sidebar',
				'name'          => __( 'Primary Sidebar', 'friendly-lite' ),
				'description'   => __( 'A widgetized area for left or right sidebar.', 'friendly-lite' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'id'            => 'footer-1',
				'name'          => __( 'Left Most Footer', 'friendly-lite' ),
				'description'   => __( 'Left most footer widgetized area.', 'friendly-lite' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'id'            => 'footer-2',
				'name'          => __( 'Middle Footer', 'friendly-lite' ),
				'description'   => __( 'Middle footer widgetized area.', 'friendly-lite' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'id'            => 'footer-3',
				'name'          => __( 'Right Most Footer', 'friendly-lite' ),
				'description'   => __( 'A right most footer widgetized area.', 'friendly-lite' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
}

// Create widgetized_area for deoity blog.
add_action( 'widgets_init', 'friendly_lite_sidebar' );
