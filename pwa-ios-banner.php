<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://cocoandjay.com
 * @since             1.0.0
 * @package           Pwa_Ios_Banner
 *
 * @wordpress-plugin
 * Plugin Name:       PWA IOS Banner
 * Plugin URI:        https://cocoandjay.com
 * Description:       
 * Version:           1.0.0
 * Author:            Coco and Jay
 * Author URI:        https://cocoandjay.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pwa-ios-banner
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
define( 'PWA_IOS_BANNER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pwa-ios-banner-activator.php
 */
function activate_pwa_ios_banner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pwa-ios-banner-activator.php';
	Pwa_Ios_Banner_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pwa-ios-banner-deactivator.php
 */
function deactivate_pwa_ios_banner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pwa-ios-banner-deactivator.php';
	Pwa_Ios_Banner_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pwa_ios_banner' );
register_deactivation_hook( __FILE__, 'deactivate_pwa_ios_banner' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pwa-ios-banner.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pwa_ios_banner() {

	$plugin = new Pwa_Ios_Banner();
	$plugin->run();

}
run_pwa_ios_banner();
