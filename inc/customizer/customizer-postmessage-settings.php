<?php
/**
 * Set transport property of settings as required to postMessage.
 * So that a theme user can instantly see the changes without reloading
 * the preview panel.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Update settings transport property under site identity section.
$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

// Update settings transport property under color section.
$wp_customize->get_setting( 'header_textcolor' )->transport    = 'postMessage';
$wp_customize->get_setting( 'background_color' )->transport    = 'postMessage';
$wp_customize->get_setting( 'title_tagline_color' )->transport = 'postMessage';


// Update transport properties of settings under contact info section.
$wp_customize->get_setting( 'mobile_no' )->transport = 'postMessage';
$wp_customize->get_setting( 'email_id' )->transport  = 'postMessage';
$wp_customize->get_setting( 'skype_add' )->transport = 'postMessage';
