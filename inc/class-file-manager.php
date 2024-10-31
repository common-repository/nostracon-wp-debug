<?php

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class File_Manager {
	
	
	protected  $init_success = false;
	
	protected  $directory = "";
	protected  $file = "";
	protected  $contents = "";
	
	
	
	// Constructor, sets $wp_config_directory, $wp_config_file, and $wp_config_contents
	function __construct($file_name) {
	
		$this->directory = __DIR__;
	
		do {
			if (file_exists($this->directory . DIRECTORY_SEPARATOR . $file_name)) {
	
				$this->file = $this->directory . DIRECTORY_SEPARATOR . $file_name;
				$this->contents = file_get_contents ($this->file);
	
				$this->init_success = true;
				return;
			}
		} while ($this->directory = realpath($this->directory . DIRECTORY_SEPARATOR . '..'));
	
		$this->init_success = false;
	}
	
	
	
	// Function to check if the constructor initialized successfully
	public function is_successful_initialization () {
		return $this->init_success;
	}
	
	
	
	// Get the contents of debug.log
	public function get_contents () {
		return $this->contents;
	}
	
	
	// Save wp-config.php
	public function save_file_contents () {
		$result = file_put_contents($this->file, $this->contents);
		return $result;
	}
	
	
}

?>