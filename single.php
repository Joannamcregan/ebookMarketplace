<?php

    get_header();

    ?><div class="two-thirds-screen">
    <?php while(have_posts()){
        the_post(); 
        ?><div class="right-text by-line">
            <span>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></span>
        </div>
        <div class="blog-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    <?php }
    ?></div>

    <?php get_footer();

?>