<?php

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

?><main>
    <div class="banner"><h1 class="centered-text">New Books</h1></div>
    <!-- <div class="generic-content"><h4>Thank you for browsing our cooperatively run ebook marketplace! When you shop here, you're empowering authors. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div> -->

    <?php 

    wp_reset_postdata();

    $romances = new WP_Query( array( 'post_type' => 'product', 'post__in' => $romanceIds ) );

    if ($romances->have_posts()){
        echo '<div class="page-accent-front">';
            echo '<a class="gray-link" href="/product-category/fiction-ebooks/romance/"><h2 class="left-text sans-text">Romance</h2></a>';
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
            echo '<a class="gray-link" href="/product-category/fiction-ebooks/historical-fiction"><h2 class="left-text sans-text">Historical Fiction</h2></a>';
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

    $mysteries = new WP_Query( array( 'post_type' => 'product', 'post__in' => $mysteryIds ) );

    if ($mysteries->have_posts()){
        echo '<div class="page-accent-front">';
            echo '<a class="gray-link" href="/product-category/fiction-ebooks/mystery"><h2 class="left-text sans-text">Mystery</h2></a>';
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
            echo '<a class="gray-link" href="/product-category/fiction-ebooks/science-fiction"><h2 class="left-text sans-text">Science Fiction</h2></a>';
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

    $poetry = new WP_Query( array( 'post_type' => 'product', 'post__in' => $poetryIds ) );

    if ($poetry->have_posts()){
        echo '<div class="page-accent-front">';
            echo '<a class="gray-link" href="/product-category/poetry"><h2 class="left-text sans-text">Poetry</h2></a>';
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
            echo '<a class="gray-link" href="/product-category/nonfiction/autobiography"><h2 class="left-text sans-text">Autobiographies</h2></a>';
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
?></main>

<?php get_footer(); ?>