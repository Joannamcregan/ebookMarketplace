<?php
//single book features
$fictionFeatureId0 = 488;

//featured curation ids
$curationId0 = 459;
$curationId1 = 551;
$curationId2 = 456;
$curationId3 = 455;
// featured romance e-books
$romanceIds = array(560, 392, 595, 380, 377, 177);
//featured historical fiction e-books
$historicalIds = array(500, 595, 448, 439, 398, 395, 436);

get_header();

?><div class="generic-content"><h4>Thank you for browsing our cooperatively run e-book marketplace! When you shop here, you're empowering authors and workers. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div>

<?php 
$curation1 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId1 ) );
$curation2 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId2 ) );
$curation3 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId3 ) );

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

$fictionFeature0 = new WP_Query( array( 'post_type' => 'product', 'post' => $fictionFeatureId0 ) );

if ($fictionFeature0->have_posts()){
    ?><div class="featured-book-section"> 
        <?php $fictionFeature0->the_post();
        ?><h3 class="centered-text sans-text">Featured Fiction</h3>
        <a href="<?php the_permalink($fictionFeatureId0); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a>
        <div class="featured-book-text">
        <a href="<?php the_permalink($fictionFeatureId0); ?>" class="gray-link"><h4><?php echo get_the_title(); ?></h4></a>
            <?php $authorName = '<p class="featured-book-author-name">';
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
                $authorName = 'by Unknown or Anonymous';
            }
            $authorName .= '</p>';
            ?><p><?php echo $authorName; ?></p>
            <p><?php if (str_word_count( strip_tags( strip_shortcodes(get_the_excerpt()))) > 60){
        echo wp_trim_words(get_the_excerpt(), 60, ' ...<a href="<?php the_permalink($fictionFeatureId0); ?>" class="gray-link">see more</a>');   
    } else {
        the_excerpt();
    } ?></p>
        </div>
    </div>
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

$curation0 = new WP_Query( array( 'post_type' => 'product', 'post' => $curationId0 ) );

while(have_posts()){
    the_post(); ?>
    <div>
        <a class="gray-link" href="<?php echo get_the_permalink($curationId0); ?>"><h3 class="centered-text sans-text"><?php echo get_the_title($curationId0); ?></h3></a>
        <?php $books = get_field('curated_books', $curationId0);
        if ($books) {
            ?><a href="<?php the_permalink(); ?>"><div class="book-pile">
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
            ?></div></a>                     
        <?php }  
    ?></div>
<?php }

wp_reset_postdata();


            
get_footer();