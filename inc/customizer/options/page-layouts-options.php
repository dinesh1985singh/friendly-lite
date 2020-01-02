<?php
/**
 * Add panel, sections, controls and settings for page layouts panel
 * in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/***********************************************************
 * Page Layout Panel Sections and Options
 ********************************************************** */
$wp_customize->add_panel(
	'page_layouts',
	array(
		'title'       => __( 'Page Layouts', 'friendly-lite' ),
		'description' => __( 'Set layout for different pages here.', 'friendly-lite' ),
		'priority'    => 10, // Typically not needed. Default is 160.
	)
);

/***********************************************************
 * Page Layout Sections
 ********************************************************** */
$wp_customize->add_section(
	'blog_layout',
	array(
		'title'       => __( 'Blog Page Layout', 'friendly-lite' ),
		'description' => __( 'Main Blog page layout settings.', 'friendly-lite' ),
		'panel'       => 'page_layouts',
		'capability'  => 'edit_theme_options',
		'priority'    => 20,
	)
);
$wp_customize->add_section(
	'post_layout',
	array(
		'title'       => __( 'Default Post Layout', 'friendly-lite' ),
		'description' => __( 'Default post page layout setting.', 'friendly-lite' ),
		'panel'       => 'page_layouts',
		'capability'  => 'edit_theme_options',
		'priority'    => 40,
	)
);
$wp_customize->add_section(
	'page_layout',
	array(
		'title'       => __( 'Default Page Layout', 'friendly-lite' ),
		'description' => __( 'Default Page Layout Settings.', 'friendly-lite' ),
		'panel'       => 'page_layouts',
		'capability'  => 'edit_theme_options',
		'priority'    => 60,
	)
);
$wp_customize->add_section(
	'archive_layout',
	array(
		'title'       => __( 'Archive Page Layout', 'friendly-lite' ),
		'description' => __( 'Archive Page Layout Settings.', 'friendly-lite' ),
		'panel'       => 'page_layouts',
		'capability'  => 'edit_theme_options',
		'priority'    => 80,
	)
);

/******************************************************
 * Blog Layout Section Options
 ****************************************************** */
$wp_customize->add_setting(
	'default_blog_layout',
	array(
		'default'           => 'right-sidebar',
		'transport'         => 'refresh', // Optional default to refresh.
		'type'              => 'theme_mod', // Or 'option', optional default to theme_mod.
		'capability'        => 'edit_theme_options', // Optional defauls to edit_theme_options.
		'theme_supports'    => '', // Optional rarely needed.
		'sanitize_callback' => 'friendly_lite_sanitize_layout_options',
	)
);
$wp_customize->add_control(
	new Friendly_Lite_Layout_Picker(
		$wp_customize,
		'default_blog_layout',
		array(
			'label'       => __( 'Select you blog page layout.', 'friendly-lite' ), // Optional.
			'description' => '', // Optional.
			'type'        => 'layout',
			'section'     => 'blog_layout',
			'settings'    => 'default_blog_layout',
			'priority'    => 10,
		)
	)
);

/******************************************************
 * Post Layout Section Options
 ***************************************************** */
$wp_customize->add_setting(
	'default_post_layout',
	array(
		'default'           => 'right-sidebar',
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option', optional default to theme_mod.
		'capability'        => 'edit_theme_options', // Optional defauls to edit_theme_options.
		'sanitize_callback' => 'friendly_lite_sanitize_layout_options',
	)
);
$wp_customize->add_control(
	new Friendly_Lite_Layout_Picker(
		$wp_customize,
		'default_post_layout',
		array(
			'label'       => __( 'Select your post layout.', 'friendly-lite' ),
			'description' => '', // Optional.
			'type'        => 'layout',
			'section'     => 'post_layout',
			'settings'    => 'default_post_layout',
			'priority'    => 20,
		)
	)
);

/******************************************************
 * Page Layout Section Options
 ***************************************************** */
$wp_customize->add_setting(
	'default_page_layout',
	array(
		'default'           => 'right-sidebar',
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option', optional default to theme_mod.
		'capability'        => 'edit_theme_options', // Optional defaults to edit_theme_options.
		'sanitize_callback' => 'friendly_lite_sanitize_layout_options',
	)
);
$wp_customize->add_control(
	new Friendly_Lite_Layout_Picker(
		$wp_customize,
		'default_page_layout',
		array(
			'label'       => __( 'Select you page layout.', 'friendly-lite' ),
			'description' => '', // Optional.
			'type'        => 'layout',
			'section'     => 'page_layout',
			'settings'    => 'default_page_layout',
			'priority'    => 40,
		)
	)
);

/******************************************************
 * Arcive Layout Section Options
 ***************************************************** */
$wp_customize->add_setting(
	'default_archive_layout',
	array(
		'default'           => 'right-sidebar',
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option', optional default to theme_mod.
		'capability'        => 'edit_theme_options', // Optional defauls to edit_theme_options.
		'sanitize_callback' => 'friendly_lite_sanitize_layout_options',
	)
);
$wp_customize->add_control(
	new Friendly_Lite_Layout_Picker(
		$wp_customize,
		'default_archive_layout',
		array(
			'label'       => __( 'Select your archive layout.', 'friendly-lite' ),
			'description' => __( 'This layout would be same for all category/tags archive pages.', 'friendly-lite' ),
			'type'        => 'layout',
			'section'     => 'archive_layout',
			'settings'    => 'default_archive_layout',
			'priority'    => 60,
		)
	)
);
