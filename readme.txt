=== nostraCon WP Debug ===
Contributors: nostracon
Donate link: http://nostracon.net/donations/
Tags: Debug, Debugging, Development
Requires at least: 4.3.1
Tested up to: 4.7
Stable tag: 2017.01.001
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a simple debugging tool for WordPress. It is aimed at helping developers with the development of their WordPress themes and plugins. 

== Description ==

Using this simple plugin, you can update `wp-config.php` by setting the PHP named constants used for WordPress debugging via a simple UI. Those named constants are `WP_DEBUG`, `WP_DEBUG_LOG`, `WP_DEBUG_DISPLAY`, S`CRIPT_DEBUG`, and `SAVEQUERIES`.

This plugin also allows you to view the `debug.log` file from within the WP Admin panel, without the need to view the file directly.

Moreover, this plugin introduces two functions, `wp_debug()` and `wp_debug_queries()`, that allow you to output debugging messages to either the display or the `debug.log` file.

*This plugin is intended for development purposes only*

For full documentation, visit http://www.nostracon.net/wp-debug/

== Installation ==

**From your WordPress dashboard**

1. Visit `Plugins -> Add New`
2. Search for `nostraCon WP Debug`
3. Activate `nostraCon WP Debug` from your Plugins page.

**From WordPress.org**

1. Download `nostraCon WP Debug`
2. Upload the `nostracon-wp-debug` directory to your `/wp-content/plugins/` directory
3. Activate `nostraCon WP Debug` from your Plugins page.

**If the plugin cannot be activated**

If you were unable to activate the plugin, it is most probably due to file protection and permissions set to protect `wp-config.php`. If this happens, the plagin will display a message on the screen to allow you to copy certain lines of code into `wp-debug.php` and save manually.

*Remember, this plugin is for development purposes only, and if you decide to change file permissions to change the access privileges for `wp-config.php`, then it is better to do so in a secure development enironment. If you need to use this plugin in a live environment, and you change your file permissions to allow this plugin to work, then you have to ensure that `wp-debug.php` is protected again after you finish using this plugin.*

**Once Activated**

1. Access `WP Debug` from the WP Admin panel, and then click on `Settings` (i.e., 'WP Debug -> Settings`). 
2. Change the debug settings to your preferences. The bottom section shows the settings changes that will be made to `wp-config.php`.
3. Click `Save Changes` to save the settings.

Visit http://www.nostracon.net/wp-debug for documentation on how to use this plugin.

== Screenshots ==

1. The settings page for the WP Debug plugin
2. An example of using the wp_debug() function
3. An example of using the wp_debug_queries() function

== Changelog ==

= 2017.01.001 =
* New version numbering for the plugin

= 1.1.2 =
* Minor code cleanups

= 1.1.1 =
* Creation of debug.log if it does not exist

= 1.1.0 =
* Display contents of debug.log from within the WP Admin panel
* Minor code changes and cleanup

= 1.0.1 =
* Fixing readme.txt
* Fixing plugin name

= 1.0.0 =
* Initial release