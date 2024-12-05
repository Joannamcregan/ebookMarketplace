<?php get_header();

$pennameid = get_the_id();
$penname = get_the_title();
$displayedBooks = [];

global $wpdb;
$books_table = $wpdb->prefix . "tomc_books";
$book_genres_table = $wpdb->prefix .  "tomc_book_genres";
$book_products_table = $wpdb->prefix . "tomc_book_products";
$posts_table = $wpdb->prefix . "posts";
$product_types_table = $wpdb->prefix . "tomc_product_types";
$pen_names_table = $wpdb->prefix . "tomc_pen_names_books";

while(have_posts()){
    the_post();
    ?>
    <div class="third-screen">
        <h1 class="centered-text"><?php echo $penname; ?></h1>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>        
<?php }

$query = 'select distinct b.id, b.title, b.product_image_id, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        join %i e on b.id = e.bookid
        join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.islive = 1
        and f.id = %d
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $pennameid), ARRAY_A);
if (count($booksResults) > 0){
    ?><h2 class="centered-text">Books by <?php echo $penname; ?></h2>
    <div class="tomc-book-org--columns-container">
        <?php for ($i = 0; $i < count($booksResults); $i++){
            if (in_array($booksResults[$i]['title'], $displayedBooks)){
                echo '<p>already displayed</p>';
            } else {
                ?><div id="<?php echo 'tomc-penname-books-' . $pennameid . '-' . $booksResults[$i]['id']; ?>" class="tomc-bookorg--all-columns">
                    <h3 class="centered-text small-heading"><?php echo $booksResults[$i]['title']; ?></h3>
                </div>
            <?php }
        }
    ?></div>
<?php }

get_footer();?>