<?php
/**
 * It deletes options from DB, that's all for cleaning.
 */
defined('ABSPATH') or die('No no no');
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('msjnj_header_codes');
delete_option('msjnj_body_start_codes');
delete_option('msjnj_body_end_codes');
