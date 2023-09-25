<?php get_header();

    ?><div class="full-screen">
        <div class="coming-soon-info">
            <?php wp_reset_postdata();
            the_content(); ?>
        </div>
    </div>

<?php get_footer();
?>