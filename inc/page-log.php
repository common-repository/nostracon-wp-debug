<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Open and read debug.log

// First, read the debug.log file
$debug_log = new Debug_Log_Manager();

// if ($debug_log->is_successful_initialization() == false) {
// 	return null;
// }



?>

<div class="wrap">

	<h2>Debug Log</h2>
	
		
	<p>Output of <em>debug.log</em>.</p>
			
			
<?php

// This code is for the debug editor

$content = $debug_log->get_contents();
$editor_id = 'nostracon_debug_log'; // The editor id is also the css id

// Disable visual editor, media buttons, and toolbar
$settings = array(
		'media_buttons'		=> false,
		'tinymce'			=> false,
		'quicktags'			=> false,
		
		'editor_class'		=> 'nostracon_debug_log_nowrap' // Attaching class to prevent wrapping text inside textarea
);

// Dislay the editor
wp_editor($content, $editor_id, $settings);

?>
			
			
			
		
	
</div>