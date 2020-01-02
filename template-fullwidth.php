<?php
/**
 * Template Name: Full Width Page
 * Description: Render page in full width without any sidebar.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-12 content-area">
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
	</div><!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>
