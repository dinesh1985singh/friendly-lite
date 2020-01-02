<?php
/**
 * Add controls and settings of a general settings section and section 
 * itself in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/*********************************************
 * General Setting's Section Options
 ******************************************* */

// Adding General Setting Secion in default Customizer Context.
$wp_customize->add_section(
	'general_settings',
	array(
		'title'       => __( 'General Settings', 'friendly-lite' ),
		'description' => __( 'Site Wide General setting configurations.', 'friendly-lite' ),
		'capability'  => 'edit_theme_options',
		'priority'    => 10,
	)
);
$wp_customize->add_setting(
	'display_home_hero_img',
	array(
		'default'           => true,
		'transport'         => 'refresh', // optional defaut to refresh.
		'type'              => 'theme_mod', // or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	'display_home_hero_img',
	array(
		'label'       => __( 'Display hero image?', 'friendly-lite' ),
		'description' => __( 'Toggle hero page hero image on or off.', 'friendly-lite' ),
		'type'        => 'checkbox',
		'section'     => 'general_settings', // Required, core or custom.
		'settings'    => 'display_home_hero_img', // Setting if not specified maps to the setting with same id as control ID.
		'priority'    => 20, // Within the section.
	)
);

$wp_customize->add_setting(
	'menu_search_box',
	array(
		'default'           => true,
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'menu_search_box',
	array(
		'label'       => __( 'Show search box on navigation?', 'friendly-lite' ),
		'description' => __( 'Show/Hide search box in navigation menu.', 'friendly-lite' ),
		'type'        => 'checkbox',
		'section'     => 'general_settings', // Required, core or custom.
		'settings'    => 'menu_search_box', // Setting if not specified maps to the setting with same id as control ID.
		'priority'    => 40, // Within the section.
	)
);

$wp_customize->add_setting(
	'site_preloader',
	array(
		'default'           => true,
		'transport'         => 'refresh', // Optional defauts to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'site_preloader',
	array(
		'label'       => __( 'Enable Preloader?', 'friendly-lite' ),
		'description' => __( 'Preloader will load until content get displayed.', 'friendly-lite' ),
		'type'        => 'checkbox',
		'section'     => 'general_settings', // Required, core or custom.
		'settings'    => 'site_preloader', // Setting if not specified maps to the setting with same id as control ID.
		'priority'    => 60, // Within the section.
	)
);

$wp_customize->add_setting(
	'back_to_top',
	array(
		'default'           => true,
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'back_to_top',
	array(
		'label'       => __( 'Display back to top button?', 'friendly-lite' ),
		'description' => __( 'Show/Hide back to top button.', 'friendly-lite' ),
		'type'        => 'checkbox',
		'section'     => 'general_settings', // Required, core or custom.
		'priority'    => 80, // Within the section.
	)
);

$wp_customize->add_setting(
	'blog_post_listing_display',
	array(
		'default'           => 'post-excerpt',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_choices',
	)
);

$wp_customize->add_control(
	'blog_post_listing_display',
	array(
		'label'       => __( 'How would you like to display post on listing pages?', 'friendly-lite' ),
		'description' => __( 'Display posts in excerpt or full view.', 'friendly-lite' ),
		'type'        => 'radio',
		'section'     => 'general_settings', // Required, core or custom.
		'choices'     => array(
			'post-excerpt' => __( 'Post Excerpt', 'friendly-lite' ),
			'full-post'    => __( 'Full Post', 'friendly-lite' ),
		),
		'priority'    => 100, // Within the section.
	)
);

$wp_customize->add_setting(
	'footer_widgets_areas',
	array(
		'default'           => 3,
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_choices',
	)
);

$wp_customize->add_control(
	'footer_widgets_areas',
	array(
		'label'       => __( 'Number of footer widget area.', 'friendly-lite' ),
		'description' => __( 'Number of footer widget areas you want to have in footer.', 'friendly-lite' ),
		'type'        => 'select',
		'section'     => 'general_settings', // Required, core or custom.
		'choices'     => array(
			1 => __( '1', 'friendly-lite' ),
			2 => __( '2', 'friendly-lite' ),
			3 => __( '3', 'friendly-lite' ),
		),
		'priority'    => 140, // Within the section.
	)
);

$readmore_default = __( 'Continue Reading', 'friendly-lite' ); 
$wp_customize->add_setting(
	'readmore_text',
	array(
		'default'           => $readmore_default,
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_html', // Remove all HTML from content.
	)
);
$wp_customize->add_control(
	'readmore_text',
	array(
		'label'       => __( 'Read More', 'friendly-lite' ),
		'description' => __( 'Read More text to be displayed.', 'friendly-lite' ),
		'type'        => 'text',
		'section'     => 'general_settings', // Required, core or custom.
		'settings'    => 'readmore_text',
		'priority'    => 160, // Within the section.
	)
);

$default_copyright = '&copy;' . __( 'Copyright', 'friendly-lite' ) . ' ' . date( 'Y' ) . '.';
$wp_customize->add_setting(
	'copyright_text',
	array(
		'default'           => $default_copyright,
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_html',
		
	)
);

$wp_customize->add_control(
	'copyright_text',
	array(
		'label'       => __( 'Copyright Text.', 'friendly-lite' ),
		'description' => __( 'Copyright text to be displayed on site.', 'friendly-lite' ),
		'type'        => 'textarea',
		'section'     => 'general_settings', // Required, core or custom.
		'priority'    => 180, // Within the section.
	)
);
