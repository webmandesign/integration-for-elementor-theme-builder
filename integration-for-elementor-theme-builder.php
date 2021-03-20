<?php
/**
 * Plugin Name:  Integration for Elementor Theme Builder
 * Plugin URI:   https://www.webmandesign.eu/portfolio/integration-for-elementor-theme-builder-wordpress-plugin/
 * Description:  Provides support for Elementor Pro Theme Builder in WebMan Design accessibility ready themes.
 * Version:      1.0.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  integration-for-elementor-theme-builder
 * Domain Path:  /languages
 *
 * GitHub Plugin URI:  https://github.com/webmandesign/integration-for-elementor-theme-builder
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  https://github.com/webmandesign/integration-for-elementor-theme-builder
 * @link  https://www.webmandesign.eu
 *
 * @package  Integration for Elementor Theme Builder
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants:

	define( 'IFETB_FILE', __FILE__ );
	define( 'IFETB_PATH', plugin_dir_path( IFETB_FILE ) ); // Trailing slashed.
	define( 'IFETB_THEME_SLUG', get_template() );

	define( 'IFETB_VERSION_WP', '5.2' );
	define( 'IFETB_VERSION_PHP', '7.0' );

// Check that the site meets the minimum WP and PHP requirements.
if (
	version_compare( $GLOBALS['wp_version'], IFETB_VERSION_WP, '<' )
	|| version_compare( PHP_VERSION, IFETB_VERSION_PHP, '<' )
) {
	require_once IFETB_PATH . 'includes/Compatibility.php';
	return;
}

// Load the functionality.
require_once IFETB_PATH . 'includes/Autoload.php';
WebManDesign\IFETB\Loader::init();
