<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-50">Unsubscribe</h1></div>
    <br>
    <br>
    <div class="padding-x-20 centered-text half-screen">
        <?php wp_reset_postdata();
        the_content(); 
        echo apply_filters('the_content', '[mailpoet_page]');
    ?></div>
</main>

<?php get_footer();
?>