<?php
define( 'NN_TEXT_DOMAIN' , 'navigationnorth' );

add_action( 'wp_enqueue_scripts' , 'nn_enqueue_styles' );
add_action( 'admin_enqueue_scripts' , 'nn_enqueue_styles' );
function nn_enqueue_styles(){
    wp_enqueue_style('nn-styles', get_stylesheet_uri());
}

/**
 * Register custom block styles for core blocks.
 */
add_action( 'init', 'nn_register_custom_block_styles');
function nn_register_custom_block_styles() {
      // Define the custom styles for the button block.
      $button_styles = array(
        array(
            'name'  => 'nn-blue',
            'label' => __( 'NN Blue', 'nn-text-domain' ),
        ),
        array(
            'name'  => 'nn-cyan',
            'label' => __( 'NN Cyan', 'nn-text-domain' ),
        ),
        array(
            'name'  => 'nn-yellow',
            'label' => __( 'NN Yellow', 'nn-text-domain' ),
        ),
    );

    // Loop through the styles and register each one.
    foreach ( $button_styles as $style ) {
        register_block_style( 'core/button', $style );
    }
}

function remove_button_outline_style() {
    wp_enqueue_script(
        'custom-block-editor-js',
        get_stylesheet_directory_uri() . '/assets/js/button-unregister-styles.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
        filemtime( get_stylesheet_directory() . '/assets/js/button-unregister-styles.js' )
    );
}
add_action( 'enqueue_block_editor_assets', 'remove_button_outline_style', 20 );