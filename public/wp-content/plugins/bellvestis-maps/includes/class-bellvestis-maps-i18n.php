<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       codecrawlr.com
 * @since      1.0.0
 *
 * @package    Bellvestis_Maps
 * @subpackage Bellvestis_Maps/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bellvestis_Maps
 * @subpackage Bellvestis_Maps/includes
 * @author     Aaron Ahmadi <aaron.k.ahmadi@gmail.com>
 */
class Bellvestis_Maps_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bellvestis-maps',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
