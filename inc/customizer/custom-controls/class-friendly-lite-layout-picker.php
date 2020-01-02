<?php
/**
 * Add custom layout picker control in theme customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Friendly_Lite_Layout_Picker class.
	 * Generates control for selecting layout images.
	 * 
	 * @extends WP_Customize_Control
	 */ 
	class Friendly_Lite_Layout_Picker extends WP_Customize_Control {

		/**
		 * Defines the layout picker controller name.
		 * 
		 * @var string $type The control name.
		 */
		public $type = 'layout';

		/**
		 * Output layout picker html.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		public function render_content() {
			$imguri = get_template_directory_uri() . '/inc/customizer/assets/images/layouts/';
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="friendly-lite-layout">
				<label>
					<input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr( $this->id ); ?>" value="no-sidebar" />
					<img src="<?php echo esc_url( $imguri ); ?>no-sidebar.png" alt="<?php esc_attr_e( 'Full Width With No Sidebar', 'friendly-lite' ); ?>" title="<?php esc_attr_e( 'Full Width With No Sidebar', 'friendly-lite' ); ?>" />
				</label>
				<label>
					<input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr( $this->id ); ?>" value="left-sidebar" />
					<img src="<?php echo esc_url( $imguri ); ?>left-sidebar.png" alt="<?php esc_attr_e( 'With Left Sidebar', 'friendly-lite' ); ?>" title="<?php esc_attr_e( 'With Left Sidebar', 'friendly-lite' ); ?>" />
				</label>
				<label>
					<input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr( $this->id ); ?>" value="right-sidebar" />
					<img src="<?php echo esc_url( $imguri ); ?>right-sidebar.png" alt="<?php esc_attr_e( 'With Right Sidebar', 'friendly-lite' ); ?>" title="<?php esc_attr_e( 'With Right Sidebar', 'friendly-lite' ); ?>" />
				</label>
			</div>
			<?php
		}
	}
}
