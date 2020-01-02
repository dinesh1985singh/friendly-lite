<?php
/**
 * The template part for displaying chat posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

global $post_listing_display;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) :
			echo '<div class="entry-meta">';
				friendly_lite_entry_header_meta();
			echo '</div><!-- .entry-meta -->';
		endif;
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if ( ! is_single() ) :

			if ( 'post-excerpt' == $post_listing_display ) :
				the_excerpt();
			else :
				the_content(
					sprintf(
						/* translators: 1: Name of current post, 2: rightward arrow */
						__( 'Continue reading %1$s %2$s', 'friendly-lite' ),
						the_title( '<span class="screen-reader-text">', '</span>', false ),
						'<span class="meta-nav">&rarr;</span>'
					)
				);
			endif;
		else :
			the_content();

			/*
			 * Display paginated link when <!--nextpage--> tag used in post content only
			 * on detail page.
			 */
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">
					<span class="page-links-title">' . __( 'Pages:', 'friendly-lite' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				)
			);
		endif;
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php friendly_lite_entry_footer_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
