<?php
/**
 * Add sanitization and validation functions used
 * throughout the customizer.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

// Restrict direct access to this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'friendly_lite_sanitize_helpertext' ) ) {
	/**
	 * As per WordPress every add_setting fields should have a sanitize_callback.
	 * That is why even not required we are sanitizing the custom helper text setting.
	 *
	 * @param string $input_value Input value to be sanitize.
	 * @return string Sanitized value in this case empty string.
	 */
	function friendly_lite_sanitize_helpertext( $input_value ) {
		// Return empty string.
		return '';
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_layout_options' ) ) {
	/**
	 * Sanitize Layout options.
	 *
	 * Because no choices passed from customizer-control.php for this type (layout),
	 * instead it's render manually by the function Layout_Picker_Custom_Control -> render_content.
	 * That's why this is how we can sanitize it.
	 *
	 * @param string $layout_val Layout input value to be sanitize.
	 * @param object $setting The current setting object.
	 * @return string Sanitized layout value.
	 */
	function friendly_lite_sanitize_layout_options( $layout_val, $setting ) {
		// Validate the layout value with the whitelisted options.
		if (
			in_array(
				$layout_val,
				array(
					'left-sidebar',
					'no-sidebar',
					'right-sidebar',
				)
			)
		) {
			return $layout_val;
		} else {
			// Return default layout value.
			return $setting->default;
		}
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_checkbox' ) ) {
	/**
	 * Checkbox sanitization.
	 *
	 * @param bool $checkbox_state Checkbox status.
	 * @return bool Whether the checkbox is checked.
	 */
	function friendly_lite_sanitize_checkbox( $checkbox_state ) {
		// Return true when checbox is checked, false otherwise.
		return ( ( isset( $checkbox_state ) && true == $checkbox_state ) ? true : false );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_email' ) ) {
	/**
	 * Email sanitization.
	 *
	 * @param bool   $email_id Email Value to be sanitize.
	 * @param object $setting The actual setting field.
	 * @return string The sanitized email or the default if not valid.
	 */
	function friendly_lite_sanitize_email( $email_id, $setting ) {
		return ( is_email( $email_id ) ? sanitize_email( $email_id ) : $setting->default );
	}
}

if ( ! function_exists( 'friendly_lite_validate_email' ) ) {
	/**
	 * Validate email id.
	 *
	 * @param object $wp_error Instance of WP_Error.
	 * @param string $email_id Email ID to be validate.
	 * @return wp_error|boolean.
	 */
	function friendly_lite_validate_email( $wp_error, $email_id ) {
		if ( ! is_email( $email_id ) ) {
			$wp_error->add( 'invalid_email', __( 'Email Id is not valid!', 'friendly-lite' ) );
		}
		return $wp_error;
	}
}

if ( ! function_exists( 'friendly_lite_validate_phone' ) ) {
	/**
	 * Validate email id.
	 *
	 * @param object $wp_error instance of WP_Error.
	 * @param string $phone_no Phone number to be validate.
	 * @return wp_error|boolean
	 */
	function friendly_lite_validate_phone( $wp_error, $phone_no ) {
		$phone_regexp = '~^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$~';
		if ( ! preg_match( $phone_regexp, $phone_no ) ) {
			// Return false.
			$wp_error->add( 'invalid_phone', __( 'Phone number is not valid!!!', 'friendly-lite' ) );
		}
		return $wp_error;
	}
}

if ( ! function_exists( 'friendly_lite_validate_skype_id' ) ) {
	/**
	 * Validate Skype id.
	 *
	 * @param object $wp_error Instance of WP_Error.
	 * @param string $skype_id Skype ID to be validate.
	 * @return wp_error|boolean
	 */
	function friendly_lite_validate_skype_id( $wp_error, $skype_id ) {
		$skypeid_reg_exp = '/^[a-z][a-z0-9\.,\-_]{5,31}$/i';
		if ( ! preg_match( $skypeid_reg_exp, $skype_id ) ) {
			$wp_error->add( 'invalid_skype_id', __( 'Skype ID is not valid!', 'friendly-lite' ) );
		}
		return $wp_error;
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_hex_colors' ) ) {
	/**
	 * Validated hex color value.
	 *
	 * @param string $hex_color The hex color code.
	 * @return string Sanitixed hex color value.
	 */
	function friendly_lite_sanitize_hex_colors( $hex_color ) {
		$hex_color = sanitize_hex_color( $hex_color );
		// If hex value is valid return it; otherwise, return the default.
		return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
	}
}

if ( ! function_exists( 'friendly_lite_validate_urls' ) ) {
	/**
	 * Validate URL.
	 * Check to confirm if the url is valid or not.
	 *
	 * @link https://cmljnelson.blog/2018/08/31/url-validation-in-wordpress/
	 * @param object $wp_error The WP error object.
	 * @param string $url URL to be validate.
	 * @return object $wp_error The WP error object with error value if any.
	 */
	function friendly_lite_validate_urls( $wp_error, $url ) {
		if ( esc_url_raw( $url ) !== $url ) {
			$wp_error->add( 'invalid_url', __( 'Url is not valid!', 'friendly-lite' ) );
		}
		return $wp_error;
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_urls' ) ) {
	/**
	 * Sanitize URL.
	 *
	 * @param string $url URL to be Sanitized.
	 * @return string Sanitized URL string.
	 */
	function friendly_lite_sanitize_urls( $url ) {
		return esc_url_raw( $url );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_html' ) ) {
	/**
	 * HTML sanitization.
	 *
	 * @see wp_filter_post_kses()
	 * @param string $html HTML to sanitize.
	 * @return string Sanitized HTML.
	 */
	function friendly_lite_sanitize_html( $html ) {
		return wp_filter_post_kses( $html );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_css' ) ) {
	/**
	 * Sanitize css rules.
	 *
	 * @param string $css CSS to sanitize.
	 * @return string Sanitized CSS.
	 */
	function friendly_lite_sanitize_css( $css ) {
		return wp_strip_all_tags( $css );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_dropdown_pages' ) ) {
	/**
	 * Dropdown Page/Post ID sanitization.
	 *
	 * @param int    $post_id The post/page ID.
	 * @param object $setting Setting object instance.
	 * @return int Sanitized post/page ID or settings default.
	 */
	function friendly_lite_sanitize_dropdown_pages( $post_id, $setting ) {
		// Ensure $input is an absolute integer.
		$post_id = absint( $post_id );
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $post_id ) ? $post_id : $setting->default );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_file' ) ) {
	/**
	 * Image filename sanitization.
	 *
	 * @param string $file Filename.
	 * @param object $setting Setting object instance.
	 * @return string Sanitized filename.
	 */
	function friendly_lite_sanitize_file( $file, $setting ) {
		// Allowed file types.
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
		);
		// Check file type from file name.
		$file_ext = wp_check_filetype( $file, $mimes );
		// If file has a valid mime type return it, otherwise return default.
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_choices' ) ) {
	/**
	 * Sanitize Radio/Select Input type values.
	 *
	 * @param string $input Setting value.
	 * @param object $setting Setting object instance.
	 * @return string Sanitized Setting value or default
	 */
	function friendly_lite_sanitize_choices( $input, $setting ) {
		global $wp_customize;
		$control = $wp_customize->get_control( $setting->id );
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_textarea' ) ) {
	/**
	 * Sanitize Textareas.
	 * Strip out html tags and converts special characters into html entities.
	 *
	 * @param string $input Textarea input value.
	 * @return string Sanitized output.
	 */
	function friendly_lite_sanitize_textarea( $input ) {
		/*
		 * If we want to allow simple text only, it's enough to call
		 * wp_filter_nohtml_kses() native function for sanitize_callback directly.
		 * but then you will fail theme check so I am defining it here.
		 */
		return wp_filter_nohtml_kses( $input );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_numeric_inputs' ) ) {
	/**
	 * Sanitize Numeric values.
	 *
	 * @param int $input Input value.
	 * @return int Sanitized output.
	 */
	function friendly_lite_sanitize_numeric_inputs( $input ) {
		return absint( $input );
	}
}

if ( ! function_exists( 'friendly_lite_sanitize_text' ) ) {
	/**
	 * Sanitize text field values.
	 *
	 * @param string $input Input value.
	 * @return string Sanitized output.
	 */
	function friendly_lite_sanitize_text( $input ) {
		return sanitize_text_field( $input );
	}
}
