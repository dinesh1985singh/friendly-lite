<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<section class="no-results not-found" >
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found!', 'friendly-lite' ); ?></h1>
	</header><!-- .page-header -->
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p>
				<?php
				$new_post_link = '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">' . __( 'Get started here', 'friendly-lite' ) . '</a>';
				printf(
					/* translators: %s: new post url */
					esc_html__( 'Ready to publish your first post? %s', 'friendly-lite' ),
					$new_post_link
				);
				?>
			</p>
		<?php else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'friendly-lite' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
