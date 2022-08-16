<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://cocoandjay.com
 * @since      1.0.0
 *
 * @package    Pwa_Ios_Banner
 * @subpackage Pwa_Ios_Banner/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Pwa_Ios_Banner
 * @subpackage Pwa_Ios_Banner/includes
 * @author     Coco and Jay <em@cocoandjay.com>
 */
class Pwa_Ios_Banner_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'pwa-ios-banner',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
