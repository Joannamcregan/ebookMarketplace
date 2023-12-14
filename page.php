<?php get_header();

?><main>
<?php while ( have_posts() ) :
the_post();
    ?><div class="generic-content full-screen">
        <?php wp_reset_postdata();
        the_content(); 
        wp_link_pages();?>
    </div>
<?php endwhile;
?></main>

<?php get_footer(); ?>