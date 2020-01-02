<?php
/**
 * The sidebar containing the main widget area.
 * Defines sidebar content.
 * If no active widgets are in the sidebar, display search,
 * archive and category widgets by default.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

global $secondary_class;

?>
<div id="secondary" class="<?php echo esc_attr( $secondary_class ); ?> primary-sidebar" role="complementary">
	<div class="widget-wrapper">
		<?php
		if ( is_active_sidebar( 'primary-sidebar' ) ) :
			dynamic_sidebar( 'primary-sidebar' );
		else :
			/*
			 * Display Search, Archive and Category widget if no
			 * widget assigned to the primary sidebar.
			 */
			the_widget( 'WP_Widget_Search' );
			the_widget( 'WP_Widget_Archives', 'count=1' );
			the_widget( 'WP_Widget_Categories', 'count=1' );
		endif;
		?>
	</div><!-- .widget-wrapper -->
</div><!-- #secondary -->
