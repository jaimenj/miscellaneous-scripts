<?php
/**
 * This creates the menú and calls for registering the plugin options.
 */
defined('ABSPATH') or die('No no no');

function msjnj_create_menu()
{
    $parent_slug = 'options-general.php';
    $page_title = 'Miscellaneous Scripts configurations';
    $menu_title = 'Miscellaneous Scripts';
    $capability = 'manage_options';
    $menu_slug = 'miscellaneous-scripts';
    $function = 'msjnj_admin_panel';
    $position = null;

    add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function, $position);
}

function msjnj_register_options()
{
    register_setting('msjnj_options_group', 'msjnj_header_codes');
    register_setting('msjnj_options_group', 'msjnj_body_start_codes');
    register_setting('msjnj_options_group', 'msjnj_body_end_codes');
}

function msjnj_admin_panel()
{
    // Save Settings
    if (isset($_REQUEST['submit']) and current_user_can('administrator')) {
        if (!isset($_REQUEST['msjnj_nonce'])) {
            $msjnjSms = '<div id="message" class="notice notice-error is-dismissible"><p>ERROR: nonce field is missing. Settings NOT saved.</p></div>';
        } elseif (!wp_verify_nonce($_REQUEST['msjnj_nonce'], 'msjnj')) {
            $msjnjSms = '<div id="message" class="notice notice-error is-dismissible"><p>ERROR: invalid nonce specified. Settings NOT saved.</p></div>';
        } else {
            update_option('msjnj_header_codes', stripslashes($_REQUEST['msjnj_header_codes']));
            update_option('msjnj_body_start_codes', stripslashes($_REQUEST['msjnj_body_start_codes']));
            update_option('msjnj_body_end_codes', stripslashes($_REQUEST['msjnj_body_end_codes']));

            $msjnjSms = '<div id="message" class="notice notice-success is-dismissible"><p>Settings saved successfully!</p></div>';
        }
    }

    include MSJNJ_PATH.'views/options-form.php';
}

function msjnj_settings_link($links)
{
    return array_merge(
        ['<a href="'.admin_url('options-general.php?page=miscellaneous-scripts').'">'.__('Settings').'</a>'],
        $links
    );
}

function msjnj_codemirror_scripts($hook)
{
    $cm_settings['codeEditor'] = wp_enqueue_code_editor(['type' => 'text/html']);
    wp_localize_script('jquery', 'cm_settings', $cm_settings);
    wp_enqueue_script('wp-theme-plugin-editor');
    wp_enqueue_style('wp-codemirror');
}
