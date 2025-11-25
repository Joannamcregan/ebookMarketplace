<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-50">Unsubscribe</h1></div>
    <br>
    <br>
    <div class="padding-x-20 centered-text half-screen">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                echo do_shortcode('[mailpoet_page]');
                echo the_content();
            endwhile;
        endif;    
    ?></div>
</main>

<?php get_footer();
?>