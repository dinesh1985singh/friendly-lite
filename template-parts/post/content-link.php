<?php
/**
 * Template part for displaying link posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>
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
		$content = get_the_content();
		if ( ! wp_http_validate_url( $content ) ) :
			the_content(); // Display link embedded inside content area.
		else :
			echo '<p><a href="' . esc_url( $content ) . '">' . get_the_title() . '</a></p>';
		endif;
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php friendly_lite_entry_footer_meta(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
