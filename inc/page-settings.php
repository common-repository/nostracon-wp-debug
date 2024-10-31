<?php 

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['nostracon_wp_debug_submit']))) {
	
	// Default result value
	$result = true;
	
	do {
		
		/* ***********************
		 * 1. Read wp_config.php *
		 * ***********************/
		
		$wp_config = new WP_Config_Manager();
		
		
		// If we cannot find the $wp_config file, then we set manually
		// Eventually, send a message to the user telling them to manually set the file
		
		if ($wp_config->is_successful_initialization() == false) {
			return false;
			break;
		}
		
		
		
		
		/* ****************************
		 * 2. Get the checkbox values *
		 * ****************************/
		
		// Variable to save the checked value
		$checked_value;
		
		
		
		
		// Updating WP_DEBUG
		
		// Get the value for WP_DEBUG
		if (isset($_POST['nostracon_wp_debug'])) {
			$checked_value = 'true';
		}
		
		else {
			$checked_value = 'false';
		}
		
		// Save the WP_DEBUG value
		// $wp_config_contents = preg_replace (NOSTRACON_PATTERN_WP_DEBUG, "define('WP_DEBUG', " . $checked_value . ");\n" , $wp_config_contents);
		$result = $wp_config->update_named_constant('WP_DEBUG', $checked_value);
		
		// If an error occured, then you have to manually setup wp_config.php
		// Eventually, send a message to the user telling them to manually set the file
		if ($result == false) {
			break;
		}
		
		
		
		
		// Updating WP_DEBUG_LOG
		
		// Get the value for WP_DEBUG_LOG
		if (isset($_POST['nostracon_wp_debug_log'])) {
			$checked_value = 'true';
		}
		
		else {
			$checked_value = 'false';
		}
		
		// Save the WP_DEBUG_LOG value 
		$result = $wp_config->update_named_constant('WP_DEBUG_LOG', $checked_value);
		
		// If an error occured, then you have to manually setup wp_config.php
		// Eventually, send a message to the user telling them to manually set the file
		if ($result == false) {
			break;
		}
		
		
		
		
		// Updating WP_DEBUG_DISPLAY
		
		// Get the value for WP_DEBUG_DISPLAY
		if (isset($_POST['nostracon_wp_debug_display'])) {
			$checked_value = 'true';
		}
		
		else {
			$checked_value = 'false';
		}
		
		// Save the WP_DEBUG_DISPLAY value
		$result = $wp_config->update_named_constant('WP_DEBUG_DISPLAY', $checked_value);
		
		// If an error occured, then you have to manually setup wp_config.php
		// Eventually, send a message to the user telling them to manually set the file
		if ($result === false) {
			break;
		}
		
		
		
		
		// Updating SCRIPT_DEBUG
		
		// Get the value for SCRIPT_DEBUG
		if (isset($_POST['nostracon_script_debug'])) {
			$checked_value = 'true';
		}
		
		else {
			$checked_value = 'false';
		}
		
		// Save the SCRIPT_DEBUG value
		$result = $wp_config->update_named_constant('SCRIPT_DEBUG', $checked_value);
		
		// If an error occured, then you have to manually setup wp_config.php
		// Eventually, send a message to the user telling them to manually set the file
		if ($result === false) {
			break;
		}
		
		
		
		
		// Updating SAVEQUERIES
		
		// Get the value for SAVEQUERIES
		if (isset($_POST['nostracon_savequeries'])) {
			$checked_value = 'true';
		}
		
		else {
			$checked_value = 'false';
		}
		
		// Save the SAVEQUERIES value
		$result = $wp_config->update_named_constant('SAVEQUERIES', $checked_value);
		
		// If an error occured, then you have to manually setup wp_config.php
		// Eventually, send a message to the user telling them to manually set the file
		if ($result === false) {
			break;
		}
		
		
		
		
		
		/* ********************************
		 * 3. Save modified wp_config.php *
		 * ********************************/
		
		$result = $wp_config->save_file_contents();
		
		
	} while (false);
	
	
	
	// If writing the file failed, inform the user to do it manually
	if ($result == false) {	
?>

<script>window.location = "<?php echo admin_url("admin.php?page=nostracon-wp-debug-settings-page&update=0") ?>";</script>

<?php
		
	}
	
	else {
		
?>

<script>window.location = "<?php echo admin_url("admin.php?page=nostracon-wp-debug-settings-page&update=1") ?>";</script>

<?php
		
	}
		
}

elseif (isset($_GET['update']) && $_GET['update'] == 0) {
	
?>


<div class="error notice is-dismissible"> 
	<p><strong>Saving debug settings failed. Try to manually update "wp-config.php".</strong></p>
</div>

<?php

}

elseif (isset($_GET['update']) && $_GET['update'] == 1) {

?>

<div class="updated notice is-dismissible">
	<p><strong>Saving debug settings succeeded.</strong></p>
</div>

<?php

}

?>




<div class="wrap">
	
	<h2>WP Debug Settings</h2>
	
	<div class="nostracon_container">
		
		
		<div class="nostracon_aside">
			
			<div class="nostracon_aside_box">
			
				<p>If you like this plugin and would like to support us, please donate.</p>
				<p>We really appreciate it :)</p>
				
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="YZTSA8ZJG2HWW">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				
			</div>
			
		</div>
		
		<div class="nostracon_main">
			
			<p>Make changes to the debug settings via input boxes below, then click <em>Save Changes</em>.</p>
			
			
			<form id="nostracon_wp_debug_settings_form" method="post" action="">
			
				<label for="nostracon_wp_debug">
					<input type="checkbox"  name="nostracon_wp_debug" id="nostracon_wp_debug" class="nostracon_wp_debug_settings" <?php if (WP_DEBUG == true) { ?> checked="checked" <?php } ?> /> WP_DEBUG
					&nbsp;<span class="description">&mdash; Enable/disable debugging.</span>
				</label>
				<br/>
				
				
				<label for="nostracon_wp_debug_log">
					<input type="checkbox" name="nostracon_wp_debug_log" id="nostracon_wp_debug_log" class="nostracon_wp_debug_settings" <?php if (WP_DEBUG_LOG == true) { ?> checked="checked" <?php } ?> /> WP_DEBUG_LOG
					&nbsp;<span class="description">&mdash; Enable/disable logging into the debug.log file.</span>
				</label>
				<br/>
				
				
				<label for="nostracon_wp_debug_display">
					<input type="checkbox"  name="nostracon_wp_debug_display" id="nostracon_wp_debug_display" class="nostracon_wp_debug_settings" <?php if (WP_DEBUG_DISPLAY == true) { ?> checked="checked" <?php } ?> /> WP_DEBUG_DISPLAY
					&nbsp;<span class="description">&mdash; Enable/disable display of errors and warnings.</span>
				</label>
				<br/>
				
				
				<label for="nostracon_script_debug">
					<input type="checkbox" name="nostracon_script_debug" id="nostracon_script_debug" class="nostracon_wp_debug_settings" <?php if (SCRIPT_DEBUG == true) { ?> checked="checked" <?php } ?> /> SCRIPT_DEBUG
					&nbsp;<span class="description">&mdash; Enable/disable use of development versions of core JS and CSS files (only needed if you are modifying these core files).</span>
				</label>
				<br/>
				
				
				<label for="nostracon_savequeries">
					<input type="checkbox" name="nostracon_savequeries" id="nostracon_savequeries" class="nostracon_wp_debug_settings" <?php if (SAVEQUERIES == true) { ?> checked="checked" <?php } ?> /> SAVEQUERIES
					&nbsp;<span class="description">&mdash; Enable/disable displaying database queries.</span>
				</label>
				<br/>
				<br/>
				
				
				<p>This section displays the changes that will be made to <em>wp_config.php</em>.</p>
				<textarea id="nostracon_settings_code" name="nostracon_settings_code" readonly></textarea>
				<br/>
				<br/>
				
				
				<input type="submit" name="nostracon_wp_debug_submit" id="nostracon_wp_debug_submit" class="button button-primary" value="Save Changes" />
				
			</form>
			
		</div>
		
	</div>
	
</div>