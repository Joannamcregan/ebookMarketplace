<?php

//featured curation ids
$curationId0 = 967;
$curationId1 = 961;
$curationId2 = 966;
// featured romance e-books
$romanceIds = array(560, 392, 595, 380, 377, 177);
//featured historical fiction e-books
$historicalIds = array(500, 595, 448, 439, 398, 395, 436);
//featured sci fi e-books
$scifiIds = array(301, 892, 862, 889, 444, 859);
//featured mystery e-books
$mysteryIds = array(881, 903, 875, 900, 872, 895);
//featured autobiographies
$nonfictionIds = array(946, 930, 884, 949, 921, 926);

get_header();

?><div class="generic-content"><h4>Thank you for browsing our cooperatively run e-book marketplace! When you shop here, you're empowering authors and workers. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div>

<?php 
// $curation1 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId1 ) );
// $curation2 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId2 ) );
// $curation3 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId3 ) );

wp_reset_postdata();

$newestReleases = new WP_Query(array(
        'posts_per_page' => 30,
        'post_type' => 'product',
        'orderby' => 'date',
        'order' => 'DESC'
    ));

if ($newestReleases->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<h3 class="left-text sans-text"> Newest Additions</h3>';
        ?> <div class="book-sections-container"> 
        <?php while ($newestReleases -> have_posts()){
            $newestReleases->the_post();
            ?><div class="book-section--small">
                <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
            </div>                
        <?php }
        ?></div>
    </div>
<?php }

wp_reset_postdata();

$curation0 = new WP_Query( array( 'post_type' => 'curations', 'post' => $curationId0 ) );

while(have_posts()){
    the_post(); ?>
    <div>
        <a class="gray-link" href="<?php echo get_the_permalink($curationId0); ?>"><h3 class="centered-text sans-text"><?php echo get_the_title($curationId0); ?></h3></a>
        <?php $books = get_field('curated_books', $curationId0);
        if ($books) {
            ?><div class="book-pile">
                <div class="bookshelf-tablet-0">
                    <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>"/>
                </div>   
                <?php if (count($books) > 1) { 
                    ?><div class="bookshelf-tablet-1">
                        <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>"/>
                    </div>
                    <?php if (count($books) >2) {
                        ?><div class="bookshelf-tablet-2">
                            <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>"/>
                        </div>
                <?php }
                }
            ?></div>        
        <?php }  
    ?></div>
<?php }

wp_reset_postdata();

$romances = new WP_Query( array( 'post_type' => 'product', 'post__in' => $romanceIds ) );

if ($romances->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/fiction-ebooks/romance/"><h3 class="left-text sans-text">Romance</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($romances -> have_posts()){
                $romances->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/fiction-ebooks/romance/"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$historicals = new WP_Query( array( 'post_type' => 'product', 'post__in' => $historicalIds ) );

if ($historicals->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/fiction-ebooks/historical-fiction"><h3 class="left-text sans-text">Historical Fiction</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($historicals -> have_posts()){
                $historicals->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/fiction-ebooks/historical-fiction"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$curation1 = new WP_Query( array( 'post_type' => 'curations', 'post' => $curationId1 ) );

while(have_posts()){
    the_post(); ?>
    <div>
        <a class="gray-link" href="<?php echo get_the_permalink($curationId1); ?>"><h3 class="centered-text sans-text"><?php echo get_the_title($curationId1); ?></h3></a>
        <?php $books = get_field('curated_books', $curationId1);
        if ($books) {
            ?><div class="book-pile">
                <div class="bookshelf-tablet-0">
                    <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>"/>
                </div>   
                <?php if (count($books) > 1) { 
                    ?><div class="bookshelf-tablet-1">
                        <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>"/>
                    </div>
                    <?php if (count($books) >2) {
                        ?><div class="bookshelf-tablet-2">
                            <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>"/>
                        </div>
                <?php }
                }
            ?></div>                 
        <?php }  
    ?></div>
<?php }

wp_reset_postdata();

$mysteries = new WP_Query( array( 'post_type' => 'product', 'post__in' => $mysteryIds ) );

if ($mysteries->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/fiction-ebooks/mystery-fiction"><h3 class="left-text sans-text">Mystery</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($mysteries -> have_posts()){
                $mysteries->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/fiction-ebooks/mystery-fiction"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$scifi = new WP_Query( array( 'post_type' => 'product', 'post__in' => $scifiIds ) );

if ($scifi->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/fiction-ebooks/science-fiction"><h3 class="left-text sans-text">Science Fiction</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($scifi -> have_posts()){
                $scifi->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/fiction-ebooks/science-fiction"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$curation2 = new WP_Query( array( 'post_type' => 'curations', 'post' => $curationId2 ) );

while(have_posts()){
    the_post(); ?>
    <div>
        <a class="gray-link" href="<?php echo get_the_permalink($curationId2); ?>"><h3 class="centered-text sans-text"><?php echo get_the_title($curationId2); ?></h3></a>
        <?php $books = get_field('curated_books', $curationId2);
        if ($books) {
            ?><div class="book-pile">
                <div class="bookshelf-tablet-0">
                    <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>"/>
                </div>   
                <?php if (count($books) > 1) { 
                    ?><div class="bookshelf-tablet-1">
                        <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>"/>
                    </div>
                    <?php if (count($books) >2) {
                        ?><div class="bookshelf-tablet-2">
                            <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>"/>
                        </div>
                <?php }
                }
            ?></div>            
        <?php }  
    ?></div>
<?php }

wp_reset_postdata();

$nonfiction = new WP_Query( array( 'post_type' => 'product', 'post__in' => $nonfictionIds ) );

if ($nonfiction->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/nonfiction"><h3 class="left-text sans-text">Nonfiction</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($nonfiction -> have_posts()){
                $nonfiction->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/nonfiction"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

?><div class="generic-content"><p>Looking for something else? <a href="<?php echo esc_url(site_url('/genres'));?>"><span class="nowrap">Find your favorite genre</span></a> or <a href="<?php echo esc_url(site_url('/bookshelves'));?>"><span class="nowrap">check out our curated bookshelves!</span></a> If you want to read the work of people from certain marginalized backgrounds, we can help you find <a href="<?php echo esc_url(site_url('/diverse-books'));?>"><span class="nowrap">books with diverse authors</span></a>. And if you're looking for a particular book or author, you can perform a <a href="<?php echo esc_url(site_url('/search'));?>" class="js-search-trigger "><span>search</span></a>.</p></div>
            
<?php get_footer();