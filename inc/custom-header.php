<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Deoity Blog
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses friendly_lite_header_style()
 */
function friendly_lite_custom_header_setup() {

	/**
	 * Filter Deoity Blog custom-header support arguments.
	 *
	 * @since Deoity Blog 1.0.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image       Default image of the header.
	 *     @type string $default_text_color  Default color of the header text.
	 *     @type int    $width               Width in pixels of the custom header image. Default 2000.
	 *     @type int    $height              Height in pixels of the custom header image. Default 1200.
	 *     @type string $wp-head-callback    Callback function used to styles the header image and text
	 *                                       displayed on the blog.
	 *     @type string $flex-height         Flex support for height of header.
	 * }
	 */
	add_theme_support(
		'custom-header',
		apply_filters(
			'friendly_lite_custom_header_args',
			array(
				'default-image'      => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
				'header-text'        => true,
				'default-text-color' => 'ffffff',
				'flex-width'         => true,
				'width'              => 1920,
				'height'             => 680,
				'flex-height'        => true,
				'wp-head-callback'   => 'friendly_lite_header_style',
			)
		)
	);

	/*
	 * Default custom headers packaged with the theme.
	 * The %s is a placeholder for the theme template directory URI, so place the images
	 * in your theme directory.
	 *
	 * To reference a image in a child theme (i.e in the stylesheet directory),
	 * use %2$s instead of %s.
	 */
	register_default_headers(
		array(
			'default-image' => array(
				'url'           => '%s/assets/images/header.jpg',
				'thumbnail_url' => '%s/assets/images/header-thumbnail.jpg',
				'description'   => __( 'Default Header Image', 'friendly-lite' ),
			),
		)
	);
}

add_action( 'after_setup_theme', 'friendly_lite_custom_header_setup' );


if ( ! function_exists( 'friendly_lite_header_style' ) ) {
	/**
	 * Styles the header text i.e site title and tagline displayed on the blog.
	 *
	 * @see friendly_lite_custom_header_setup().
	 */
	function friendly_lite_header_style() {

		$header_text_color = get_header_textcolor(); // Return 3 or 6 char hex value with # skipped.

		// If no value is set for the header text color.
		if ( get_theme_support( 'custom-header', 'default-text-color' ) == $header_text_color ) {
			return;
		}

		// If we get this far lets add custom style.
		?>
		<style id="friendly-lite-custom-header-styles" type="text/css">
		<?php 
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
			?>
				.site-title,
				.site-description {
					position: absolute;
					clip: rect(1px, 1px, 1px, 1px);
				}
			<?php 
			// If the user has set a color for the header text use that. 
			else :
				?>
				.hero-img-on .site-description,
				.hero-img-on .site-title,
				.hero-img-on .site-title a, 
				.hero-img-on .site-title a:hover,
				.hero-img-on .site-title a:focus {
					color: #<?php echo esc_attr( $header_text_color ); ?>;
				}
				<?php
			endif;
			?>
		</style>
		<?php
	}
}
