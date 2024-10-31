<?php
/**
 *
 * @link              https://themeforest.net/user/pearlthemes/portfolio
 * @since             1.0.0
 * @package           Real_Estate_Agencies
 *
 * @wordpress-plugin
 * Plugin Name:       Real Estate Agencies
 * Description:       A plugin that offers real estate Agent custom post type to list agents on your site.
 * Version:           1.0.0
 * Author:            Pearl Themes
 * Author URI:        https://themeforest.net/user/pearlthemes/portfolio
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       real-estate-agencies
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REAL_ESTATE_AGENCIES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-real-estate-agencies-activator.php
 */
function activate_real_estate_agencies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-real-estate-agencies-activator.php';
	Real_Estate_Agencies_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-real-estate-agencies-deactivator.php
 */
function deactivate_real_estate_agencies() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-real-estate-agencies-deactivator.php';
	Real_Estate_Agencies_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_real_estate_agencies' );
register_deactivation_hook( __FILE__, 'deactivate_real_estate_agencies' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-real-estate-agencies.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_real_estate_agencies() {

	$plugin = new Real_Estate_Agencies();
	$plugin->run();

}
run_real_estate_agencies();

// load meta-box plugin
if ( ! class_exists( 'RWMB_Core' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . '/plugins/meta-box/meta-box.php' );
}

// Columns extension
if ( ! class_exists( 'RWMB_Columns' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . '/plugins/meta-box-extensions/meta-box-columns/meta-box-columns.php' );
}

// Show Hide extension
if ( ! class_exists( 'RWMB_Show_Hide' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . '/plugins/meta-box-extensions/meta-box-show-hide/meta-box-show-hide.php' );
}

// Tabs extension
if ( ! class_exists( 'RWMB_Tabs' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . '/plugins/meta-box-extensions/meta-box-tabs/meta-box-tabs.php' );
}

// Group extension
if ( ! class_exists( 'RWMB_Group' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . '/plugins/meta-box-extensions/meta-box-group/meta-box-group.php' );
}
