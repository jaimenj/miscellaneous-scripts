<?php
/**
 * This fires actions only for activation or deactivation of plugin..
 */
defined('ABSPATH') or die('No no no');

function msjnj_activation()
{
    add_option('msjnj_header_codes', '<!-- CODE INTO HEAD: here you can use CSS and Javascript -->');
    add_option('msjnj_body_start_codes', '<!-- CODE AFTER BODY STARTS: here you can use HTML, CSS and Javascript -->');
    add_option('msjnj_body_end_codes', '<!-- CODE BEFORE BODY ENDS: here you can use HTML, CSS and Javascript -->');
}

function msjnj_deactivation()
{
}
