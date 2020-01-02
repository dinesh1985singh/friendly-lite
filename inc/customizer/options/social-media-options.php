<?php
/**
 * Add controls and settings of a social media section in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/***************************************************
 *  Social Media Section and its Options
 ************************************************* */

// Adding Social Media Section.
$wp_customize->add_section(
	'social_media',
	array(
		'title'       => __( 'Social Media', 'friendly-lite' ),
		'description' => '',
		'capability'  => 'edit_theme_options',
		'priority'    => 10,
	)
);

// Social Media Settings and Controls.
$wp_customize->add_setting(
	'header_social_icons',
	array(
		'default'           => true,
		'transport'         => 'refresh', // Optional defaut to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'header_social_icons',
	array(
		'label'       => __( 'Display Social Icons in header top?', 'friendly-lite' ),
		'description' => '',
		'type'        => 'checkbox',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'header_social_icons', // Setting if not specified maps to the setting with same id as control ID.
		'priority'    => 20,
	)
);

$wp_customize->add_setting(
	'footer_social_icons',
	array(
		'default'           => true,
		'transport'         => 'refresh', // Optional defaults to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'footer_social_icons',
	array(
		'label'       => __( 'Display Social Icons In footer?', 'friendly-lite' ),
		'description' => '',
		'type'        => 'checkbox',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'footer_social_icons',
		'priority'    => 40, // Within the section.
	)
);

$wp_customize->add_setting(
	'facebook_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'facebook_url',
	array(
		'label'       => __( 'Facebook Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'facebook_url',
		'priority'    => 60, // Within the section.
	)
);

$wp_customize->add_setting(
	'twitter_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'twitter_url',
	array(
		'label'       => __( 'Twitter Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'twitter_url',
		'priority'    => 80, // Within the section.
	)
);

$wp_customize->add_setting(
	'likedin_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'likedin_url',
	array(
		'label'       => __( 'Linkedin Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media',
		'setting'     => 'likedin_url',
		'priority'    => 100,
	)
);

$wp_customize->add_setting(
	'google_plus_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'google_plus_url',
	array(
		'label'       => __( 'Google Plus Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'google_plus_url',
		'priority'    => 120, // Within the section.
	)
);

$wp_customize->add_setting(
	'youtube_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'youtube_url',
	array(
		'label'       => __( 'Youtube Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media',
		'setting'     => 'youtube_url', // Optional defaults to control ID.
		'priority'    => 140,
	)
);

$wp_customize->add_setting(
	'instagram_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh', // Optional default to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'instagram_url',
	array(
		'label'       => __( 'Instragram Url', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'instagram_url',
		'priority'    => 160, // Within the section.
	)
);

$wp_customize->add_setting(
	'flicker_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh', // Optional default to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'flicker_url',
	array(
		'label'       => __( 'Flickr URL', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'flicker_url',
		'priority'    => 180, // Within the section.
	)
);

$wp_customize->add_setting(
	'rss_url',
	array(
		'default'           => '#',
		'transport'         => 'refresh', // Optional default to refresh.
		'type'              => 'theme_mod', // Or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_urls',
		'validate_callback' => 'friendly_lite_validate_urls',
	)
);

$wp_customize->add_control(
	'rss_url',
	array(
		'label'       => __( 'Rss URL', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'social_media', // Required, core or custom.
		'setting'     => 'rss_url',
		'priority'    => 200, // Within the section.
	)
);
