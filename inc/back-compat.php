<?php
/**
 * Friendly Lite back compat functionality.
 *
 * Prevents Friendly Lite from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Prevent switching to Friendly Lite on WordPress versions prior to 4.7.
 *
 * Switches to the default theme.
 */
function friendly_lite_theme_switch() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'friendly_lite_admin_notice' );
}

/**
 * Display admin notification on unsuccessful theme switch.
 * Prints an update nag after an unsuccessful attempt to switch to
 * Friendly Lite on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function friendly_lite_admin_notice() {
	$update_message = sprintf(
		/* translators: %s: WordPress version */
		__( 'This theme requires WordPress version 4.7 or newer. You&rsquo;re currently using version %s. Please upgrade.', 'friendly-lite' ),
		$GLOBALS['wp_version']
	);
	printf( '<div class="error"><p>%s</p></div>', $update_message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function friendly_lite_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress version */
			__( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'friendly-lite' ),
			$GLOBALS['wp_version']
		),
		'',
		array( 'back_link' => true )
	);
}

add_action( 'load-customize.php', 'friendly_lite_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function friendly_lite_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die(
			sprintf(
				/* translators: %s: WordPress version */
				__( 'This theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'friendly-lite' ),
				$GLOBALS['wp_version']
			)
		);
	}
}

add_action( 'template_redirect', 'friendly_lite_preview' );
