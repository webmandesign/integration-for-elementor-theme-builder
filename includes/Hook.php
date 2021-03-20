<?php
/**
 * Action and filter hooks.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Hook {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $hook
	 *
	 * @return  string
	 */
	public static function get_name( string $hook ) {

		// Output

			return apply_filters( 'IFETB/Hook/get_name', IFETB_THEME_SLUG . '/' . $hook, $hook );

	} // /get_name

}
