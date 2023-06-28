<?php 
    get_header();
    ?><div class="half-screen">
        <p class="extra-large-text center-left-text"><strong>404</strong></p>
        <h1 class="center-left-text">Sorry, we can't seem to find the page you were looking for.</h1>
    </div>
    <?php // featured e-books
    $featuredBookIds = array(889, 859, 856, 460, 853, 862, 977);
    $featuredBooks = new WP_Query( array( 'post_type' => 'product', 'post__in' => $featuredBookIds ) );
    ?><div class="page-accent-front">
        <p class="center-left-text">Sometimes getting lost is just the beginning of a great adventure! Here are some books that prove it.</p>
        <div class="book-sections-container">           -->
            <?php while ($featuredBooks -> have_posts()){
            $featuredBooks->the_post();
            ?><div class="book-section--small">
                <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
            </div>                
        <?php }
        ?></div>
    </div>
<?php get_footer();