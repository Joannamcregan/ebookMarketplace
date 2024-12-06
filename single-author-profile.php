<?php get_header();

$pennameid = get_the_id();
$penname = get_the_title();

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
        <div class="fit-width-text">
            <?php echo strlen(get_the_content()) < 1 ? "This author hasn't shared a bio yet." : the_content(); ?>
        </div>
    </div>        
<?php }

$query = 'select distinct b.id, b.title, b.product_image_id, b.book_description, b.createdate, g.id as product_url
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        join %i e on b.id = e.bookid
        join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.islive = 1
        and f.id = %d
        and d.type_name = %s
        order by b.createdate desc
        limit 200';
$booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $pennameid, 'e-books'), ARRAY_A);
for($index = 0; $index < count($booksResults); $index++){
    $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
}
if (count($booksResults) > 0){
    ?><h2 class="centered-text">Ebooks by <?php echo $penname; ?></h2>
    <div class="tomc-book-org--columns-container">
        <?php for ($i = 0; $i < count($booksResults); $i++){
            ?><div id="<?php echo 'tomc-penname-books-' . $pennameid . '-' . $booksResults[$i]['id']; ?>" class="tomc-bookorg--all-columns">
                <h3 class="centered-text small-heading"><a href="<?php echo $booksResults[$i]['product_url']; ?>"><?php echo $booksResults[$i]['title']; ?></a></h3>
                <img src="<?php echo $booksResults[$i]['product_image_id']; ?>" alt="<?php echo 'book cover for ' . $booksResults[$i]['title']; ?>" />
                <p class="prewrap"><?php echo $booksResults[$i]['book_description']; ?></p>
            </div>
        <?php }
    ?></div>
<?php }
$booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $pennameid, 'audiobooks'), ARRAY_A);
for($index = 0; $index < count($booksResults); $index++){
    $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
}
if (count($booksResults) > 0){
    ?><h2 class="centered-text">Audiobooks by <?php echo $penname; ?></h2>
    <div class="tomc-book-org--columns-container">
        <?php for ($i = 0; $i < count($booksResults); $i++){
            ?><div id="<?php echo 'tomc-penname-books-' . $pennameid . '-' . $booksResults[$i]['id']; ?>" class="tomc-bookorg--all-columns">
                <h3 class="centered-text small-heading"><a href="<?php echo $booksResults[$i]['product_url']; ?>"><?php echo $booksResults[$i]['title']; ?></a></h3>
                <img src="<?php echo $booksResults[$i]['product_image_id']; ?>" alt="<?php echo 'book cover for ' . $booksResults[$i]['title']; ?>" />
                <p class="prewrap"><?php echo $booksResults[$i]['book_description']; ?></p>
            </div>
        <?php }
    ?></div>
<?php }

get_footer();?>