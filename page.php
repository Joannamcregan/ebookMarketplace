<?php get_header();

?><main>
    <div class="generic-content full-screen">
        <?php wp_reset_postdata();
        the_content(); 
        wp_link_pages();?>
    </div>
</main>

<?php get_footer(); ?>