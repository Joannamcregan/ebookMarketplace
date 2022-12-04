<?php 
    get_header();
    ?><div class="banner">
        <h2 class="centered-text">Reading lists curated by our community of book lovers</h2>
    </div>
    <div class="centered-section">
        <a class="gray-link" href="<?php echo site_url('/add-new-bookshelf') ?>">Create a new bookshelf</a></li>
    </div>
    <div class="full-screen">
        <?php while(have_posts()){
            the_post(); ?>
            <div class="page-accent-alt">
                <div class="center-left-text">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php echo ' by ';
                    ?><a class="gray-link" href="<?php echo get_author_posts_url(get_the_author_id()); ?>"> <?php the_author(); ?></a>
                </div>
            </div>
        <?php }
        echo paginate_links();
        wp_reset_postdata();
    ?></div>
    <?php get_footer();