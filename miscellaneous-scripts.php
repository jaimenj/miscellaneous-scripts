<?php
/**
 * Plugin Name: Miscellaneous Scripts
 * Plugin URI: https://jnjsite.com/miscellaneous-scripts-for-wordpress/
 * Description: General tool to customize WordPress adding any kind of HTML, CSS and Javascript to the frontend. Really easy, fast, a very small and powerful plugin!
 * Version: 1.0
 * Author: Jaime Niñoles
 * Author URI: https://jnjsite.com/.
 */
defined('ABSPATH') or die('No no no');
define('MSJNJ_PATH', plugin_dir_path(__FILE__));

include MSJNJ_PATH.'includes/admin-menu.php';
include MSJNJ_PATH.'includes/activation.php';
include MSJNJ_PATH.'includes/frontend.php';

// On activation set by default options with comments.
register_activation_hook(__FILE__, 'msjnj_activation');
register_deactivation_hook(__FILE__, 'msjnj_deactivation');

// Adding the links, options, menu.. into the admin zone.
add_action('admin_menu', 'msjnj_create_menu');
add_action('admin_init', 'msjnj_register_options');
add_filter('plugin_action_links_miscellaneous-scripts/miscellaneous-scripts.php', 'msjnj_settings_link');

// Using CodeMirror for editing codes.
add_action('admin_enqueue_scripts', 'msjnj_codemirror_scripts');

// Injecting codes to the frontend from the option values.
add_action('wp_head', 'msjnj_inject_header_codes');
add_action('wp_body_open', 'msjnj_inject_body_start_codes');
add_action('wp_footer', 'msjnj_inject_body_end_codes');
