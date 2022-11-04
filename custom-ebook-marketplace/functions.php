<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//styles

function marketplace_files(){
    wp_enqueue_style('author-page-styles', get_stylesheet_directory_uri() . '/css/author-page-styles.css', false, '', 'all');
    wp_enqueue_style('general-styles', get_stylesheet_directory_uri() . '/css/general-styles.css', false, '', 'all');
}

add_action('wp_enqueue_scripts','marketplace_files');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );