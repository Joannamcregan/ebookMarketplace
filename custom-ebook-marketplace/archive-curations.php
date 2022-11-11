<?php 
    get_header();
    ?><div class="full-screen">
        <?php while(have_posts()){
            the_post(); ?>
            <div class="page-accent">
                <div class="center-left-text">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php echo ' by ';
                    ?><a href="<?php echo get_author_posts_url(get_the_author_id()); ?>"> <?php the_author(); ?></a>
                </div>
            </div>
        <?php }
        echo paginate_links();
        wp_reset_postdata();
    ?></div>
    <?php get_footer();