<?php
/**
 * Getters.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Get {

	/**
	 * Get theme builder instance or check if it's loaded.
	 *
	 * @since  1.0.0
	 *
	 * @param  bool $get_instance  Get theme builder instance or just check if it's loaded?
	 *
	 * @return  mixed
	 */
	public static function theme_builder( bool $get_instance = true ) {

		// Output

			if ( $get_instance ) {
				return \ElementorPro\Modules\ThemeBuilder\Module::instance();
			} else {
				return is_callable( '\ElementorPro\Modules\ThemeBuilder\Module::instance' );
			}

	} // /theme_builder

	/**
	 * Get documents for specific location.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $location
	 *
	 * @return  array
	 */
	public static function documents_for_location( string $location = '' ): array {

		// Output

			return self::theme_builder()->get_conditions_manager()->get_documents_for_location( $location );

	} // /documents_for_location

	/**
	 * Get locations.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function locations(): array {

		// Output

			return self::theme_builder()->get_locations_manager()->get_locations();

	} // /locations

}
