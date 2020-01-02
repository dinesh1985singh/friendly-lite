<?php
/**
 * Displays header site branding info. 
 * Includes custom logo, site title and site tagline/description.
 *
 * @package Friendly_Lite
 * @since 1.0
 * @version 1.0
 */

?>

<?php if ( true == display_header_text() || is_customize_preview() ) : ?>
	<div class="site-branding">
		<?php
		$site_title = get_bloginfo( 'name' );
		$tagline    = get_bloginfo( 'description' );
		?>
		<?php if ( ! empty( $site_title ) || ! empty( $tagline ) || has_custom_logo() ) : ?>
			<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
				<div class="site-logo"><?php the_custom_logo(); ?></div>	
			<?php endif; ?>
			<div class="site-info">
				<?php if ( ! empty( $site_title ) ) : ?>
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $site_title ); ?></a>
						</h1>
					<?php else : ?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $site_title ); ?></a>
							</p>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( ! empty( $tagline ) ) : ?>
						<p class="site-description"><?php echo esc_html( $tagline ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding-text -->
		<?php endif; ?>
	</div><!-- .site-branding -->
<?php endif; ?>
