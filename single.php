<?php
/**
 * Single post template file.
 *
 * This template is used for displaying detailed single post page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
$page_layout     = get_theme_mod( 'default_post_layout', 'right-sidebar' );
$primary_class   = 'col-md-12';
$secondary_class = 'col-md-3';
if ( 'right-sidebar' == $page_layout ) :
	$primary_class = 'col-md-9';
elseif ( 'left-sidebar' == $page_layout ) :
	$primary_class   = 'col-md-9 col-md-push-3';
	$secondary_class = 'col-md-3 col-md-pull-9';
endif;
?>
<div class="container">
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $primary_class ); ?> content-area" >
			<main id="main" class="site-main" role="main" >
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used
					 * instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

					// Display post navigation.
					the_post_navigation(
						array(
							'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous Post', 'friendly-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'friendly-lite' ) . '</span> <span class="nav-title">%title</span>',
							'next_text'          => '<span class="screen-reader-text">' . __( 'Next Post', 'friendly-lite' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'friendly-lite' ) . '</span><span class="nav-title">%title</i></span>',
							'screen_reader_text' => __( 'Continue Reading', 'friendly-lite' ),
						)
					);

					/*
					 * If comments are open or we have at least one comment,
					 * load up the comment template.
					 */
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					else :
						echo '<p class="no-comment">' . _e( 'Comments are closed.', 'friendly-lite' ) . '</p>';
					endif;
				endwhile;// End of the loop.
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php

		/*
		 * Include sidebar only if the page layout is not set
		 * to fullwidth.
		 */
		if ( 'no-sidebar' != $page_layout ) :
			get_sidebar();
		endif;
		?>
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
