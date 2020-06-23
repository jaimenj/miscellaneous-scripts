<?php
if (!current_user_can('manage_options')) {
    wp_die(__('Sorry, you are not allowed to manage options for this site.'));
}

?>
<div class="wrap">
<span style="float: right">
    Support the project, please donate <a href="https://paypal.me/jaimeninoles" target="_blank"><b>here</b></a>.<br>
    Need help? Ask <a href="https://jnjsite.com/miscellanous-scripts-for-wordpress/" target="_blank"><b>here</b></a>.
</span>
<h1>Miscellaneous Scripts configurations</h1>

<?php if (isset($msjnjSms)) {
    echo $msjnjSms;
} ?>

<form method="post" action="options-general.php?page=miscellaneous-scripts">
    <?php settings_fields('msjnj_options_group'); ?>
    <?php do_settings_sections('msjnj_options_group'); ?>

    <p><label for="msjnj_header_codes">Codes to add into the HEAD on the frontend:</label></p>
    <textarea name="msjnj_header_codes" id="msjnj_header_codes" class="widefat textarea" rows="3"><?php echo esc_textarea(get_option('msjnj_header_codes')); ?></textarea>

    <p><label for="msjnj_body_start_codes">Codes to add into the BODY when it starts:</label></p>
    <textarea name="msjnj_body_start_codes" id="msjnj_body_start_codes" class="large-text code" rows="3"><?php echo esc_textarea(get_option('msjnj_body_start_codes')); ?></textarea>

    <p><label for="msjnj_body_end_codes">Codes to add into the BODY before it ends:</label></p>
    <textarea name="msjnj_body_end_codes" id="msjnj_body_end_codes" class="large-text code" rows="3"><?php echo esc_textarea(get_option('msjnj_body_end_codes')); ?></textarea>

    <?php wp_nonce_field('msjnj', 'msjnj_nonce'); ?>
    <?php submit_button(); ?>

</form>
</div>

<script>
jQuery(document).ready(function($) {
    wp.codeEditor.initialize($('#msjnj_header_codes'), cm_settings);
    wp.codeEditor.initialize($('#msjnj_body_start_codes'), cm_settings);
    wp.codeEditor.initialize($('#msjnj_body_end_codes'), cm_settings);
})
</script>
<style>
.CodeMirror {
    border: 1px solid #808080;
    box-shadow: 0 0 3px;
    height: 200px;
}
</style>
