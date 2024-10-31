<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// This function is used to load CSS
function nostracon_wp_debug_styles_enqueuer ($hook_suffix) {
	
	// Only load the scripts and css files if we are in the correct page
	if (($hook_suffix == 'toplevel_page_nostracon-wp-debug-page') || 
		($hook_suffix == 'wp-debug_page_nostracon-wp-debug-settings-page')) {
		
		
		// Load the appropriate CSS files
		
		// CSS file for the SETUP page
		wp_register_style('nostracon_setup_page_style', plugins_url(DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'page-setup.css', dirname(__FILE__)));
		wp_enqueue_style('nostracon_setup_page_style');
		
		// CSS file for LOG page
		wp_register_style('nostracon_log_page_style', plugins_url(DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'page-log.css', dirname(__FILE__)));
		wp_enqueue_style('nostracon_log_page_style');
		
		// CSS file for SETTINGS page
		wp_register_style('nostracon_settings_page_style', plugins_url(DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'page-settings.css', dirname(__FILE__)));
		wp_enqueue_style('nostracon_settings_page_style');
		
		
		
		// Lead the jQuery script that is needed for our work
		wp_enqueue_script('nostracon-settings-page-script', plugins_url(DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'page-settings.js', dirname(__FILE__)), array('jquery'));
	}
	
	
}


?>