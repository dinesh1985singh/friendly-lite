<?php
/**
 * Template part for displaying page content in page.php.
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
		if ( ! is_front_page() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
		friendly_lite_edit_link();
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages: ', 'friendly-lite' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
