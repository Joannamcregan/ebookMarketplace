<?php get_header();

?><main>
    <div class="generic-content full-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>