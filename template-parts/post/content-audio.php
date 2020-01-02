<?php
/**
 * The Template part for displaying audio posts.
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
	<?php
	$content = apply_filters( 'the_content', get_the_content() );
	$audio   = false;

	// Only get audio from the content if a playlist isn't present.
	if ( false === strpos( $content, 'wp-playlist-script' ) ) :
		$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
	endif;
	?>
	<div class="entry-content">
		<?php
		if ( ! is_single() ) :

			// If not a single post, highlight the audio file.
			if ( ! empty( $audio ) ) :
				foreach ( $audio as $audio_html ) :
					echo '<div class="entry-audio">';
						echo $audio_html;
					echo '</div><!-- .entry-audio -->';
				endforeach;
			elseif ( ! empty( $content ) ) :
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
			endif;

		else :
			the_content();

			// Display paginated link when <!--nextpage--> tag used in post content.
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . __( 'Pages: ', 'friendly-lite' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
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
