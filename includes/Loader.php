<?php
/**
 * Loader.
 *
 * @package    Integration for Elementor Theme Builder
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFETB;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Loader {

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

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme', 99 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Requirements check

			if (
				! class_exists( '\ElementorPro\Plugin' )
				|| empty( Get::theme_builder( false ) )
			) {
				return;
			}

			// Should we load this plugin functionality?
			$can_load = true;

				// Is the theme by WebMan Design?
				if ( false === strpos( wp_get_theme( IFETB_THEME_SLUG )->get( 'AuthorURI' ), 'webmandesign' ) ) {
					add_action( 'admin_notices', function() {
						printf(
							'<div class="error"><p>%s</p></div>',
							esc_html__( 'Sorry, the Integration for Elementor Theme Builder plugin will not work with your theme. Please check WordPress themes by WebManDesign.eu.', 'integration-for-elementor-theme-builder' )
						);
					} );
					$can_load = false;
				}

			if ( ! $can_load ) {
				return;
			}


		// Processing

			Content::init();
			Editor::init();
			Footer::init();
			Header::init();

			// Actions

				add_action( 'elementor/theme/register_locations', __CLASS__ . '::no_theme_overrides', -10 );

			// Filters

				add_filter( Hook::get_name( 'assets/preloading_styles_enabled' ), '__return_false', 99 );

	} // /after_setup_theme

	/**
	 * Do not override theme header and footer.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function no_theme_overrides() {

		// Processing

			remove_action(
				'elementor/theme/register_locations',
				array(
					Get::theme_builder()->get_component( 'theme_support' ),
					'after_register_locations'
				),
				99
			);

	} // /no_theme_overrides

}
