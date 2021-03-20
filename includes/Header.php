<?php
/**
 * Header.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Header {

	/**
	 * Location ID.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $location = 'header';

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'elementor/theme/register_locations', __CLASS__ . '::register_locations' );

				add_action( 'wp', __CLASS__ . '::setup_display', 99 );

	} // /init

	/**
	 * Register locations.
	 *
	 * @since  1.0.0
	 *
	 * @param  object $manager
	 *
	 * @return  void
	 */
	public static function register_locations( $manager ) {

		// Processing

			$manager->register_core_location( self::$location );

	} // /register_locations

	/**
	 * Setup custom template display.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function setup_display() {

		// Variables

			$locations = Get::locations();


		// Requirements check

			if (
				empty( $locations[ self::$location ] )
				|| empty( Get::documents_for_location( self::$location ) )
			) {
				return;
			}


		// Processing

			remove_all_actions( 'tha_header_before' );
			remove_all_actions( 'tha_header_top' );
			remove_all_actions( 'tha_header_bottom' );
			remove_all_actions( 'tha_header_after' );

			add_action( 'tha_header_top', function() {
				elementor_theme_do_location( self::$location );
			} );

			add_filter( Hook::get_name( 'header/is_disabled' ), '__return_true', 99 );

	} // /setup_display

}
