<?php
/**
 * Add controls and settings of a color section in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

/******************************************************
 * Color Section Options
 *******************************************************/

$wp_customize->get_control( 'background_color' )->priority = 11;
$wp_customize->get_control( 'header_textcolor' )->priority = 55;

$wp_customize->add_setting(
	'title_tagline_color',
	array(
		'default'           => '#0b448b',
		'transport'         => 'refresh',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_hex_colors',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'title_tagline_color',
		array(
			'label'       => __( 'Site Branding Color', 'friendly-lite' ),
			'description' => __( 'Header text Color when hero image is disabled.', 'friendly-lite' ),
			'section'     => 'colors',
			'settings'    => 'title_tagline_color',
			'priority'    => 60,
		)
	)
);
