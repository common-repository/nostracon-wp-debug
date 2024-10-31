<?php
// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Debug_Log_Manager extends File_Manager {
	
	// Constructor (call parent constructor)
	function __construct() {
		
		// Initial values
		$file_name = 'debug.log';
		$this->directory = realpath(plugin_dir_path( __FILE__ ) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..');
		$this->file = $this->directory . DIRECTORY_SEPARATOR . $file_name;
		
		// If debug.log does not exist, then create it
		if (!file_exists($this->file)) {
			
			$fileHandle = fopen($this->file, 'w') or die("can't open file");
			fclose($fileHandle);
				
			
			return;
		}
		
		// Load debug.log
		$this->contents = file_get_contents ($this->file);
		
		$this->init_success = true;
		
	}
	
}

?>