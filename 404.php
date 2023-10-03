<?php get_header();
?><main>

    <div class="half-screen">
        <p class="extra-large-text center-left-text"><strong>404</strong></p>
        <h1 class="center-left-text">Sorry, we can't seem to find the page you were looking for.</h1>
    </div>
    <?php // featured e-books
    $featuredBookIds = array(233, 221, 218, 212, 373, 215, 189, 107);
    $featuredBooks = new WP_Query( array( 'post_type' => 'product', 'post__in' => $featuredBookIds ) );
    ?><div class="page-accent-front">
        <p class="center-left-text">Sometimes getting lost is just the beginning of a memorable adventure! Here are some books that prove it.</p>
        <div class="book-sections-container">           
            <?php while ($featuredBooks -> have_posts()){
            $featuredBooks->the_post();
            ?><div class="book-section--small">
                <a href="<?php the_permalink(); ?>" aria-label="<?php echo get_the_title(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>"/></a> 
            </div>                
        <?php }
        ?></div>
    </div>
</main>

<?php get_footer(); ?>