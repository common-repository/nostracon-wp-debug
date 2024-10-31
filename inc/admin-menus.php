<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*
 * Creating a custom top-level menu entry into wordpress admin area
 */
function nostracon_wp_debug_settings_menu () {
	
	// Bring up the settings page or the setup page based on wp-config.php
	
	// First, read the wp-config.php file
	$wp_config = new WP_Config_Manager();
	
	if ($wp_config->is_successful_initialization() == false) {
		return null;
	}
	
	
	
	// Check if wp-config.php was properly setup during plugin activation
	// ... in other words, look for WP_DEBUG, WP_DEBUG_LOG, WP_DEBUG_DISPLAY, SCRIPT_DEBUG and SAVEQUERIES, and if at least one of them does not exist, then it is manual setup
	
	$found_WP_DEBUG = $wp_config->find_named_constant('WP_DEBUG');
	$found_WP_DEBUG_LOG = $wp_config->find_named_constant('WP_DEBUG_LOG');
	$found_WP_DEBUG_DISPLAY = $wp_config->find_named_constant('WP_DEBUG_DISPLAY');
	$found_SCRIPT_DEBUG = $wp_config->find_named_constant('SCRIPT_DEBUG');
	$found_SAVEQUERIES = $wp_config->find_named_constant('SAVEQUERIES');
	
	// Check if installation is successful, and decide which page(s) to display based on the installation.
	if (($found_WP_DEBUG == 0) ||
		($found_WP_DEBUG_LOG == 0) ||
		($found_WP_DEBUG_DISPLAY == 0) ||
		($found_SCRIPT_DEBUG == 0) ||
		($found_SAVEQUERIES == 0)) {
		
		// Installation not successful. Display the setup page.
		
		// Add a page called WP Debug into the Settings menu of the admin area
		// Note that the slug for this menu is 'nostracon-wp-debug-page'. This slug is similar to the slug of the menu that is displayed when the installation of this plugin is successful...
		// ... The reason for that is to ensure that when the user fixes the installation problem, and then refreshes the page, ...
		// ... the other menu item will be displayed without a problem (because the slug is used in the url)
		add_menu_page('WP Debug Setup', 'WP Debug', 'manage_options', 'nostracon-wp-debug-page', function () {
			require_once (plugin_dir_path( __FILE__ ) . 'page-setup.php');
		});
	}
	
	else {
		
		// Installation successful. Display the WP Debug pages.
		
		// Create a top level menu called WP Debug into the WP Admin section
		// Note that "nostracon-wp-debug-page" is the slug name, and it is similar to that of the first menu item "Log", so we do not have duplicate menues.
		add_menu_page('WP Debug', 'WP Debug', 'manage_options', 'nostracon-wp-debug-page');
		
		// The first menu item is Log.
		// Note that the parent name and the slug name of this menu item is the same as the slug name of the parent menu item, "nostracon-wp-debug-page". This prevents duplicate menu names. 
		add_submenu_page('nostracon-wp-debug-page', 'WP Debug Log', 'Debug Log', 'manage_options', 'nostracon-wp-debug-page', function () {
			require_once (plugin_dir_path( __FILE__ ) . 'page-log.php');
		});
		
		// The second menu item.
		add_submenu_page('nostracon-wp-debug-page', 'WP Debug Settings', 'Settings', 'manage_options', 'nostracon-wp-debug-settings-page', function () {
			require_once (plugin_dir_path( __FILE__ ) . 'page-settings.php');
		});
		
	}
	
}


?>