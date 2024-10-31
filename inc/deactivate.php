<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function nostracon_wp_config_reset () {
	
	/* ***********************
	 * 1. Read wp_config.php *
	 * ***********************/
	
	$wp_config = new WP_Config_Manager();
	
	if ($wp_config->is_successful_initialization() == false) {
		return null;
	}
	
	
	
	
	/* *********************************
	 * 2. Disable all debug parameters *
	 * *********************************/
	
	$wp_config->update_named_constant('WP_DEBUG', 'false');
	$wp_config->update_named_constant('WP_DEBUG_LOG', 'false');
	$wp_config->update_named_constant('WP_DEBUG_DISPLAY', 'false');
	$wp_config->update_named_constant('SCRIPT_DEBUG', 'false');
	$wp_config->update_named_constant('SAVEQUERIES', 'false');
	
	
	
	
	
	/* ********************************
	 * 3. Save modified wp_config.php *
	 * ********************************/
	
	$wp_config->save_file_contents();
	
}

?>