<?php get_header();

?><main>
<?php while ( have_posts() ) :
the_post();
    ?><div class="generic-content half-screen">
        <div class="banner"><h1 class="centered-text">FAQs</h1></div>
        <br>
        <br>
        <div class="generic-wrapper-2">
            <div class="generic-wrapper-1">
                <div class="generic-wrapper-0">
                    <?php wp_reset_postdata();
                    the_content(); 
                    wp_link_pages();?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile;
?></main>

<?php get_footer(); ?>