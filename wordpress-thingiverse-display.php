<?php
/*
		Plugin Name:  wordpress-thingiverse-display
		Plugin URI:	https://www.wordpress-thingiverse-display.Gamer2020.net
		Description:  A wordpress plugin to display a Thingiverse thing in a wordpress post.
		Version:      0.1
		Author:       Gamer2020
		Author URI:   https://www.Gamer2020.net
		License:      GPL3
		License URI:  https://www.gnu.org/licenses/gpl-3.0.html
	*/
?>
<?php

require 'wtd-settings.php';
require 'wtd-short-codes.php';

/** Hooks go here*/
/** Hook for options page.*/
add_action('admin_menu', 'wtd_plugin_menu');
add_action('admin_init', 'wtd_options_init');

/** Shortcodes!*/
add_shortcode('wtd_shortcode_thing', 'wtd_shortcode_thing');

/** Link for options page.*/
function wtd_plugin_menu()
{
	add_options_page('Thingieverse Display Settings', 'Thingiverse Display', 'administrator', 'wordpress-thingiverse-display-settings', 'wtd_plugin_options');
}

function wtd_options_init()
{
	register_setting('wtd_options_group', 'wtd_Thingiverse_API_key', 'wtd_options_text_validate');
}

function wtd_options_validate($input)
{
	// do some validation here if necessary
	//return sanitize_text_field($input);
	return $input;
}

function wtd_options_text_validate($input)
{
	// do some validation here if necessary
	return sanitize_text_field($input);
}

?>