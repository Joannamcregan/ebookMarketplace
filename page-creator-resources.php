<?php get_header();

?><main>
    <div class="banner semi-large-heading"><h1 class="centered-text banner-heading-36">Creator Resources</h1></div>
    <br>
    <br>
    <?php if (is_user_logged_in()){
        $user = wp_get_current_user();
        if (in_array( 'creator-member', (array) $user->roles ) ||  in_array( 'administrator', (array) $user->roles )){
            ?><br><br>
            <div class="generic-wrapper-2">
                <div class="generic-wrapper-1">
                    <div class="generic-wrapper-0">
                        <p class="centered-text">
                            <a href="<?php echo esc_url(site_url('/creator-roadmap'));?>">Creator Roadmap</a>
                        </p>
                        <p class="centered-text">
                            <a href="<?php echo esc_url(site_url('/options-to-offer-your-work'));?>">Options to Offer Your Work</a>
                        </p>
                        <p class="centered-text">
                            <a href="<?php echo esc_url(site_url('/copyright-primer'));?>">Copyright Primer</a>
                        </p>
                        <p class="centered-text">
                            <a href="<?php echo esc_url(site_url('/dmca-primer'));?>">DMCA Primer</a>
                        </p>
                        <p class="centered-text">
                            <a href="<?php echo esc_url(site_url('/dmca-takedown-template'));?>">DMCA Takedown Template</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } else {
            ?><p class="centered-text">To view the Creator Resources, join our Cooperative as a <a href="<?php echo esc_url(site_url('/creators-circle-membership'));?>">Creator-Member</a>.</p>
        <?php }
    }
?></main>

<?php get_footer();
?>