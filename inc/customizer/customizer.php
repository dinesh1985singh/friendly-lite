<?php
/**
 * Main customizer setup file.
 *
 * This is the file where we setup the whole customizer. First of all
 * support for customizer being enabled and then all files related
 * to customizer being included. All control panel, preview panel's scripts
 * and styles enqueued being added here as well.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'friendly_lite_customize_register' ) ) {
	
	/**
	 * Register theme specific section, controls and settings.
	 *
	 * @param object $wp_customize Theme Customizer ( i.e WP_Customize_Manager ) object.
	 */
	function friendly_lite_customize_register( $wp_customize ) {
		
		include get_theme_file_path( '/inc/customizer/custom-controls/class-friendly-lite-helper-control.php' );
		include get_theme_file_path( '/inc/customizer/custom-controls/class-friendly-lite-layout-picker.php' );
		
		include get_theme_file_path( '/inc/customizer/sanitize-callback.php' );
		include get_theme_file_path( '/inc/customizer/options/page-layouts-options.php' );
		include get_theme_file_path( '/inc/customizer/options/general-settings-options.php' );
		include get_theme_file_path( '/inc/customizer/options/social-media-options.php' );
		include get_theme_file_path( '/inc/customizer/options/contact-info-options.php' );
		include get_theme_file_path( '/inc/customizer/options/color-options.php' );

		// Rename default "Static Front Page" section title to "Home Page Setting".
		$wp_customize->get_section( 'static_front_page' )->title = __( 'Home Page Setting', 'friendly-lite' );

		// Disable automatic refresh behavior when you change setting value.
		include get_theme_file_path( '/inc/customizer/customizer-postmessage-settings.php' );
	}
}
add_action( 'customize_register', 'friendly_lite_customize_register' );

/**
 * Used by hook: 'customize_controls_enqueue_scripts'.
 *
 * @see add_action( 'customize_controls_enqueue_scripts', $func )
 */
function friendly_lite_control_pane_script_styles() {

	wp_enqueue_style(
		'friendly-lite-customizer-controls-css',
		PARENT_URL . 'inc/customizer/assets/css/customizer-controls.css', 
		false,
		'1.0.0' // Same as our theme.
	);

}

/**
 * Used by hook: 'customize_preview_init'.
 * Required to refelect the settings effect in preview window
 * when you set transport  property to postmessage.
 *
 * @see add_action('customize_preview_init',$func)
 */
function friendly_lite_preview_pane_script_styles() {
	wp_enqueue_style( 
		'friendly-lite-theme-customizer-css', 
		PARENT_URL . '/inc/customizer/assets/css/theme-customizer.css', 
		false, 
		'1.0.0' // Same as our theme.
	);

	wp_enqueue_script(
		'friendly-lite-theme-customizer-js', // Script ID.
		PARENT_URL . '/inc/customizer/assets/js/theme-customizer.js',
		array(
			'jquery',
			'customize-preview',
		), // Define dependency.
		'1.0.0', // Same as out theme.
		true // Put scripts in footer.
	);
}

// Add scripts and styles for controls in customizer control pane view.
add_action( 'customize_controls_enqueue_scripts', 'friendly_lite_control_pane_script_styles' );

// Handle instant update without reloading the preview window.
add_action( 'customize_preview_init', 'friendly_lite_preview_pane_script_styles' );

if ( ! function_exists( 'friendly_lite_customizer_generated_css' ) ) {

	/**
	 * Generates revised CSS rules as per setting values changed through customizer.
	 */
	function friendly_lite_customizer_generated_css() {
		?>
		<style type="text/css" id="friendly-lite-customizer-style" >
				.hero-img-off .site-branding,
				.hero-img-off .site-description,
				.hero-img-off .site-title,
				.hero-img-off .site-title a,
				.hero-img-off .site-title a:hover,
				.hero-img-off .site-title a:focus {
					color: <?php echo get_theme_mod( 'title_tagline_color', '#0b448b' ); ?>
				}
		</style>
		<?php
	}
}

/*
 * Output CSS on frontend in head section.
 * Priority is important here, without priority css output would come after
 * custom header styles added in custom-header.php.
 */
add_action( 'wp_head', 'friendly_lite_customizer_generated_css', 20 );
