<?php
/**
 * Displays footer widgets if assigned
 * else display tag, recent posts and recent comments widgets by default.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$widgets_cnt    = get_theme_mod( 'footer_widgets_areas', 3 );
$col_size       = absint( 12 / $widgets_cnt );
$text_alignment = ( 12 == $col_size ) ? 'text-center' : '';
for ( $i = 1; $i <= $widgets_cnt; $i++ ) : ?>
	<div class="col-md-<?php echo $col_size; ?> <?php echo esc_attr( $text_alignment ); ?> widget-wrapper" >
		<?php
		if ( is_active_sidebar( "footer-{$i}" ) ) :
			dynamic_sidebar( "footer-{$i}" );
		else :
			if ( 1 == $i ) :
				// Left most footer widget.
				the_widget( 'WP_Widget_Tag_Cloud' );
			elseif ( 2 == $i ) :
				// Middle footer widget.
				the_widget( 'WP_Widget_Recent_Posts', 'number=3' );
			elseif ( 3 == $i ) :
				// Right most footer widget.
				the_widget( 'WP_Widget_Recent_Comments', 'number=3' );
			endif;
		endif;
		?>
	</div>
<?php endfor; ?>
