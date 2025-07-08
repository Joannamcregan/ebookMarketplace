<?php get_header();

?><main>
    <div class="two-thirds-screen">
    <?php while(have_posts()){
        the_post(); 
        ?><div class="right-text by-line">
            
        </div>
        <div class="padding-x-20">
            <h1 class="centered-text"><?php the_title(); ?></h1>
            <p class="centered-text">Posted by <?php echo get_the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?></p>
        </div>
        <div class="red-orange-line-break-60"></div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    <?php }
    ?></div>
    <div class="right-text by-line">
        <a href="<?php echo esc_url(site_url('/blog'));?>">See all blog posts</a>
    </div>
    <div class="padding-x-20">
        <h2 class="centered-text">Comments</h2>
        <?php get_template_part('template-parts/comments'); ?>
    </div>
</main>

<?php get_footer(); ?>