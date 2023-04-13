<?php
// featured romance e-books
$romanceIds = array(560, 392, 595, 380, 377, 177);
//featured historical fiction e-books
$historicalIds = array(500, 595, 448, 439, 398, 395, 436);

    get_header();

    ?><h3 class="generic-content">Hello!</h3>
    <p class="generic-content">Thank you for browsing our cooperatively run e-book marketplace! When you shop here, you're empowering authors and workers. <a href="<?php echo esc_url(site_url('/about'));?>"><span class="nowrap">Learn how.</span></a></p>

        <?php $newestReleases = new WP_Query(array(
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
                echo '<a class="gray-link" href="/product-category/fiction-ebooks/historical-fiction"><h3 class="left-text sans-text">Historical</h3></a>';
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


            
get_footer();