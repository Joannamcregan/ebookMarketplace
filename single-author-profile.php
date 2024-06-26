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

        
}

    get_footer();?>