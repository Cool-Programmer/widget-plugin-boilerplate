<?php
/*
*	Plugin name: Your plugin's name
*	Plugin URI: http://www.example.com
*	Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit.
* 	Version: 0.1 beta
*	Author:	Your name
*	Author URI: Your website
*/

// Exit if direct
if (!defined('ABSPATH')) {
	exit("You are not allowed to be here!");
}

// Load scripts
require_once(plugin_dir_path(__FILE__) . '/includes/plugin-name-scripts.php');

// Load the class file
require_once(plugin_dir_path(__FILE__) . '/includes/plugin-name-class.php');

// Register the widget
function register_my_widget()
{
	register_widget('Foo_Widget');
}
add_action('widgets_init', 'register_my_widget');