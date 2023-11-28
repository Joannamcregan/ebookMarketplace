<?php

    get_header(); 

    ?><div class="two-thirds-screen">
        <?php while(have_posts()){
            the_post(); ?>
                <div class="page-accent-alt">                    
                    <div class="archive-item">
                        <h2><a class="gray-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <p><a href="<?php the_permalink(); ?>">See more &raquo;</a></p>
                    </div>
                </div>
            <?php }
        ?>
    </div>

<?php get_footer(); ?>