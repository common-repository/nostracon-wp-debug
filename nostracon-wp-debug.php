<?php

/*
Plugin Name: nostraCon WP Debug
Plugin URI: http://www.nostracon.net/wp-debug/
Description: This is a simple debugging tool for WordPress. It is aimed at helping developers with the development of their WordPress themes and plugins. 
Version: 2017.01.001
Author: nostraCon
Author URI: http://www.nostracon.net/
License: GPLv2 or later
Licesne URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// This line of code is for security reasons. It is to prevent direct access to the plugin php file
// For more details: https://codex.wordpress.org/Writing_a_Plugin
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'functions.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'class-file-manager.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'class-wp-config-manager.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'class-debug-log-manager.php');

require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'activate.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'deactivate.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'enqueue.php');
require_once (plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'admin-menus.php');





/**
 *
 * Activate
 *
 */

// Plugin activation: Call nostracon_wp_config() when activating the plugin 
register_activation_hook(__FILE__, 'nostracon_wp_config_initial_setup');





/**
 * 
 * Deactivate
 * 
 */

// Plugin deactivation: Call nostracon_wp_config_reset() when deactivating the plugin
register_deactivation_hook( __FILE__, 'nostracon_wp_config_reset' );





/**
 * 
 * Enqueue
 * 
 */

// This action loads the css files for the plugin
add_action('admin_enqueue_scripts', 'nostracon_wp_debug_styles_enqueuer' );





/**
 * 
 * Admin - Menus
 * 
 */

// Add menu and pages to WordPress admin area
add_action('admin_menu', 'nostracon_wp_debug_settings_menu');




?>