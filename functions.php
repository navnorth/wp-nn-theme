<?php
define( 'NN_TEXT_DOMAIN' , 'navigationnorth' );

add_action( 'wp_enqueue_scripts' , 'nn_enqueue_styles' );
add_action( 'admin_enqueue_scripts' , 'nn_enqueue_styles' );
function nn_enqueue_styles(){
    wp_enqueue_style('nn-styles', get_stylesheet_uri());
}