<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://cocoandjay.com
 * @since      1.0.0
 *
 * @package    Pwa_Ios_Banner
 * @subpackage Pwa_Ios_Banner/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Pwa_Ios_Banner
 * @subpackage Pwa_Ios_Banner/public
 * @author     Coco and Jay <em@cocoandjay.com>
 */
class Pwa_Ios_Banner_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pwa_Ios_Banner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pwa_Ios_Banner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pwa-ios-banner-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Pwa_Ios_Banner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pwa_Ios_Banner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pwa-ios-banner-public.js', array( 'jquery' ), $this->version, false );
		$my_options = get_option( 'settings_option_name' );
		$JSarray = array( 'pluginURL' => plugin_dir_url( __DIR__ ), 'websiteTitle' => get_bloginfo('name'), 'iconURL' => $my_options['icon_0'] );
		wp_localize_script( $this->plugin_name, 'jsVars', $JSarray );



	}

}
