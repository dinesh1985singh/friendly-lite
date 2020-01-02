<?php
/**
 * Displays main primary navigation.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$nav_search_status = get_theme_mod( 'menu_search_box', true );
$nav_list_wrapper  = 'col-md-12';
if ( true === $nav_search_status ) {
	$nav_list_wrapper = 'col-md-9';
}
?>
<nav class="navbar navbar-inverse" id="main-nav" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#menu-wrapper"
			aria-expanded="false" >
				<span class="sr-only">toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div> <!-- .navbar-header -->
		<div class="collapse navbar-collapse" id="menu-wrapper" >
			<div class="row">
				<div class="<?php echo esc_attr( $nav_list_wrapper ); ?>">
					<?php
					if ( has_nav_menu( 'header_menu' ) ) :
						wp_nav_menu(
							array(
								'menu'           => 'primary',
								'theme_location' => 'header_menu',
								'depth'          => 0,
								'container'      => false,
								'menu_class'     => 'main-nav',
								'walker'         => new Friendly_Lite_Navwalker(),
							)
						);

					endif;
					?>
				</div>
				<?php if ( true === $nav_search_status ) : ?>
					<div class="col-md-3">
						<?php

						// Add boostrap classes to the search form.
						add_filter( 'get_search_form', 'friendly_lite_nav_search_form' );

						// Get the updated form.
						get_search_form();

						// Reset the search form to the default theme specfic form.
						remove_filter( 'get_search_form', 'friendly_lite_nav_search_form' );
						?>
					</div>
				<?php endif; ?>
				</div>
			</div><!-- .row -->
		</div><!-- #menu-wrapper -->
	</div><!-- .container -->
</nav><!-- .navbar ends -->
