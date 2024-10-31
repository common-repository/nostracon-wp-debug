<?php 

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );





// First, read the wp-config.php file
$wp_config = new WP_Config_Manager();

if ($wp_config->is_successful_initialization() == false) {
	return null;
}


// Make the required changes to the file (adding all debugging variables) 
$result = $wp_config->amend_wp_config_php_with_debug_variables();
if ($result == false) {
	return null;
}



?>

<div class="error notice"> 
	<p>Setting up <em>wp-config.php</em> to allow the <em>WP Debug</em> plugin to work has unfortunately <b>failed</b>.</p>
</div>

<div class="wrap">
	
	<h2>WP Debug Setup</h2>
	
	<p>There are multiple reasons why this may have happeed. It could be that <em>wp-config.php</em> is write-protected as a security measure that prevents plugins from modifying <em>wp-config.php</em>. Whatever the cause may be, you have to manually update <em>wp-config.php</em> and remove write protection to enable the <em>WP Debug</em> plugin.</p>
	
	<p><b>Please backup <em>wp-config.php</em> before modifying it.</b></p>
	
	<p>To update <em>wp-config.php</em>, replace its content with the following:</p>	
	
	<textarea id="nostracon_setup_code" readonly>
<?php echo $wp_config->get_contents(); ?>
	</textarea>
	
	
</div>