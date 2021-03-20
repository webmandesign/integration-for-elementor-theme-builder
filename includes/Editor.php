<?php
/**
 * Editor.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Editor {

	/**
	 * Elementor theme template post type.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $post_type = 'elementor_library';

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::styles', 99 );

			// Filters

				add_filter( Hook::get_name( 'sidebar/is_disabled' ), __CLASS__ . '::sidebar_conditions', 99 );

	} // /init

	/**
	 * Disable sidebar when needed.
	 *
	 * @since  1.0.0
	 *
	 * @param  bool $is_disabled
	 *
	 * @return  bool
	 */
	public static function sidebar_conditions( bool $is_disabled ): bool {

		// Processing

			if ( is_singular( self::$post_type ) ) {
				$is_disabled = true;
			}


		// Output

			return $is_disabled;

	} // /sidebar_conditions

	/**
	 * Add editor styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function styles() {

		// Requirements check

			if ( ! is_singular( self::$post_type ) ) {
				return;
			}


		// Processing

			wp_add_inline_style( 'elementor-pro', '

				.elementor-theme-builder-content-area {
					height: auto;
					padding: 3em;
					font-size: 1.5em;
					font-weight: 300;
					font-style: italic;
					text-align: center;
					background-image: repeating-linear-gradient(
						-45deg,
						rgba( 0,0,0, .05 ),
						rgba( 0,0,0, .05 ) 5px,
						rgba( 255,255,255, .1 ) 5px,
						rgba( 255,255,255, .1 ) 10px
					);
				}

			' );

	} // /styles

}
