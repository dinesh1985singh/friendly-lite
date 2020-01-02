<?php
/**
 * The Template part for displaying image posts.
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
			the_title(
				'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
				'</a></h2>'
			);
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
		if ( '' !== get_the_post_thumbnail() ) :

			// Display featured image if assigned.
			friendly_lite_featured_image();
		else :
			$content = get_the_content();
			if ( ! wp_http_validate_url( $content ) ) :
				the_content();
			else :
				/* 
				 * If the url is a valid url, render the image with that url 
				 * as that url should be supposed to image url.
				 */
				echo '<img src="' . esc_url( $content ) . '" alt="' . esc_attr( get_the_title() ) . '" title="' . esc_attr( get_the_title() ) . '">';
			endif;
		endif;
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php friendly_lite_entry_footer_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
