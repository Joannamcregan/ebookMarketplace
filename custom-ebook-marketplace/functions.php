<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//styles

function marketplace_files(){
    wp_enqueue_style('book-display-styles', get_stylesheet_directory_uri() . '/css/book-display-styles.css', false, '', 'all');
    wp_enqueue_style('general-styles', get_stylesheet_directory_uri() . '/css/general-styles.css', false, '', 'all');
}

add_action('wp_enqueue_scripts','marketplace_files');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

/*add member_authors post type-------------------------------------------------------------------*/
function member_authors_custom_post_types() {
    register_post_type('member-author', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'member-authors'),
        'has_archive' => false,
        'public' => true,
        'labels' => array(
            'name' => 'Member-Authors',
            'add_new_item' => 'Add New Member-Author',
            'edit_item' => 'Edit Member-Author',
            'all_items' => 'All Member-Authors',
            'singular_name' => 'Member-Author'
        ),
        'menu_icon' => 'dashicons-edit'
    ));
}

add_action('init', 'member_authors_custom_post_types');

/*add curations post type----------------------------------------------------------*/
function curations_custom_post_types() {
    register_post_type('curations', array(
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'bookshelves'),
        'has_archive' => true,
        'public' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Bookshelves',
            'add_new_item' => 'Add New Bookshelf',
            'edit_item' => 'Edit Bookshelf',
            'all_items' => 'All Bookshelves',
            'singular_name' => 'Bookshelf'
        ),
        'menu_icon' => 'dashicons-editor-table'
    ));
}

add_action('init', 'curations_custom_post_types');

/*Shortcode-----------------------------------------------------------------------*/
add_shortcode( 'user-bookshelves', 'user_bookshelves' );
function user_bookshelves(){
    $relatedBookshelves = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'curations',
        'author' => get_the_author_id(),
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    if ($relatedBookshelves->have_posts()){
        $output = '';
        while ($relatedBookshelves -> have_posts()){
            $relatedBookshelves->the_post();     
            $output .= '<p><a href="';
            $output .= get_the_permalink(); 
            $output .= '">';       
            $output .= get_the_title();
            $output .= '</a></p>';
        }
        return $output;
    }
    else {
        return 'No bookshelves found.';
    }

    wp_reset_postdata();
}
add_action('init', 'user_bookshelves');