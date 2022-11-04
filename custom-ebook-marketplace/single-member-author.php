<?php

    get_header();

    while(have_posts()){
        the_post();
        ?>
        <h2 class="centered-text"> <?php the_title(); ?> </h2>
        <div class="image-text--container">
            <img class="image-text--image" src="<?php the_post_thumbnail_url(); ?>"/>
            <div>
                <?php the_content(); ?>
            </div>
        </div>

        <?php $relatedBooks = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'product',
                'orderby' => 'title',
                'meta_query' => array(
                array(
                    'key' => 'book_author',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                )
                ),
                'order' => 'ASC'
            ));

            if ($relatedBooks->have_posts()){
                echo '<div class="page-section">';
                    echo '<h3 class="left-text">' . get_the_title() . "'s Work</h3>";
                    ?> <div class="book-sections-container"> 
                    <?php while ($relatedBooks -> have_posts()){
                        $relatedBooks->the_post();
                        ?><div class="book-section--small">
                            <img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/> 
                            <a href="<?php the_permalink(); ?>">                        
                                <p class="book-title--small"><?php the_title(); ?></p>
                            </a>                    
                        </div>                
                    <?php }
                    ?></div>
                </div>
            <?php }

            wp_reset_postdata();
    }

    get_footer();

?>