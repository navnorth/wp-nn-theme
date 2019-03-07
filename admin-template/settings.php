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
        <?php settings_fields("theme_settings_page"); ?>
        <div class="form-row">
        <?php
            do_settings_fields("theme_settings_page", "wp_nn_theme_settings");
        ?>
        </div>
        <div class="row">
            <fieldset>
                <legend><h3><?php _e('Social Links', 'wp_nn_theme'); ?></h3></legend>
                <?php
                do_settings_fields("theme_settings_page", "wp_nn_theme_social_settings");
                ?>
            </fieldset>
        </div>
        <?php
        submit_button();
        ?>
    </form>
</div>
<div class="admin-theme-footer">
	<div class="admin-theme-info"><?php echo WP_NN_THEME_NAME . " " . WP_NN_THEME_VERSION .""; ?></div>
	<div class="clear"></div>
</div>