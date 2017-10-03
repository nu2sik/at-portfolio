<?php
/*
Plugin Name: AT-Portfolio Plugin
Plugin URI: https://codetiburon.com/
Description: Portfolio plugin for courses WP.
Version: 1.0
Author: Anna Tarakanova
Author URI: skype - nu2sik
Text Domain: at-portfolio
*/


	require_once plugin_dir_path(__FILE__) . 'post_types.php';
	require_once plugin_dir_path(__FILE__) . 'taxonomy.php';
	require_once plugin_dir_path(__FILE__) . 'metabox.php';
	require_once plugin_dir_path(__FILE__) . 'widgets.php';

	function custom_font() {
	 	wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans' );
	}
	 
	add_action( 'wp_enqueue_style', 'custom_font' );

	add_action('admin_enqueue_scripts', 'at_admin_scripts');

	function at_admin_scripts() {
	  wp_enqueue_script('jquery-ui-datepicker');
	  wp_enqueue_script('at-admin', plugin_dir_url(__FILE__) . 'js/admin.js');
	  wp_enqueue_style('at-datepicker-style', '//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css');
	}

	


?>