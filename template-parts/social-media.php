<?php
/**
 * Template part for displaying social media icons in header/footer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

?>

<?php if ( get_theme_mod( 'facebook_url', '#' ) ) : ?>
	<li class="social-icon facebook">
		<a href="<?php echo esc_url( get_theme_mod( 'facebook_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View us on facebook', 'friendly-lite' ); ?>"><i class="fa fa-facebook" aria-hidden="true" title="<?php esc_attr_e( 'View us on facebook', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'twitter_url', '#' ) ) : ?>
	<li class="social-icon twitter">
		<a href="<?php echo esc_url( get_theme_mod( 'twitter_url' ) ); ?>"  aria-label="<?php esc_attr_e( 'View us on twitter', 'friendly-lite' ); ?>">
			<i class="fa fa-twitter" aria-hidden="true" title="<?php esc_attr_e( 'View us on twitter', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'likedin_url', '#' ) ) : ?>
	<li class="social-icon linkedin">
		<a href="<?php echo esc_url( get_theme_mod( 'likedin_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View us on linkedin', 'friendly-lite' ); ?>">
			<i class="fa fa-linkedin" aria-hidden="true" title="<?php esc_attr_e( 'View us on linkedin', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'google_plus_url', '#' ) ) : ?>
	<li class="social-icon googleplus">
		<a href="<?php echo esc_url( get_theme_mod( 'google_plus_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View us on google+', 'friendly-lite' ); ?>">
			<i class="fa fa-google-plus" aria-hidden="true" title="<?php esc_attr_e( 'View us on google+', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'youtube_url', '#' ) ) : ?>
	<li class="social-icon youtube">
		<a href="<?php echo esc_url( get_theme_mod( 'youtube_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View us on youtube', 'friendly-lite' ); ?>">
			<i class="fa fa-youtube" aria-hidden="true"  title="<?php esc_attr_e( 'View us on youtube', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'instagram_url', '#' ) ) : ?>
		<li class="social-icon instagram">
			<a href="<?php echo esc_url( get_theme_mod( 'instagram_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View us on instagram', 'friendly-lite' ); ?>">
				<i class="fa fa-instagram" aria-hidden="true"  title="<?php esc_attr_e( 'View us on instagram', 'friendly-lite' ); ?>"></i>
			</a>
		</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'flicker_url', '#' ) ) : ?>
	<li class="social-icon flickr">
		<a href="<?php echo esc_url( get_theme_mod( 'flicker_url' ) ); ?>"  aria-label="<?php esc_attr_e( 'View us on flicker', 'friendly-lite' ); ?>">
			<i class="fa fa-flickr" aria-hidden="true"  title="<?php esc_attr_e( 'View us on flicker', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>

<?php if ( get_theme_mod( 'rss_url', '#' ) ) : ?>
	<li class="social-icon rss">
		<a href="<?php echo esc_url( get_theme_mod( 'rss_url' ) ); ?>" aria-label="<?php esc_attr_e( 'View rss feed', 'friendly-lite' ); ?>">
			<i class="fa fa-rss" aria-hidden="true"  title="<?php esc_attr_e( 'View rss feed', 'friendly-lite' ); ?>"></i>
		</a>
	</li>
<?php endif; ?>
