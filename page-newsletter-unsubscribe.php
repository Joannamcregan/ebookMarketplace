<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-50">Unsubscribe</h1></div>
    <br>
    <br>
    <div class="padding-x-20 centered-text half-screen">
        <?php while ( have_posts() ) :
            the_post();
            wp_reset_postdata();
            echo do_shortcode('[mailpoet_page]');
            the_content(); 
        endwhile;        
    ?></div>
</main>

<?php get_footer();
?>