<?php 
	// Enqueue scripts for both (front-end & back end)
	function your_prefix_scripts_enqueue()
	{
		wp_enqueue_style('your-prefix-stylesheet', plugins_url() . '/plugin-name/css/style.css');
		wp_enqueue_script('your-prefix-javascript', plugins_url() . '/plugin-name/js/main.js');
	}
	add_action('wp_enqueue_scripts', 'your_prefix_scripts_enqueue');


	// Enqueue scripts for back end
	if (is_admin()) {
		function your_prefix_enqueue_scripts_admin()
		{
			wp_enqueue_style('your-prefix-main-stylesheet', plugins_url() . '/plugin-name/css/style-admin.css');
		}
	}
	add_action('admin_init', 'your_prefix_enqueue_scripts_admin');