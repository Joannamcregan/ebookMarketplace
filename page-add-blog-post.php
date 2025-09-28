<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-40">New Post</h1></div>
    <br>
    <br>
    <?php if (is_user_logged_in()){
        ?><div class="generic-content">
            <h2 class="centered-text">Add a Blog Post</h2>
            <?php echo do_shortcode('[forminator_form id="6040"]'); ?>
        </div>
    <?php }
?></main>

<?php get_footer();
?>