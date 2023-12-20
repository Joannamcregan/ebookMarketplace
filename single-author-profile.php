<?php get_header();

while(have_posts()){
    the_post();
    ?>
    <div class="full-screen">
        <br><br>
        <h1 class="centered-text"> <?php the_title(); ?> </h1>
        <div class="image-text--container">
            <img class="image-text--image" src="<?php the_post_thumbnail_url('authorImage'); ?>"/>
            <div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <br>
    <br>

    <?php $relatedBooks = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'product',
            'category__not_in' => array(109/*gift card*/, 103/*merch*/),
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
            echo '<div class="page-accent">';
                echo '<h3 class="left-text"> Books by ' . get_the_title() . "</h3>";
                ?> <div class="book-sections-container"> 
                <?php while ($relatedBooks -> have_posts()){
                    $relatedBooks->the_post();
                    ?><div class="book-section--small">
                        <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url('bookCover'); ?>"/></a> 
                    </div>                
                <?php }
                ?></div>
            </div>
        <?php }

        wp_reset_postdata();

        $relatedItems = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'product',
            'category__in' => array(109/*gift card*/, 103/*merch*/),
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

        if ($relatedItems->have_posts()){
            echo '<div class="page-accent">';
                echo '<h3 class="left-text">' . get_the_title() . ' Merch</h3>';
                ?> <div class="book-sections-container"> 
                <?php while ($relatedItems -> have_posts()){
                    $relatedItems->the_post();
                    ?><div class="book-section--small">
                        <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url('bookCover'); ?>"/></a> 
                    </div>                
                <?php }
                ?></div>
            </div>
        <?php }

        wp_reset_postdata();

        $relatedShorts = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'short',
            'orderby' => 'title',
            'meta_query' => array(
            array(
                'key' => 'short_author',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
            )
            ),
            'order' => 'ASC'
        ));

        if ($relatedShorts->have_posts()){
            echo '<div class="page-accent">';
                echo '<h3 class="left-text"> Free Short Reads by ' . get_the_title() . '</h3>';
                ?> <div> 
                <?php while ($relatedShorts -> have_posts()){
                    $relatedShorts->the_post();
                    ?><p class="short-title">
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a> 
                    </p>                
                <?php }
                ?></div>
            </div>
        <?php }
}

    get_footer();?>