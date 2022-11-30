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

/*add theme support-------------------------------------------------------------*/
function marketplace_features(){
    add_image_size('bookCover', 300, 450, true);
    add_image_size('authorImage', 300, 450, true);
    add_theme_support('woocommerce', array(
        'product_grid' => array(
            'default_rows' => 5,
            'max_rows' => 10,
            'default_columns' => 2,
            'min-columns' => 1,
            'max_columns' => 5
        )
    ));
    add_theme_support('wc_product_gallery_slider');
}

add_action('after_setup_theme', 'marketplace_features');

/*add member_authors post type-------------------------------------------------------------------*/
function member_authors_custom_post_types() {
    register_post_type('member-author', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'member-authors'),
        'has_archive' => true,
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

/*genre category archive page-----------------------------------------------------------------------*/
function ebook_marketplace_product_collection_container(){
    echo '<div class="product-collection-container">';
}

add_action('woocommerce_product_loop_start', 'ebook_marketplace_product_collection_container', 10);

function ebook_marketplace_product_details_opening_div(){
    echo '<div class="product-section">';
}

add_action( 'woocommerce_before_shop_loop_item', 'ebook_marketplace_product_details_opening_div', 12 );

function ebook_marketplace_include_book_author() {  
    $authorName = '<p class=" right-text-no-margin">by ';
    $isBook = true;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == 109/*gift card*/){
            $isBook = false;
        }
    }
    if ($isBook) {
        $bookAuthors = get_field('book_author');        
        if ($bookAuthors) {
            foreach($bookAuthors as $author) {
                if (($author == $bookAuthors[count($bookAuthors)-2]) && count($bookAuthors) > 2) {
                    $authorName .= get_the_title($author);
                    $authorName .= ', and ';
                } else if (($author == $bookAuthors[count($bookAuthors)-2]) && count($bookAuthors) == 2) {
                    $authorName .= get_the_title($author);
                    $authorName .= ' and ';
                } else if ($author != $bookAuthors[count($bookAuthors)-1]){
                    $authorName .= get_the_title($author);
                    $authorName .= ', ';
                } else {
                    $authorName .= get_the_title($author);
                }
            }
        } else {
            $authorName = 'Unknown or Anonymous';
        }
    }     
    $authorName .= '</p>';
    echo $authorName;

    $ownVoicesCats = get_the_terms( $post->ID, 'pa_own-voices' );
    if ($ownVoicesCats) {
        foreach($ownVoicesCats as $cat) {
            echo '<div class="own-voices right-text-no-margin">';
            echo '<span>Own Voices: ';
            echo '<i>';
            echo $cat->name; 
            echo '</i></span></div>';
        }
    }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'ebook_marketplace_include_book_author', 13 );

function ebook_marketplace_include_product_description() {      
    the_excerpt();      
}

add_action( 'woocommerce_after_shop_loop_item_title', 'ebook_marketplace_include_product_description', 14 );

function ebook_marketplace_product_details_closing_div(){
    echo '</div>';
}

add_action( 'woocommerce_after_shop_loop_item', 'ebook_marketplace_product_details_closing_div', 10 );

function ebook_marketplace_product_collection_container_close(){
    echo '</div>';
}

add_action('woocommerce_after_shop_loop', 'ebook_marketplace_product_collection_container_close', 10);

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 30);