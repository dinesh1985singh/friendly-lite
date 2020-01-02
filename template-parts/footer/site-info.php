<?php
/**
 * Displays footer site info.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$copyright_text = get_theme_mod( 'copyright_text' );
if ( ! empty( $copyright_text ) ) :
	// Prefix the copyright text with copyright symbol.
	echo esc_html( $copyright_text );
else :
	printf(
		/* translators: %s: the year */
		esc_html__( 'Copyright &copy; %s', 'friendly-lite' ),
		date_i18n( 'Y' )
	);
endif;
?>
<span class="sep"> | </span>
<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'friendly-lite' ) ); ?>">
	<?php
	$powered_by = 'WordPress';
	printf(
		/* translators: %s: the company name */
		__( 'Proudly powered by %s', 'friendly-lite' ),
		$powered_by
	);
	?>
</a>
