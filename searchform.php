<?php
/**
 * Search form template file.
 *
 * Defines the search form in Friendly Lite.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$sinput_id = esc_attr( uniqid( 'search-input-' ) );

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $sinput_id; ?>">
		<span class="screen-reader-text">
			<?php echo _x( 'Search for:', 'label', 'friendly-lite' ); ?>
		</span>
	</label>
	<input type="text" id="<?php echo $sinput_id; ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'friendly-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="btn btn-search">
		<i class="fa fa-search" aria-hidden="true" ></i>
		<span class="screen-reader-text">
			<?php echo _x( 'Search', 'submit button', 'friendly-lite' ); ?>
		</span>
	</button>
</form>
