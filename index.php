<?php

//featured curation ids
$curationId0 = 281;
$curationId1 = 282;
// featured romance e-books
$romanceIds = array(274, 268, 265, 230, 262, 259);
//featured historical fiction e-books
$historicalIds = array(236, 115, 256, 118, 242, 227);
//featured sci fi e-books
$scifiIds = array(271, 215, 189, 218, 186, 212);
//featured mystery e-books
$mysteryIds = array(195, 183, 203, 180, 200, 177);
//featured poetry
$poetryIds = array(140, 253, 170, 161, 164, 167, 173, 110);
//featured autobiographies
$autobiographyIds = array(297, 291, 122, 192, 152, 301, 294, 137);


get_header();

?><div class="generic-content"><h4>Thank you for browsing our cooperatively run ebook marketplace! When you shop here, you're empowering authors and workers. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div>

<?php 

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

$curation0 = new WP_Query( array( 'post_type' => 'curations', 'post' => $curationId0 ) );

if ($curation0->have_posts()){
    ?><div>
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

$mysteries = new WP_Query( array( 'post_type' => 'product', 'post__in' => $mysteryIds ) );

if ($mysteries->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/fiction-ebooks/mystery"><h3 class="left-text sans-text">Mystery</h3></a>';
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

$curation1 = new WP_Query( array( 'post_type' => 'curations', 'post' => $curationId1 ) );

if ($curation1->have_posts()){
    ?><div>
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

$poetry = new WP_Query( array( 'post_type' => 'product', 'post__in' => $poetryIds ) );

if ($poetry->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/poetry"><h3 class="left-text sans-text">Poetry</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($poetry -> have_posts()){
                $poetry->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/poetry"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$autobiographies = new WP_Query( array( 'post_type' => 'product', 'post__in' => $autobiographyIds ) );

if ($autobiographies->have_posts()){
    echo '<div class="page-accent-front">';
        echo '<a class="gray-link" href="/product-category/nonfiction/autobiography"><h3 class="left-text sans-text">Autobiographies</h3></a>';
        ?> <div class="book-sections-container"> 
            <?php while ($autobiographies -> have_posts()){
                $autobiographies->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/poetry"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

?><div class="generic-content"><p>Looking for something else? <a href="<?php echo esc_url(site_url('/genres'));?>"><span class="nowrap">Find your favorite genre</span></a> or <a href="<?php echo esc_url(site_url('/bookshelves'));?>"><span class="nowrap">check out our curated bookshelves!</span></a> If you want to read the work of people from certain marginalized backgrounds, we can help you find <a href="<?php echo esc_url(site_url('/diverse-books'));?>"><span class="nowrap">books with diverse authors</span></a>. And if you're looking for a particular book or author, you can perform a <a href="<?php echo esc_url(site_url('/search'));?>" class="js-search-trigger "><span>search</span></a>.</p></div>
            
<?php get_footer();