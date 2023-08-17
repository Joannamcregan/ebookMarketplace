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

$ebookCategoryID = 32; /*ebooks*/

function marketplace_files(){
    wp_enqueue_script('main-ebook-marketplace-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('book-display-styles', get_stylesheet_directory_uri() . '/css/book-display-styles.css', false, '', 'all');
    wp_enqueue_style('general-styles', get_stylesheet_directory_uri() . '/css/general-styles.css', false, '', 'all');
    wp_enqueue_style('category-styles', get_stylesheet_directory_uri() . '/css/category-styles.css', false, '', 'all');
    wp_enqueue_style('community-members-styles', get_stylesheet_directory_uri() . '/css/community-members-styles.css', false, '', 'all');
    wp_enqueue_style('image-text-container-styles', get_stylesheet_directory_uri() . '/css/image-text-container-styles.css', false, '', 'all');

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

/*add classic_authors post type-------------------------------------------------------------------*/
function author_profile_custom_post_types() {
    register_post_type('author-profile', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'author-profile'),
        'has_archive' => false,
        'public' => true,
        'labels' => array(
            'name' => 'Author-Profiles',
            'add_new_item' => 'Add New Author-Profile',
            'edit_item' => 'Edit Author-Profile',
            'all_items' => 'All Author-Profiles',
            'singular_name' => 'Author-Profile'
        ),
        'menu_icon' => 'dashicons-edit'
    ));
}

add_action('init', 'author_profile_custom_post_types');

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
        'supports' => array('title'),
        'rewrite' => array('slug' => 'triggers'),
        'has_archive' => false,
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
    global $post;
    global $ebookCategoryID;
    $quoteText = '';
    $authorName = '';
    $isBook = false;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == $ebookCategoryID){
            $isBook = true;
        }
    }
    if ($isBook) {
        $bookQuote = get_field('featured_quote');
        if ($bookQuote) {
            $quoteText .= '<em><p>';
            $quoteText .= $bookQuote;
            $quoteText .= '</p></em>';
            echo $quoteText;
        }
        $authorName .= '<p class="right-text-no-margin">';
        $authorName .= '-';
        $bookAuthors = get_field('book_author');        
        if ($bookAuthors) {
            foreach($bookAuthors as $author) {
                if (count($bookAuthors) > 2) {
                    if ($author == $bookAuthors[count($bookAuthors)-2]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ', and ';
                    } else if ($author != $bookAuthors[count($bookAuthors)-1]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ', ';
                    } else {
                        $authorName .= get_the_title($author);
                    }
                } 
                if (count($bookAuthors) == 2) {
                    if ($author == $bookAuthors[count($bookAuthors)-2]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ' and ';
                    } else {
                        $authorName .= get_the_title($author);
                    }
                } 
                if (count($bookAuthors) == 1) {
                    $authorName .= get_the_title($author);
                }
            }
        } else {
            $authorName .= 'Unknown or Anonymous';
        }
        $authorName .= '</p>';
    }     
    echo $authorName;

    $ownVoicesCats = get_the_terms( $post->ID, 'pa_diverse-books' );
    if ($ownVoicesCats) {
        echo '<div class="own-voices">';
        foreach($ownVoicesCats as $cat) {
            echo '<span><i>';
            echo $cat->name; 
            echo '</i></span>';
        }
        echo '</div>';
    }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'ebook_marketplace_include_book_author', 13 );

function ebook_marketplace_include_product_description() {      
    if (str_word_count( strip_tags( strip_shortcodes(get_the_excerpt()))) > 60){
        echo wp_trim_words(get_the_excerpt(), 60, '   ...see more');   
    } else {
        the_excerpt();
    }
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

function ebook_marketplace_single_include_book_author() {  
    global $post;
    global $ebookCategoryID;
    $authorName = '';
    $isBook = false;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == $ebookCategoryID){
            $isBook = true;
        }
    }
    if ($isBook) {
        $authorName .= '<h3 class="sans-text">by ';
        $bookAuthors = get_field('book_author');        
        if ($bookAuthors) {
            foreach($bookAuthors as $author) {
                if (count($bookAuthors) > 2) {
                    if ($author == $bookAuthors[count($bookAuthors)-2]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ', and ';
                    } else if ($author != $bookAuthors[count($bookAuthors)-1]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ', ';
                    } else {
                        $authorName .= get_the_title($author);
                    }
                } 
                if (count($bookAuthors) == 2) {
                    if ($author == $bookAuthors[count($bookAuthors)-2]) {
                        $authorName .= get_the_title($author);
                        $authorName .= ' and ';
                    } else {
                        $authorName .= get_the_title($author);
                    }
                } 
                if (count($bookAuthors) == 1) {
                    $authorName .= get_the_title($author);
                }
            }
        } else {
            $authorName = 'by Unknown or Anonymous';
        }
        $authorName .= '</h3>';
    }     
    echo $authorName;

    $ownVoicesCats = get_the_terms( $post->ID, 'pa_diverse-books' );
    if ($ownVoicesCats) {
        foreach($ownVoicesCats as $cat) {
            echo '<div class="own-voices">';
            // echo '<span>Diverse Voices: </span>';
            echo '<span class="own-voices-cat"><i>';
            echo $cat->name; 
            echo '</i></span></div>';
        }
    }
}
add_action( 'woocommerce_single_product_summary', 'ebook_marketplace_single_include_book_author', 13 );

function ebook_marketplace_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    unset($tabs['description']);
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_remove_product_tabs', 98 );

function ebook_marketplace_rename_vendor_tab( $tabs ) {
    global $post;
    global $ebookCategoryID;
    $isBook = false;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == $ebookCategoryID){
            $isBook = true;
        }
    }
    if ($isBook){
        $tabs['vendor']['title'] = __('About the Publisher', 'multivendorx');
        $tabs['vendor']['priority'] = 90;
    } else {
        unset($tabs['vendor']);
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_rename_vendor_tab', 97 );

function ebook_marketplace_author_product_tab_content() {
    $bookAuthors = get_field('book_author');	
    if ($bookAuthors) {
        if(count($bookAuthors) > 1) {
            echo '<h2>About the Authors</h2>';
        } else {
            echo '<h2>About the Author</h2>';
        }
        foreach($bookAuthors as $author) {
            ?><div class="about-author-card product-tab-content">
                <a href="<?php echo get_the_permalink($author); ?>">
                    <h3><?php echo get_the_title($author); ?></h3>
                </a>
                <div class="author-bio">
                    <img src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                    <?php echo get_the_excerpt($author);
                ?></div>
            </div>        
            <br/>
        <?php }
    } else {
        echo '<h2>About the Author<h2><p>The author of this book is unknown or anonymous.</p>';
    }
}

function ebook_marketplace_triggers_product_tab_content(){
    global $MVX, $product;
    $triggers = get_field('book_trigger');	
    $vendor = get_mvx_product_vendors($product->get_id());
    echo '<h2>Triggers</h2>';
    if ($triggers) {
        echo '<p>Content warning: this book may contain the following triggers:</p>';
        echo '<ul>';
        foreach($triggers as $trigger) {
            echo '<li>' . strtolower(get_the_title($trigger)) . '</li>';       
        }
        echo '</ul>';
    } else {
        echo '<p>No potential triggers have been listed for this book.</p>';
    }
    if ($vendor) {
        echo '<p>To suggest a trigger warning be added, please <a href="' . $vendor->permalink . '">contact the publisher</a></p>';
    }
}
function ebook_marketplace_excerpt_product_tab_content(){
    $excerpt = get_field('excerpt');	
    echo '<h2>Excerpt</h2>';
    if ($excerpt) {
        echo "<div class='product-tab-content'>" . $excerpt . "</div>";
    } else {
        echo '<p>No excerpt has been added for this book.</p>';
    }
}
function ebook_marketplace_add_product_tabs( $tabs ) {
    global $post;
    global $ebookCategoryID;
    $isBook = false;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == $ebookCategoryID){
            $isBook = true;
        }
    }
    if ($isBook){
        $tabs['about_author'] = array(
            'title' 	=> __( 'About the Author(s)', 'woocommerce' ),
            'priority' 	=> 80,
            'callback' 	=> 'ebook_marketplace_author_product_tab_content'
        );
        $tabs['triggers'] = array(
            'title' => __('Possible Triggers'),
            'priority' => 70,
            'callback' => 'ebook_marketplace_triggers_product_tab_content'
        );
        $tabs['excerpt'] = array(
            'title' => __( 'Read an Excerpt' ),
            'priority' => 60,
            'callback' => 'ebook_marketplace_excerpt_product_tab_content'
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

/*infinite scroll*/
// add_theme_support( 'infinite-scroll', array(
//     'type' => 'scroll',
//     'footer_widgets' => false,
//     'footer' => false,
//     'container' => 'content',
//     'wrapper' => true,
//     'render' => false,
//     'posts_per_page' => false,
//    ) );

/*remove proudly powered by wordpress */
function remove_storefront_credit() {
    remove_action( 'storefront_footer', 'storefront_credit' );
}
add_action('wp_head', 'remove_storefront_credit', 5);

// change author url base to contributor
function new_author_base() {
    global $wp_rewrite;
    $myauthor_base = 'people';
    $wp_rewrite->author_base = $myauthor_base;
}
add_action('init', 'new_author_base');

// Make book covers not clickable on individual product pages-------------------------------------------
/*function remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'remove_product_image_link', 10, 2 );
*/
// Customize My Account nav-----------------------------------------------------------------------------
add_filter( 'woocommerce_account_menu_items', function($items) {
    unset($items['subscriptions']);
    unset($items['edit-address']);
    return $items;
}, 99, 1 );
// Fix image size source sets------------------------------------------------------------------------------
