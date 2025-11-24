<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-50">Unsubscribe</h1></div>
    <br>
    <br>
    <div class="padding-x-20 centered-text half-screen">
        <?php while ( have_posts() ) :
            the_post();
            wp_reset_postdata();
            the_content(); 
            echo do_shortcode('[mailpoet_page]');
        endwhile;        
    ?></div>
</main>

<?php get_footer();
?>