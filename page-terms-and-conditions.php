<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">Terms and Conditions</h1></div>
    <br>
    <div class="generic-content full-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
      </div>
</main>

<?php get_footer(); ?>