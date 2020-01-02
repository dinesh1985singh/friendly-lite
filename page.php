<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages,
 * and depending on the template assigned to page, other
 * 'pages' on your WordPress site may use a different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
$page_layout     = get_theme_mod( 'default_page_layout', 'right-sidebar' );
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
		<div id="primary" class="<?php echo esc_attr( $primary_class ); ?> content-area">
			<main id="main" class="site-main" role="main">
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					// Include the content-page.php template for the page content.
					get_template_part( 'template-parts/page/content', 'page' );

					/*
					 * If comments are open or we have at least one comment,
					 * load up the comment template.
					 */
					if ( comments_open() || get_comments_number() ) :
						comments_template();
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
