/**
 * This script handles generating content for the text area
 */

jQuery.extend ({
	
	// Function to generate code based on user settings
	generate_wp_debug_settings: function () {
		
		// This variable will hold the content of text area
		var content = "";
		
		
		// Code for WP_DEBUG
		var is_checked = jQuery('#nostracon_wp_debug').is(':checked');
		if (is_checked == true) {
			content = content + "define('WP_DEBUG', true);" + "\n";
		}
		
		else {
			content = content + "define('WP_DEBUG', false);" + "\n";
		}
		
		
		// Code for WP_DEBUG_LOG
		var is_checked = jQuery('#nostracon_wp_debug_log').is(':checked');
		if (is_checked == true) {
			content = content + "define('WP_DEBUG_LOG', true);" + "\n";
		}
		
		else {
			content = content + "define('WP_DEBUG_LOG', false);" + "\n";
		}
		
		
		// Code for WP_DEBUG_DISPLAY
		is_checked = jQuery('#nostracon_wp_debug_display').is(':checked');
		if (is_checked == true) {
			content = content + "define('WP_DEBUG_DISPLAY', true);" + "\n";
		}
		
		else {
			content = content + "define('WP_DEBUG_DISPLAY', false);" + "\n";
		}
		
		
		// Code for SCRIPT_DEBUG
		is_checked = jQuery('#nostracon_script_debug').is(':checked');
		if (is_checked == true) {
			content = content + "define('SCRIPT_DEBUG', true);" + "\n";
		}
		
		else {
			content = content + "define('SCRIPT_DEBUG', false);" + "\n";
		}
		
		
		// Code for SAVEQUERIES
		is_checked = jQuery('#nostracon_savequeries').is(':checked');
		if (is_checked == true) {
			content = content + "define('SAVEQUERIES', true);" + "\n";
		}
		
		else {
			content = content + "define('SAVEQUERIES', false);" + "\n";
		}
			
		
		return content;
	}
});



jQuery(document).ready(function($) {
	
	
	$("#nostracon_settings_code").val($.generate_wp_debug_settings());
	
	
	// when a checkbox is checked, update the textare
	$(".nostracon_wp_debug_settings").click(function() {
		$("#nostracon_settings_code").val($.generate_wp_debug_settings());
	});
	
});