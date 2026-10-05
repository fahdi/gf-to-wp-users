<?php
/*
Plugin Name: Gravity Forms Users Import Add-on
Plugin URI:
Description: A simple add-on to import users when a gravity form is inserted
Version: 0.1
Author: Fahad Murtaza
Author URI:
Text Domain: gf-to-wp-users
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GF_SIMPLE_ADDON_VERSION', '0.1' );

add_action( 'gform_loaded', [ 'GF_Wp_Users_Bootstrap', 'load' ], 5 );

class GF_Wp_Users_Bootstrap {

	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_addon_framework' ) ) {
			return;
		}

		require_once __DIR__ . '/class-gftowpusers.php';

		GFAddOn::register( 'GFWpUsers' );
	}

}

function gf_wp_users_import_addon() {
	if ( ! class_exists( 'GFWpUsers' ) ) {
		return null;
	}
	return GFWpUsers::get_instance();
}
