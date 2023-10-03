<?php get_header();

?><main>
    <div class="two-thirds-screen">
    <?php while(have_posts()){
        the_post(); 
        ?><div class="right-text by-line">
            <span>Posted by <?php echo get_the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?></span>
        </div>
        <div class="blog-title">
            <h1><?php the_title(); ?></h1>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    <?php }
    ?></div>
    <div class="right-text by-line">
        <a href="<?php echo esc_url(site_url('/blog'));?>">See all blog posts</a>
    </div>
    <div class="page-accent-alt-2">
        <h2 class="centered-text">Comments</h2>
        <?php get_template_part('template-parts/comments'); ?>
    </div>
</main>

<?php get_footer(); ?>