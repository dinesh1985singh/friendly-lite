<?php
/**
 * Template part for displaying aside post content.
 * Displays text, HTML and non-attached/embedded content upto one or two paragraphs max.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

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

		/*
		 * As aside post should not be more than a para or two. 
		 * So independent of setting set to display post in either excerpt or full
		 * We are displaying full post.
		 */
		the_content(); 
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php friendly_lite_entry_footer_meta(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
