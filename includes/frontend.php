<?php
/**
 * Functions that interact with the frontend injecting codes.
 */
defined('ABSPATH') or die('No no no');

function msjnj_inject_header_codes()
{
    echo get_option('msjnj_header_codes');
}

function msjnj_inject_body_start_codes()
{
    echo get_option('msjnj_body_start_codes');
}

function msjnj_inject_body_end_codes()
{
    echo get_option('msjnj_body_end_codes');
}
