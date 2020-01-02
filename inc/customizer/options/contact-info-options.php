<?php
/**
 * Add controls and settings of a contact info section in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/********************************************************
 * Contact info & its Options
 ******************************************************** */

// Add Contact Info Section.
$wp_customize->add_section(
	'contact_info',
	array(
		'title'       => __( 'Contact Info', 'friendly-lite' ),
		'description' => '',
		'capability'  => 'edit_theme_options',
		'priority'    => 11,
	)
);

// Adding controls and setting for contact info section.
$wp_customize->add_setting(
	'mobile_no',
	array(
		'default'           => '(+91) 001 001 001',
		'transport'         => 'refresh',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_text',
		'validate_callback' => 'friendly_lite_validate_phone',
	)
);

$wp_customize->add_control(
	'mobile_no',
	array(
		'label'       => __( 'Mobile Number', 'friendly-lite' ),
		'description' => __( 'Display Contact number in top menu bar.', 'friendly-lite' ),
		'type'        => 'text',
		'section'     => 'contact_info', // Required, core or custom.
		'setting'     => 'mobile_no',
		'priority'    => 20, // Within the section.
	)
);

$wp_customize->add_setting(
	'email_id',
	array(
		'default'           => 'sales@domainname.com',
		'transport'         => 'refresh',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_email',
		'validate_callback' => 'friendly_lite_validate_email',
	)
);

$wp_customize->add_control(
	'email_id',
	array(
		'label'       => __( 'Email', 'friendly-lite' ),
		'description' => '',
		'type'        => 'text', // if I changed it to email then refresh would not take effect on keyup.
		'section'     => 'contact_info', // Required, core or custom.
		'setting'     => 'email_id',
		'priority'    => 40, // Within the section.
	)
);

$wp_customize->add_setting(
	'skype_add',
	array(
		'default'           => 'contactmeatskype',
		'transport'         => 'refresh',
		'type'              => 'theme_mod', // or 'option'.
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'friendly_lite_sanitize_text',
		'validate_callback' => 'friendly_lite_validate_skype_id',
	)
);

$wp_customize->add_control(
	'skype_add',
	array(
		'label'     => __( 'Skype Address', 'friendly-lite' ),
		'transport' => 'refresh',
		'type'      => 'text',
		'section'   => 'contact_info', // Required, core or custom.
		'setting'   => 'skype_add',
		'priority'  => 60, // Within the section.
	)
);
