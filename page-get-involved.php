<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text"><?php echo get_the_title(); ?></h1></div>
    <br>
    <br>
    <div class="generic-content two-thirds-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>