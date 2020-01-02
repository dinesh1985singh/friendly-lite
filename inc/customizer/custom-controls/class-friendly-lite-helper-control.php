<?php
/**
 * Add custom helper text control in theme customizer.
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
	 * Friendly_Lite_Helper_Control class.
	 * Generates custom helper text control for our theme.
	 * Add heading for a group of controls.
	 * 
	 * @extends WP_Customize_Control
	 */ 
	class Friendly_Lite_Helper_Control extends WP_Customize_Control {

		/**
		 * Defines the helper text controller name.
		 * 
		 * @var string $type The control name.
		 */
		public $type = 'helpertext';

		/**
		 * Output helper text control html.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			</label>
			<?php
		}
	}
}
