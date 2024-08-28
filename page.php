<?php get_header();

?><main>
<?php while ( have_posts() ) :
the_post();
    ?><div class="full-screen margin-20">
        <?php wp_reset_postdata();
        the_content(); 
        wp_link_pages();?>
    </div>
<?php endwhile;
?></main>

<?php get_footer(); ?>