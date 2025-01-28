<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text banner-heading-40">Creators' Circle</h1></div>
    <br>
    <br>
    <?php if (is_user_logged_in()){
        ?><div class="generic-content">
            <h2 class="centered-text">Membership Agreement</h2>
        <?php echo do_shortcode('[forminator_form id="4212"]'); ?>
    </div>
    <?php } else {
        ?><p class="padding-x-20">Interested in becoming a Creator-Member? First, register for our community or <a href="<?php echo esc_url(site_url('/my-account'));?>">login</a>.</p>
    <?php }
?></main>

<?php get_footer();
?>