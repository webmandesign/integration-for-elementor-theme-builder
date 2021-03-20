<?php
/**
 * Content.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

use WebManDesign\IFETB\Get;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Content {

	/**
	 * Is the display already set?
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $is_set = false;

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

				add_action( 'tha_content_before', __CLASS__ . '::setup_display', -99 );

	} // /init

	/**
	 * Setup custom template display.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function setup_display() {

		// Requirements check

			if ( self::$is_set ) {
				return;
			}


		// Variables

			$did_location = ! (
				empty( Get::documents_for_location( 'single' ) )
				&& empty( Get::documents_for_location( 'archive' ) )
			);


		// Processing

			if ( $did_location ) {
				remove_all_actions( 'tha_content_before' );
				remove_all_actions( 'tha_content_top' );
				remove_all_actions( 'tha_content_bottom' );
				remove_all_actions( 'tha_content_after' );

				self::$is_set = true;
			}

	} // /setup_display

}
