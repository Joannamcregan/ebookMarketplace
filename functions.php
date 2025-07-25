<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//require files
require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/settings-route.php');
require get_theme_file_path('/inc/vendor-route.php');

// function marketplace_custom_rest() {
//     register_rest_field('post', 'authorName', array(
//         'get_callback' => function () {return get_the_author();}
//     ));
// }

// add_action('rest_api_init', 'marketplace_custom_rest');

$ebookCategoryID = 32; /*ebooks*/

function marketplace_files(){
    wp_enqueue_script('main-ebook-marketplace-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('buddypress', get_stylesheet_directory_uri() . '/css/buddypress.css', false, '', 'all');
    wp_enqueue_style('bbpress', get_stylesheet_directory_uri() . '/css/bbpress.css', false, '', 'all');
    wp_enqueue_style('book-display-styles', get_stylesheet_directory_uri() . '/css/book-display-styles.css', false, '', 'all');
    wp_enqueue_style('general-styles', get_stylesheet_directory_uri() . '/css/general-styles.css', false, '', 'all');
    wp_enqueue_style('front-styles', get_stylesheet_directory_uri() . '/css/front-styles.css', false, '', 'all');
    wp_enqueue_style('category-styles', get_stylesheet_directory_uri() . '/css/category-styles.css', false, '', 'all');
    wp_enqueue_style('community-members-styles', get_stylesheet_directory_uri() . '/css/community-members-styles.css', false, '', 'all');
    wp_enqueue_style('image-text-container-styles', get_stylesheet_directory_uri() . '/css/image-text-container-styles.css', false, '', 'all');
    wp_enqueue_style('comment-styles', get_stylesheet_directory_uri() . '/css/comment-styles.css', false, '', 'all');
    wp_enqueue_style('seventies-styles', get_stylesheet_directory_uri() . '/css/seventies-style.css', false, '', 'all');
    wp_enqueue_style('woo-styles', get_stylesheet_directory_uri() . '/css/woo-page-styles.css', false, '', 'all');
    wp_enqueue_style('mvx-styles', get_stylesheet_directory_uri() . '/css/mvx-page-styles.css', false, '', 'all');
    wp_enqueue_style('forminator-styles', get_stylesheet_directory_uri() . '/css/forminator-styles.css', false, '', 'all');
    wp_enqueue_style('icon-styles', get_stylesheet_directory_uri() . '/css/icon-styles.css', false, '', 'all');
    wp_enqueue_style('animation-styles', get_stylesheet_directory_uri() . '/css/animation-styles.css', false, '', 'all');
    wp_enqueue_style('search-styles', get_stylesheet_directory_uri() . '/css/search-styles.css', false, '', 'all');
    wp_enqueue_style('roadmap-styles', get_stylesheet_directory_uri() . '/css/roadmap-styles.css', false, '', 'all');

    wp_localize_script('main-ebook-marketplace-js', 'marketplaceData', array(
        'root_url' => get_site_url(),        
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

add_action('wp_enqueue_scripts','marketplace_files');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

// Disable default WooCommerce styling
add_filter('woocommerce_enqueue_styles', '__return_false');

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
    // add_theme_support('wc_product_gallery_slider');
}

add_action('after_setup_theme', 'marketplace_features');

//Free Offer Post Type------------------------------------------------------------------------------------
// function free_offer_custom_post_types() {
//     register_post_type('free offer', array(
//         'supports' => array('title', 'editor', 'excerpt'),
//         'has_archive' => true,
//         'rewrite' => array(
//             'slug' => 'free-offers'
//         ),
//         'public' => true,
//         'menu_position' => 0,
//         'labels' => array(
//             'name' => 'Free Offers',
//             'add_new' => 'Add New Free Offer',
//             'edit_item' => 'Edit Free Offer',
//             'all_items' => 'All Free Offers',
//             'singular_item' > 'Free Offer'
//         ),
//         'menu_icon' => 'dashicons-smiley'
//     ));
// }

// add_action('init', 'free_offer_custom_post_types');

//Need Post Type------------------------------------------------------------------------------------
// function need_custom_post_types() {
//     register_post_type('need', array(
//         'supports' => array('title', 'editor', 'excerpt'),
//         'has_archive' => true,
//         'rewrite' => array(
//             'slug' => 'needs'
//         ),
//         'public' => true,
//         'menu_position' => 0,
//         'labels' => array(
//             'name' => 'Needs',
//             'add_new' => 'Add New Need',
//             'edit_item' => 'Edit Needs',
//             'all_items' => 'All Needs',
//             'singular_item' > 'Need'
//         ),
//         'menu_icon' => 'dashicons-heart'
//     ));
// }

// add_action('init', 'need_custom_post_types');

/*customize login logo----------------------------------------------------------------------*/
function ebook_marketplace_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_theme_file_uri('/images/TOMC_logo.jpg'); ?>) !important;
        height:150px;
        width:150px;
        background-size: 150px 150px;
        background-repeat: no-repeat;
        padding-bottom: 0px;
        border-radius: 15px;
        display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ebook_marketplace_login_logo' );

/*remove sidebar-------------------------------------------------------------------*/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/*remove breadcrumbs from all pages-------------------------------------------------------*/
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/*genre category archive page-----------------------------------------------------------------------*/

function woocommerce_template_loop_product_link_open() {
    global $product;
 
    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
 
    echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" aria-label="' . $product->get_title() . ' product page">';
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

function ebook_marketplace_product_collection_container(){
    echo '<div class="product-collection-container">';
}
add_action('woocommerce_product_loop_start', 'ebook_marketplace_product_collection_container', 10);

function ebook_marketplace_product_details_opening_div(){
    echo '<div class="product-section">';
}
add_action( 'woocommerce_before_shop_loop_item', 'ebook_marketplace_product_details_opening_div', 12 );

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

/*accessibility for product archive------------------------------------------------------------------------*/
// add_filter('wp_get_attachment_image_attributes', 'ebook_marketplace_attachement_image_attributes', 20, 2);

// function ebook_marketplace_attachement_image_attributes($attr, $attachment) {
//     global $post;
//     if ($post->post_type == 'product') {
//         $title = $post->post_title;
//         $attr['alt'] = $title;
//         $attr['title'] = $title;
//     }
//     return $attr;
// }

// if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
// 	/**
// 	 * Insert the opening anchor tag for products in the loop.
// 	 */
// 	function woocommerce_template_loop_product_link_open() {
// 		global $product;

// 		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

// 		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" aria-label="' . get_the_title() . '">';
// 	}
// }

/*style single product page ------------------------------------------------------------------*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

function ebook_marketplace_single_product_main_div(){
    echo '<div class="product-page-content">';
}
add_action('woocommerce_before_single_product', 'ebook_marketplace_single_product_main_div', 10);

function ebook_marketplace_bottom_section_start(){
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
    // echo '</div>';
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

function ebook_marketplace_single_product_additional_info() {  
    global $MVX, $product, $wpdb;
    $user = wp_get_current_user();
    $userid = $user->ID;
    $productid = $product->get_id();
    $books_pennames_table = $wpdb->prefix . "tomc_pen_names_books";
    $posts_table = $wpdb->prefix . "posts";
    $book_products_table = $wpdb->prefix . "tomc_book_products";
    $product_types_table = $wpdb->prefix . "tomc_product_types";
    $content_warnings_table = $wpdb->prefix . "tomc_content_warnings";
    $book_warnings_table = $wpdb->prefix . "tomc_book_warnings";
    $reader_triggers_table = $wpdb->prefix . "tomc_reader_triggers";
    $term_relationships_table = $wpdb->prefix . "term_relationships";
    $term_taxonomy_table = $wpdb->prefix . "term_taxonomy";
    $terms_table = $wpdb->prefix . "terms";
    $lookup_table = $wpdb->prefix . "wc_order_product_lookup";

    $query = 'select terms.name
    from %i tr 
    join %i tt on tr.term_taxonomy_id = tt.term_taxonomy_id
    join %i terms on tt.term_id = terms.term_id
    and tt.taxonomy = "product_cat"
    where tr.object_id = %d';
    $results = $wpdb->get_results($wpdb->prepare($query, $term_relationships_table, $term_taxonomy_table, $terms_table, $productid), ARRAY_A);
    if ($results){
        if ($results[0]['name'] != null){
            echo '<p class="product-type">' . rtrim($results[0]['name'], 's') . '</p>';
        }
    }

    $query = 'select p.post_title
    from %i bp
    join %i bpn on bp.bookid = bpn.bookid
    left join %i p on bpn.pennameid = p.id
    where bp.productid = %d 
    limit 1';
    $results = $wpdb->get_results($wpdb->prepare($query, $book_products_table, $books_pennames_table, $posts_table, $productid), ARRAY_A);
    if ($results){
        echo '<h2>by ' . $results[0]['post_title'] . '</h2>';
    }
    

    $query = 'select distinct cw.warning_name, rt.readerid
    from %i cw
    join %i bw on cw.id = bw.warningid
    join %i bp on bw.bookid = bp.bookid
    left join %i rt on cw.id = rt.triggerid
    and rt.readerid = %d
    where bp.productid = %d
    order by rt.readerid desc';
    $results = $wpdb->get_results($wpdb->prepare($query, $content_warnings_table, $book_warnings_table, $book_products_table, $reader_triggers_table, $userid, $productid), ARRAY_A);
    if ($results){
        if ($results[0]['readerid'] != ''){
            echo '<div class="tomc-product-warning-div red-product-warning"><p class="tomc-product-view-warnings centered-text">show trigger warnings</p>';
        } else {
            echo '<div class="tomc-product-warning-div black-product-warning"><p class="tomc-product-view-warnings centered-text">show trigger warnings</p>';
        }
        echo '<div class="tomc-product-content-warnings hidden">';
        for ($i = 0; $i < count($results); $i++){
            echo '<p class="centered-text"><em>' . $results[$i]['warning_name'] . '</em></p>';
        }
        echo '</div></div>';
    }

    if ($productid != 4334 /*ISBN Registration*/){
        $query = 'select p.post_title, terms.name
        from %i l
        join %i p on l.product_id = p.id
        join %i tr on p.id = tr.object_id
        join %i terms on tr.term_taxonomy_id = terms.term_id
        join %i tt on tr.term_taxonomy_id = tt.term_taxonomy_id
        and tt.taxonomy = "product_cat"
        where l.customer_id = %d
        and l.product_id = %d';
        $existingBookPurchase = $wpdb->get_results($wpdb->prepare($query, $lookup_table, $posts_table, $term_relationships_table, $terms_table, $term_taxonomy_table, $userid, $productid), ARRAY_A);
        if (($existingBookPurchase) && count($existingBookPurchase) > 0){
            $format = $existingBookPurchase[0]['name'];
            $product = $existingBookPurchase[0]['post_title'];
            if ($format == 'event tickets'){
                echo '<div><p><em>Our records indicate you have already purchased ' . $product . '.</em></p></div>';
            } else {
                echo '<div><p><em>Our records indicate you have already purchased ' . $product . ' in ' . substr_replace($format, "",-1) . ' format.</em></p></div>';
            }
        }
    }
}
add_action( 'woocommerce_single_product_summary', 'ebook_marketplace_single_product_additional_info', 13 );

function ebook_marketplace_remove_product_tabs( $tabs ) {
    unset($tabs['additional_information']); 
    unset($tabs['description']);
    unset($tabs['reviews']);
    unset($tabs['vendor']);
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'ebook_marketplace_remove_product_tabs', 98 );

function tomc_get_gallery_files() {
    global $post;
    if (is_product()) {
        $terms = get_the_terms( $post->ID, 'product_cat' );
        $isAudiobook = false;
        foreach ($terms as $term) {
            if ($term->name == 'Audiobooks'){
                $isAudiobook = true;
                break;
            }
        }
        if ($isAudiobook){
            if (strlen(get_the_content() > 0)){
                echo '<div class="tomc-product-preview-section-wrapper"><div class="tomc-product-preview-section"><h2 class="centered-text">Preview</h2>';
                echo do_shortcode(get_post_field('post_content', $post->id));
                echo '</div></div>';
            }
        }
    }
}
add_action( 'woocommerce_after_single_product_summary', 'tomc_get_gallery_files', 20 );

function tomc_get_book_info() {
    global $product, $wpdb;
    $productid = $product->get_id();
    $books_table = $wpdb->prefix . "tomc_books";
    $book_products_table = $wpdb->prefix . "tomc_book_products";
    $term_relationships_table = $wpdb->prefix . "term_relationships";
    $term_taxonomy_table = $wpdb->prefix . "term_taxonomy";
    $terms_table = $wpdb->prefix . "terms";
    $products_table = $wpdb->prefix . "posts";
    $query = 'select books.book_description, books.book_excerpt, products.post_content, terms.name, products.post_title
    from %i products
    left join %i bp on products.id = bp.productid
    left join %i books on bp.bookid = books.id
    left join %i tr on products.id = tr.object_id
    left join %i tt on tr.term_taxonomy_id = tt.term_taxonomy_id
    and tt.taxonomy = "product_cat"
    left join %i terms on tt.term_id = terms.term_id
    where products.id = %d
    order by tt.term_id desc
    limit 1';
    $results = $wpdb->get_results($wpdb->prepare($query, $products_table, $book_products_table, $books_table, $term_relationships_table, $term_taxonomy_table, $terms_table, $productid), ARRAY_A);
    if ($results){
        if (($results[0]['name'] == 'Services') || ($results[0]['post_title'] == 'ISBN Registration') || $results[0]['name'] == 'Event Tickets'){
            echo '<div class="tomc-single-book-description-wrapper"><div class="tomc-single-book-description"><h2>Description</h2><p style="white-space: pre-line">' . $results[0]['post_content'] . '</p></div></div>';
        } else {
            echo '<div class="tomc-single-book-description-wrapper"><div class="tomc-single-book-description"><h2>Description</h2><p style="white-space: pre-line">' . $results[0]['book_description'] . '</p></div></div>';
            echo '<div class="tomc-single-book-excerpt-wrapper"><div class="tomc-single-book-excerpt"><h2>Excerpt</h2><p style="white-space: pre-line">' . $results[0]['book_excerpt'] . '</p></div></div>';
        }
    }
}
add_action( 'woocommerce_after_single_product_summary', 'tomc_get_book_info', 30 );

function tomc_get_book_author_info() {
    global $MVX, $product, $wpdb;
    $productid = $product->get_id();
    $books_pennames_table = $wpdb->prefix . "tomc_pen_names_books";
    $posts_table = $wpdb->prefix . "posts";
    $book_products_table = $wpdb->prefix . "tomc_book_products";
    $query = 'select p.post_content 
    from %i bp
    join %i bpn on bp.bookid = bpn.bookid
    and bp.productid = %d 
    join %i p on bpn.pennameid = p.id
    limit 1';
    $results = $wpdb->get_results($wpdb->prepare($query, $book_products_table, $books_pennames_table, $productid, $posts_table), ARRAY_A);
    if ($results){
        if (strlen($results[0]['post_content']) > 0){
            echo '<div class="tomc-single-product-author-wrapper"><div class="tomc-single-product-author"><h2>About the Author</h2><p style="white-space: pre-line">' . $results[0]['post_content'] . '</div></div>';
        }
    }
}
add_action( 'woocommerce_after_single_product_summary', 'tomc_get_book_author_info', 40 );

function tomc_template_product_reviews() {
    echo '<div class="tomc-review-section-wrapper">';
    woocommerce_get_template( 'single-product-reviews.php' );
    echo '</div>';
}
add_action( 'woocommerce_after_single_product_summary', 'tomc_template_product_reviews', 50 );

/*allow dashicons to display----------------------------------------------------------------------*/
function ebook_marketplace_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ebook_marketplace_load_dashicons');

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
function ebook_marketplace_remove_storefront_credit() {
    remove_action( 'storefront_footer', 'storefront_credit' );
}
add_action('wp_head', 'ebook_marketplace_remove_storefront_credit', 5);

// change author url base to contributor
function ebook_marketplace_new_author_base() {
    global $wp_rewrite;
    $myauthor_base = 'people';
    $wp_rewrite->author_base = $myauthor_base;
}
add_action('init', 'ebook_marketplace_new_author_base');

// Make book covers not clickable on individual product pages-------------------------------------------
function remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'remove_product_image_link', 10, 2 );

// Customize My Account nav-----------------------------------------------------------------------------
add_filter( 'woocommerce_account_menu_items', function($items) {
    unset($items['subscriptions']);
    unset($items['edit-address']);
    return $items;
}, 99, 1 );

// Assign roles and groups on submission of certain Forminator forms------------------------------------------------------------------------------
add_action( 'forminator_form_after_handle_submit', 'assignReaderMemberRole', 10, 2 );
add_action( 'forminator_form_after_save_entry', 'assignReaderMemberRole', 10, 2 );
add_action( 'forminator_form_after_handle_submit', 'assignCreatorMemberRole', 10, 2 );
add_action( 'forminator_form_after_save_entry', 'assignCreatorMemberRole', 10, 2 );

function assignReaderMemberRole($form_id, $response) {
    if( $response['success']  && $form_id ==2372 /* Reader-Member Signup */){
        $user = wp_get_current_user();
        $userId = $user->ID;
        $user->add_role( 'reader-member' );
    }
}

function assignCreatorMemberRole($form_id, $response) {
    if( $response['success']  && $form_id ==4212 /* Creator-Member Signup */){
        global $wpdb;
        $usermeta_table = $wpdb->prefix . "usermeta";
        $user = wp_get_current_user();
        $userId = $user->ID;
        $user->add_role( 'creator-member' );
        $user->add_role( 'dc_vendor' );
        //assign default 90% commission
        $deleteQuery = 'delete from %i where meta_key = "_vendor_commission" and user_id = %d;';
        $wpdb->query($wpdb->prepare($deleteQuery, $usermeta_table, $userId));
        $insertQuery = 'insert into %i (user_id, meta_key, meta_value) values (%d, "_vendor_commission", "90");';
        $wpdb->query($wpdb->prepare($insertQuery, $usermeta_table, $userId));
    }
} 

function tomcAddUserToGroup( $group_id, $user_id ) { 
    if ( ! function_exists( 'groups_join_group' ) ) {
        return ;
    } 
    groups_join_group( $group_id, $user_id );
}

//restrict ISBN Registration purchases to logged-in users, prevent ISBN Registration purchase when less than 1 ISBN numbers in database, and prevent ISBN Registration purchase for people with >5 unsubmitted ISBNs--------------------------------
add_filter('woocommerce_is_purchasable', 'tomc_woocommerce_is_purchasable', 10, 2);

function tomc_woocommerce_is_purchasable($is_purchasable, $product) {
    $hide_purchase = false;
    if ($product->id == 4334){ //4334 prod, 229 local
        if (!is_user_logged_in()){
            $hide_purchase = true;
        } else {
            global $wpdb;
            $user = wp_get_current_user();
            $userId = $user->ID;
            $numbers_table = $wpdb->prefix . 'tomc_isbn_numbers';
            $records_table = $wpdb->prefix . 'tomc_isbn_records';
            $books_table = $wpdb->prefix . 'tomc_books';
            $query = 'select isbn from %i where assignedto is null';
            $results = $wpdb->get_results($wpdb->prepare($query, $numbers_table), ARRAY_A);
            if (count($results) < 1){
                $hide_purchase = true;
                add_action( 'woocommerce_single_product_summary', 'tomc_unavailable_service', 40 );
            } else {
                $query = 'select isbn from %i numbers
                join %i records on numbers.id = records.isbnid
                where numbers.assignedto = %d
                and records.submitteddate is null';
                $results = $wpdb->get_results($wpdb->prepare($query, $numbers_table, $records_table, $userId), ARRAY_A);
                if (count($results) >= 5){
                    $hide_purchase = true;
                    add_action( 'woocommerce_single_product_summary', 'tomc_ISBN_limit', 40 );
                } else {
                    $quwey = 'select *
                    from %i
                    where is_live = 1
                    and createdby = %d';
                    $results = $wpdb->get_results($wpdb->prepare($query, $books_table, $userId), ARRAY_A);
                    if ($results){
                        if (count($results) < 1 || !(in_array( 'creator-member', (array) $user->roles ))){
                            $hide_purchase = true;
                            add_action( 'woocommerce_single_product_summary', 'tomc_ISBN_no_products', 40 );
                        }
                    } else if (!(in_array( 'creator-member', (array) $user->roles ))){
                        $hide_purchase = true;
                        add_action( 'woocommerce_single_product_summary', 'tomc_ISBN_no_products', 40 );
                    }
                }
            }
        }
    }
    return ($hide_purchase ? false : $is_purchasable);
}

function tomc_unavailable_service(){
    echo '<p>This servace is currently unavailable.</p><p>Check back soon!</p>';
}

function tomc_ISBN_limit(){
    echo '<p>This account has 5 ISBN registrations that have not been submitted. Please complete registration for prior purchases in order to purchase another. Thank you.</p>';
}

function tomc_ISBN_no_products(){
    echo '<p>This service is only available to creator-members and authors with at least one book available on the TOMC platform.</p>';
}


// maintenance mode-----------------------------------------------------------------------
function tomc_maintenance_mode() {
    if (!is_user_logged_in()) {    
        wp_die("<h1 style='color: #0c6980; text-align: center'>Coming Soon!</h1><p style='text-align: center'>The Trunk of My Car Cooperative Marketplace is launching early 2025. Our current member-owners are uploading works and conducting final tests before making the platform widely available in the coming days.</p>");    
    }    
}
    
// add_action('get_header', 'tomc_maintenance_mode');

add_filter( 'password_hint', function( $hint )
{
  return __( "Don't forget to lock your trunk! A strong password should be at least twelve characters long and include uppercase and lowercase letters, numbers, and symbols like ! ? $ % ^ & ." );
} );


// restrict wp-admin access to admin only---------------------------------------------------------
////----don't do this because it makes it so vendors can't upload products, need MVX pro first---  
// function tomc_restrict_admin(){
//     //if not administrator, kill WordPress execution and provide a message
//     if ( ! current_user_can( 'manage_options' ) ) {
//         wp_die( __('You are not allowed to access this part of the site') );
//     }
// }
// add_action( 'admin_init', 'tomc_restrict_admin', 1 );

// Disable activation email from BuddyPress
function tomc_disable_activation_email() {
    remove_action( 'bp_core_signup_send_validation_email', 'bp_core_signup_send_validation_email' );
    error_log( "Activation email disabled." );
}
add_action( 'bp_init', 'tomc_disable_activation_email' );

// Automatically activate user signups
function tomc_auto_activate_user( $user_login ) {
    global $wpdb;

    // Get the signup entry using BP_Signup class
    $signup_data = BP_Signup::get(
        array(
            'user_login' => $user_login,
            'active'     => 0, // Only look for inactive users
        )
    );

    // Check if the signup exists
    if ( ! empty( $signup_data['signups'] ) ) {
        $signup = $signup_data['signups'][0]; // Assuming the first result is correct

        // Activate the signup using BuddyPress' activation method
        $activation_result = BP_Signup::activate( array( $signup->signup_id ) );

        if ( isset( $activation_result['activated'] ) && ! empty( $activation_result['activated'] ) ) {
            $activated_user = $activation_result['activated'][0];

            // Log the successful activation
            error_log( "User successfully activated: " . $activated_user->ID );
        } else {
            error_log( "Error activating user: " . $signup->user_login );
        }
    } else {
        error_log( "User signup not found or already activated: " . $user_login );
    }
}

// Hook into the registration process
add_action( 'bp_core_signup_user', function( $user_id, $user_login, $user_password, $user_email, $usermeta ) {
    tomc_auto_activate_user( $user_login );
}, 10, 5 );

//file types------------------------------------------------------------------------------
function tomc_mime_types($mime_types){
    $mime_types['epub'] = 'application/epub+zip'; 
    unset($mime_types['png']); 
    return $mime_types;
}

add_filter('upload_mimes', 'tomc_mime_types', 1, 1);

//disable brands-------------------------------------------------------------------------------
add_action( 'init', function() {
    update_option( 'wc_feature_woocommerce_brands_enabled', 'no' );
} );

//add county checkout field---------------------------------------------------------------------
add_filter( 'woocommerce_checkout_fields' , 'tomc_checkout_fields' );

function tomc_checkout_fields( $fields ) {
     $fields['billing']['billing_county'] = array(
        'label'       => __( 'County', 'woocommerce' ),
        'required'    => true,
        'class'       => array( 'hidden' ),
        'clear'       => true,
        'type' => 'select',
        'options'     => array(
        'default' => __('N/A', 'woocommerce' )
        )
     );

     return $fields;
}

//send email to Zia when ISBN Registration product purchased----------------------------------
add_filter( 'woocommerce_email_recipient_new_order', 'conditional_recipient_new_email_notification', 15, 2 );
function conditional_recipient_new_email_notification( $recipient, $order ) {
    if( is_admin() ) return $recipient; //Mandatory to avoid backend errors
    $targeted_id = 4334; // ISBN Registration product id: 113 in dev 4334 production
    $addr_email  = 'zia@trunkofmycar.org';

    // Loop through orders items
    foreach ($order->get_items() as $item_id => $item ) {
        if( $item->get_product_id() == $targeted_id ){
            $recipient .= ', ' . $addr_email; 
            break; // Found and added - We stop the loop
        }
    }
    return $recipient;
}
//restrict backend access-------------------------------------------------------------------------------------------
function block_wp_admin() {
    if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_safe_redirect( home_url() );
        exit;
    }
}
add_action( 'admin_init', 'block_wp_admin' );
//restrict sub-order email-------------------------------------------------------------------------------------------------------
add_filter( 'woocommerce_email_recipient_customer_on_hold_order', 'customer_email_recipient_change', 10, 2 );
add_filter( 'woocommerce_email_recipient_customer_processing_order', 'customer_email_recipient_change', 10, 2 );

function customer_email_recipient_change( $recipient_email, $order ) {
    $parent_order_id = $order->get_parent_id();
    
    if ( $parent_order_id == 0 ) {
        return $recipient_email;
    } else {
        return ''; // Return an empty string to stop the email from being sent
    }
}
//featured image screenshot-------------------------------------------------------------------------------------------
function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/screenshot.png';
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);
//add support for title tag----------------------------------------------------------------------------
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}
//meta tags-----------------------------------------------------------------------------------------------
function tomc_custom_meta_tags() {
    global $post;
    if ($post->ID == 20){
        echo '<meta name="description" content="We are making self-publishing better for authors, readers, and the planet through a platform cooperative. Join us!">';
        echo '<meta name="keywords" content="self-publishing co-op, self-publishing platform co-op, self-publishing cooperative, cooperative self-publishing">';
    } else if ($post->ID == 20){
        echo '<meta name="description" content="Shop self-published books on a cooperatively-owned platform, where more of the money you spend goes to authors.">';
        echo '<meta name="keywords" content="shop self-published books, where to buy self-published books, where to buy indie books">';
    } else {
        echo '<meta name="description" content="Join the self publishing (r)evolution and help redistribute resources from those who take to those who create.">';
        echo '<meta name="keywords" content="self-publishing revolution, self-publishing evolution">';
    }
}
add_action('wp_head', 'tomc_custom_meta_tags');
//don't require shipping for digital products----------------------------------------------------------------------
// add_filter( 'woocommerce_product_needs_shipping', 'filter_product_needs_shipping_callback' );
//note: instead, filter function to apply same logic that excludes virtual products from requiring shipping to digital products as well
function filter_product_needs_shipping_callback( $needs_shipping ){
    
    foreach ( WC()->cart->get_cart() as $item ) {
        $product = $item['data'];
        if ( str_contains(wc_get_product_category_list($product->get_id()), 'Hardcover Books') ) {
            $needs_shipping = true;
        } else if ( str_contains(wc_get_product_category_list($product->get_id()), 'Paperback Books') ) {
            $needs_shipping = true;
        } else if ( str_contains(wc_get_product_category_list($product->get_id()), 'Physical Zines') ) {
            $needs_shipping = true;
        } else {
            $needs_shipping = false;
        }
    }
    return $needs_shipping;
}