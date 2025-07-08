<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">Blog Posts</h1></div>
    <br>
    <br>
    <div class="third-screen generic-content">
    <?php $args = array(
        'post_type'=> 'post',
        'orderby'    => 'ID',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => -1 // this will retrive all the post that is published 
        );
        $result = new WP_Query( $args );
        if ( $result-> have_posts() ) : ?>
        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
        <div class="genre-category subcategory padding-x-20">
            <p><a href='<?php echo get_the_permalink(); ?>'><?php the_title(); ?></a></p>     
            <p><?php echo 'posted by ' . get_the_author() . ' on ' . get_the_date(); ?></p>
            <div class="orange-yellow-line-break"></div>
        </div>
        <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </div>

    <?php echo paginate_links();
?></main>

<?php get_footer(); ?>