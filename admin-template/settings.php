<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $message, $type;

if (!current_user_can('edit_theme_options')) {
    wp_die( "You don't have permission to access this page!" );
}
?>
<div class="wrap">
    <h1>Theme Options</h1>
    <form id="wp-nn-theme-settings" method="post" action="options.php">
    <?php
    do_settings_sections("nn_theme_settings");
    submit_button();
    ?>
    </form>
</div>