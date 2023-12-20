<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">New Books</h1></div>
    <!-- <div class="generic-content"><h4>Thank you for browsing our cooperatively run ebook marketplace! When you shop here, you're empowering authors. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></h4></div> -->

    <?php 

    wp_reset_postdata();

    $romances = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'romance') ) ) );

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

    $historicals = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'historical-fiction') ) ) );

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

    $mysteries = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'mystery') ) ) );

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

    $scifi = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'science-fiction') ) ) );

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

    $poetry = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'poetry') ) ) );

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

    $autobiographies = new WP_Query( array( 'post_type' => 'product', 'orderby' => 'date', 'posts_per_page' => 8, 'tax_query' => array( array('taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => 'autobiography') ) ) );

    if ($autobiographies->have_posts()){
        echo '<div class="page-accent-front">';
            echo '<a class="gray-link" href="/product-category/nonfiction/autobiography"><h2 class="left-text sans-text">Autobiographies</h2></a>';
            ?><div class="book-sections-container"> 
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