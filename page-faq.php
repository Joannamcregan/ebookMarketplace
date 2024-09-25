<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-54">FAQs</h1></div>
        <?php wp_reset_postdata();
        the_content(); ?>
    ?></div>
</main>

<?php get_footer(); ?>