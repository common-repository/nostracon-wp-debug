<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );



/*
 * Code to initially setup wp_config.php
 */
function nostracon_wp_config_initial_setup () {
	
	
	/* ***********************
	 * 1. Read wp_config.php *
	 * ***********************/
	
	$wp_config = new WP_Config_Manager();
	
	if ($wp_config->is_successful_initialization() == false) {
		return null;
	}
	
	
	
	/* *************************
	 * 2. Update wp_config.php *
	 * *************************/
	
	$result = $wp_config->amend_wp_config_php_with_debug_variables();
	if ($result == false) {
		return null;
	}
	
	
	
	
	
	/* ********************************
	 * 3. Save ammended wp_config.php *
	 * ********************************/
	
	$result = $wp_config->save_file_contents();
	
	// If writing the file failed, inform the user to do it manually
	if ($result == false) {
		
		// Returning null will eventually take us to the manual setup instructions page
		// ... this line of code is probably redundat, but it is added to esure code comprehension
		return null;
	}
	
}


?>