<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-46">Our Bylaws</h1></div>
    <br>
    <div class="generic-content full-screen">
        <div class="white-background-wrapper">
            <?php wp_reset_postdata();
            the_content(); ?>
        </div>
      </div>
</main>

<?php get_footer(); ?>