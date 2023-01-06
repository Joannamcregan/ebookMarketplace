<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//require files
require get_theme_file_path('/inc/search-route.php');

// function marketplace_custom_rest() {
//     register_rest_field('post', 'authorName', array(
//         'get_callback' => function () {return get_the_author();}
//     ));
// }

// add_action('rest_api_init', 'marketplace_custom_rest');

function marketplace_files(){
    wp_enqueue_script('main-ebook-marketplace-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('book-display-styles', get_stylesheet_directory_uri() . '/css/book-display-styles.css', false, '', 'all');
    wp_enqueue_style('general-styles', get_stylesheet_directory_uri() . '/css/general-styles.css', false, '', 'all');

    wp_localize_script('main-ebook-marketplace-js', 'marketplaceData', array(
        'root_url' => get_site_url()
    ));
}

add_action('wp_enqueue_scripts','marketplace_files');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

/*add theme support-------------------------------------------------------------*/
function marketplace_features(){
    add_image_size('bookCover', 300, 450, true);
    add_image_size('bookThumbnail', 150, 225, true);
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
        'show_in_rest' => true,
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
        'show_in_rest' => true,
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

/*add trigger post type----------------------------------------------------------*/
function trigger_custom_post_types() {
    register_post_type('trigger', array(
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'triggers'),
        'has_archive' => true,
        'public' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Triggers',
            'add_new_item' => 'Add New Trigger',
            'edit_item' => 'Edit Trigger',
            'all_items' => 'All Triggers',
            'singular_name' => 'Trigger'
        ),
        'menu_icon' => 'dashicons-warning'
    ));
}

add_action('init', 'trigger_custom_post_types');

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

/*remove sidebar-------------------------------------------------------------------*/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/*remove breadcrumbs from all pages-------------------------------------------------------*/
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/*genre category archive page-----------------------------------------------------------------------*/
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

function ebook_marketplace_product_collection_container(){
    echo '<div class="product-collection-container">';
}
add_action('woocommerce_product_loop_start', 'ebook_marketplace_product_collection_container', 10);

function ebook_marketplace_product_details_opening_div(){
    echo '<div class="product-section">';
}
add_action( 'woocommerce_before_shop_loop_item', 'ebook_marketplace_product_details_opening_div', 12 );

function ebook_marketplace_include_book_author() {  
    $authorName = '';
    $isBook = true;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == 109/*gift card*/){
            $isBook = false;
        }
    }
    if ($isBook) {
        $authorName .= '<p class=" right-text-no-margin">';
        $authorName .= 'by ';
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
        $authorName .= '</p>';
    }     
    echo $authorName;

    $ownVoicesCats = get_the_terms( $post->ID, 'pa_own-voices' );
    if ($ownVoicesCats) {
        foreach($ownVoicesCats as $cat) {
            echo '<div class="own-voices right-text-no-margin">';
            echo '<span>Own Voices: </span>';
            echo '<span class="own-voices-cat"><i>';
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

function ebook_marketplace_genre_archive_include_price(){
    add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_price', 25);
}
add_action('woocommerce_after_shop_loop_item_title', 'ebook_marketplace_genre_archive_include_price', 20);

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

/*style single product page ------------------------------------------------------------------*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

function ebook_marketplace_single_product_main_div(){
    echo '<div class="product-page-content">';
}
add_action('woocommerce_before_single_product', 'ebook_marketplace_single_product_main_div', 10);

function ebook_marketplace_bottom_section_start(){
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
}
add_action('woocommerce_single_product_summary', 'ebook_marketplace_bottom_section_start', 20);

function ebook_marketplace_single_product_closing_bottom_div(){
    echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'ebook_marketplace_single_product_closing_bottom_div', 10);

function ebook_marketplace_single_product_closing_main_div(){
    echo '</div>';
}
add_action('woocommerce_after_single_product_summary', 'ebook_marketplace_single_product_closing_main_div', 20);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

function ebook_marketplace_rename_description_tab( $tabs ) {

	$tabs[ 'description' ][ 'title' ] = 'Read an Excerpt';

	return $tabs;

}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_rename_description_tab' );

function ebook_marketplace_description_heading( $heading ){

	return 'Read an Excerpt';
	
}
add_filter( 'woocommerce_product_description_heading', 'ebook_marketplace_description_heading' );

function ebook_marketplace_single_include_book_author() {  
    $authorName = '';
    $isBook = true;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == 109/*gift card*/){
            $isBook = false;
        }
    }
    if ($isBook) {
        $authorName .= '<h3 class="sans-text">by ';
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
        $authorName .= '</h3>';
    }     
    echo $authorName;

    $ownVoicesCats = get_the_terms( $post->ID, 'pa_own-voices' );
    if ($ownVoicesCats) {
        foreach($ownVoicesCats as $cat) {
            echo '<div class="own-voices">';
            echo '<span>Own Voices: </span>';
            echo '<span class="own-voices-cat"><i>';
            echo $cat->name; 
            echo '</i></span></div>';
        }
    }
}
add_action( 'woocommerce_single_product_summary', 'ebook_marketplace_single_include_book_author', 13 );

function ebook_marketplace_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_remove_product_tabs', 98 );

function ebook_marketplace_author_product_tab_content() {
    $bookAuthors = get_field('book_author');	
    if ($bookAuthors) {
        if(count($bookAuthors) > 1) {
            echo '<h2>About the Authors</h2>';
        } else {
            echo '<h2>About the Author</h2>';
        }
        foreach($bookAuthors as $author) {
            ?><div class="about-author-card">
                <div>
                    <a href="<?php echo get_the_permalink($author); ?>">
                        <h3><?php echo get_the_title($author); ?></h3>
                    </a>
                </div>
                <div class="author-bio">
                    <img src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                    <?php the_excerpt($author);
                ?></div>
            </div>        
        <?php }
    } else {
        echo '<h2>About the Author<h2><p>The author of this book is unknown or anonymous.</p>';
    }
}
function ebook_marketplace_triggers_product_tab_content(){
    $triggers = get_field('book_trigger');	
    echo '<h2>Triggers</h2>';
    if ($triggers) {
        echo '<p>Content warning: this book may contain the following triggers:</p>';
        echo '<ul>';
        foreach($triggers as $trigger) {
            echo '<li>' . get_the_title($trigger) . '</li>';       
        }
        echo '</ul>';
    } else {
        echo '<p>No potential triggers have been listed for this book.</p>';
    }
}
function ebook_marketplace_add_product_tabs( $tabs ) {
    $isBook = true;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == 109/*gift card*/){
            $isBook = false;
        }
    }
    if ($isBook){
        $tabs['about_author'] = array(
            'title' 	=> __( 'About the Author(s)', 'woocommerce' ),
            'priority' 	=> 50,
            'callback' 	=> 'ebook_marketplace_author_product_tab_content'
        );
        $tabs['triggers'] = array(
            'title' => __('Possible Triggers'),
            'priority' => 60,
            'callback' => 'ebook_marketplace_triggers_product_tab_content'
        );
    }
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_add_product_tabs' );

/*allow dashicons to display----------------------------------------------------------------------*/
function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');

