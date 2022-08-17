<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://cocoandjay.com
 * @since             1.0.0
 * @package           Pwa_Ios_Banner
 *
 * @wordpress-plugin
 * Plugin Name:       Progressive Web App IOS Banner
 * Plugin URI:        https://cocoandjay.com
 * Description:       Add support for the IOS popup Banner with the instruction on how to save the PWA on their home screen
 * Version:           1.0.0
 * Author:            Coco and Jay
 * Author URI:        https://cocoandjay.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pwa-ios-banner
 * Domain Path:       /pwa-ios-banner
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


/* create admin panel */

class Settings {
    private $settings_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'settings_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'settings_page_init' ) );
    }

    public function settings_add_plugin_page() {
        add_options_page(
            'PWA IOS', // page_title
            'PWA IOS', // menu_title
            'manage_options', // capability
            'pwa-ios-settings', // menu_slug
            array( $this, 'settings_create_admin_page' ) // function
        );
    }

    public function settings_create_admin_page() {
        $this->settings_options = get_option( 'settings_option_name' ); ?>

        <div class="wrap">
            <h2>Progressive Web App IOS Banner Settings</h2>
            <p>Customise your banner</p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                    settings_fields( 'settings_option_group' );
                    do_settings_sections( 'settings-admin' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function settings_page_init() {
        register_setting(
            'settings_option_group', // option_group
            'settings_option_name', // option_name
            array( $this, 'settings_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'settings_setting_section', // id
            'Settings', // title
            array( $this, 'settings_section_info' ), // callback
            'settings-admin' // page
        );

        add_settings_field(
            'icon_0', // id
            'Icon', // title
            array( $this, 'icon_0_callback' ), // callback
            'settings-admin', // page
            'settings_setting_section' // section
        );
    }

    public function settings_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['icon_0'] ) ) {
            $sanitary_values['icon_0'] = sanitize_text_field( $input['icon_0'] );
        }

        return $sanitary_values;
    }

    public function settings_section_info() {
        
    }

    public function icon_0_callback() {
        printf(
            '<input class="regular-text" type="text" name="settings_option_name[icon_0]" id="icon_0" value="%s">',
            isset( $this->settings_options['icon_0'] ) ? esc_attr( $this->settings_options['icon_0']) : ''
        );
    }

}
if ( is_admin() )
    $settings = new Settings();

/* 
 * Retrieve this value with:
 * $settings_options = get_option( 'settings_option_name' ); // Array of All Options
 * $icon_0 = $settings_options['icon_0']; // Icon
 */

