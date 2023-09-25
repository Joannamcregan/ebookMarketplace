<?php 
    get_header();

    global $post;
    $authorId=$post->post_author;

    ?><div class="full-screen">
        <h2 class="centered-text tenth-screen"><?php the_title(); ?></h2>
        <div class="page-accent">       
            <div class="center-right-text">     
                <span>curated by </span>
                <a href="<?php echo get_author_posts_url($authorId); ?>"><?php echo get_the_author_meta('display_name', $authorId); ?></a>
            </div>
            <?php $curatedBooks = get_field('curated_books');
            if ($curatedBooks) {
                ?><div class="book-sections-container">
                <?php foreach($curatedBooks as $curatedBook) {
                    ?><div class="book-section--small">
                        <a href="<?php echo get_the_permalink($curatedBook) ?>"><img class="book-cover--small" src="<?php echo get_the_post_thumbnail_url($curatedBook); ?>"/></a>
                    </div>
                <?php }
                ?></div>
            <?php }
            wp_reset_postdata();
        ?></div>
        <?php if ( !empty( get_the_content() ) ) {
            ?><div class="generic-content">
                <!-- <h4>About this bookshelf</h4>             -->
                <br>
                <?php the_content(); ?>
            </div>
        <?php }        
    ?></div>
    <?php get_footer();