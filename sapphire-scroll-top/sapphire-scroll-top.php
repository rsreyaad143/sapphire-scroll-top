<?php
/**
 * Sapphire Scroll Top
 *
 * @package           sapphire-scroll-top
 * @author            Mohammad Readush Shalihin
 * @copyright         2019 Sapphire WP
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Sapphire Scroll Top
 * Plugin URI:        https://example.com/plugin-name
 * Description:       A flexible Back to Top button to any post/page of your WordPress website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Mohammad Readush Shalihin
 * Author URI:        https://example.com
 * Text Domain:       sstop
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SSTOP_VERSION', '1.0.0' );
define( 'SSTOP_INCLUDES', trailingslashit( plugin_dir_path( __FILE__ ) ) . 'inc/' );
define( 'SSTOP_ASSETS', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/' );


/**
 * Sapphire Scroll Top init function
 *
 * @return void
 */
function sphr_init_function() {
	if ( is_admin() ) {
		require_once SSTOP_INCLUDES . 'admin.php';
	} else {
		require_once SSTOP_INCLUDES . 'frontend.php';
	}
}
add_action( 'plugin_loaded', 'sphr_init_function' );
