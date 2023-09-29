<?php

//featured shorts
$shortId = 481;
//featured curation ids
$curationId0 = 281;
$curationId1 = 282;
// featured romance e-books
$romanceIds = array(274, 380, 268, 265, 377, 230, 262, 259);
//featured historical fiction e-books
$historicalIds = array(383, 115, 256, 118, 242, 227, 317, 394);
//featured sci fi e-books
$scifiIds = array(271, 215, 369, 189, 218, 186, 212, 373);
//featured mystery e-books
$mysteryIds = array(195, 203, 200, 407, 387, 454, 457, 460);
//featured poetry
$poetryIds = array(140, 253, 170, 161, 164, 167, 173, 110);
//featured autobiographies
$autobiographyIds = array(297, 291, 122, 192, 152, 301, 294, 137);


get_header();

?><div class="generic-content"><h4>Thank you for browsing our cooperatively run ebook marketplace! When you shop here, you're empowering authors. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div>

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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
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
                    <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[0]), '_wp_attachment_image_alt', TRUE) ?>" />
                </div>   
                <?php if (count($books) > 1) { 
                    ?><div class="bookshelf-tablet-1">
                        <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[1]), '_wp_attachment_image_alt', TRUE) ?>" />
                    </div>
                    <?php if (count($books) >2) {
                        ?><div class="bookshelf-tablet-2">
                            <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[2]), '_wp_attachment_image_alt', TRUE) ?>" />
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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
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
                    <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[0]), '_wp_attachment_image_alt', TRUE) ?>" />
                </div>   
                <?php if (count($books) > 1) { 
                    ?><div class="bookshelf-tablet-1">
                        <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[1]), '_wp_attachment_image_alt', TRUE) ?>" />
                    </div>
                    <?php if (count($books) >2) {
                        ?><div class="bookshelf-tablet-2">
                            <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>" alt="<?php get_post_meta(get_post_thumbnail_id($books[2]), '_wp_attachment_image_alt', TRUE) ?>" />
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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
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
                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
                </div>                
            <?php }
            ?><a class="gray-link" href="/product-category/poetry"><div class="gray-box"><p>see all</p></div></a>
        </div>
    </div>
<?php }

wp_reset_postdata();

$featuredShort = new WP_Query( array( 'post_type' => 'short', 'p' => $shortId ) );

if ($featuredShort->have_posts()){
    ?><div class="short-piece">
        <h3 class="centered-text sans-text">Featured Free Short</h3>
    <?php while ($featuredShort->have_posts()){
        $featuredShort->the_post();
        ?><div class="shorts-excerpt-wrapper">
            <h3 class="centered-text"><a class="gray-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <em><p class="centered-text"><span>a short </span>
            <?php $shortCategory = get_the_category();
            if ($shortCategory){
                foreach($shortCategory as $cat){
                    if ($cat != $shortCategory[count($shortCategory)-1]){
                        ?><span><?php echo $cat->cat_name ?></span><span> / </span>
                    <?php } else {
                        ?><span><?php echo $cat->cat_name ?> </span>
                    <?php }
                }
            }
            ?><span>piece by </span>
            <?php $shortAuthor = get_field('short_author');
            if ($shortAuthor) {
                foreach($shortAuthor as $author) {
                    if ($author != $shortAuthor[count($shortAuthor)-1]){
                        ?><span><?php echo get_the_title($author) ?></span><span>, </span>
                            <?php } else {
                                ?><span><?php echo get_the_title($author) ?></span>
                            <?php }
                        }
                } else {
                    ?><span>unknown or anonymous author(s) </span>
                <?php }
            ?></p></em>
            <div class="shorts-excerpt">
                <?php if (str_word_count(get_the_excerpt()) > 200){
                    echo wp_trim_words(get_the_excerpt(), 200, ' [...]');
                } else {
                    the_excerpt();
                }                
            ?></div>
            <p class="right-text"><a href="<?php the_permalink(); ?>">Read more</a></p>
        </div>
    <?php }
    ?></div>
    <p class="centered-text"><a href="<?php echo esc_url(site_url('/free-shorts'));?>" class="gray-link">See more free shorts</a></p>
<?php }

wp_reset_postdata();

get_footer();