<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/** 
 * wp_debug() helps in logging debug statements. To use this function, make one of the following calls:
 * 
 * 		wp_debug('This message is for debugging purposes'); // Prints a message
 * 		wp_debug($array); // Prints an array
 * 		wp_debug($object); // Prints an object
 */
 
function wp_debug($message) {
	
	// If we passed an array or an object, then display it
	if (is_array($message) || is_object($message)) {
		error_log(print_r($message, true));
	} 
	
	// If we pass a string, then display it
	else {
		error_log($message);
	}
	
}


/**
 * wp_debug_queries() displays $wpdb->queries in wordpress. To use this function, make the following call:
 * 
 * 		wp_debug_queries();
 */

function wp_debug_queries() {
	if ( (defined("SAVEQUERIES")) && (SAVEQUERIES == true)) {
		global $wpdb;
		error_log(print_r($wpdb->queries, true));
	}
	
	elseif ( (defined("SAVEQUERIES")) && (SAVEQUERIES == false)) {
			
		error_log("Unable to perform the call 'wp_debug_queries()' because SAVEQUERIES is set to FALSE. Set 'SAVEQUERIES' to 'true' to be able to perform this function.");
			
	}
	
	else {
		error_log("Unable to perform the call 'wp_debug_queries()' because SAVEQUERIES is set not defined. Ensure 'SAVEQUERIES' is defined and is set to 'true' to be able to perform this function.");
	}
}




?>