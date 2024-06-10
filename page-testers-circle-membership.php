<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">Testers' Circle</h1></div>
    <br>
    <br>
    <?php if (is_user_logged_in()){
        ?><div class="generic-content">
            <h2 class="centered-text">Membership Agreement</h2>
        <?php echo do_shortcode('[forminator_form id="2372"]'); ?>
    </div>
    <?php } else {
        ?><p>Interested in becoming a Reader-Member? First, register for our community or <a href="<?php echo esc_url(site_url('/my-account'));?>">login</a>.</p>
    <?php }
?></main>

<?php get_footer();
?>