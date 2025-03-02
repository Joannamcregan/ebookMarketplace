<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-36">Forums</h1></div>
        <?php if (is_user_logged_in()){
            $user = wp_get_current_user();
            if ((in_array( 'reader-member', (array) $user->roles )) || (in_array( 'creator-member', (array) $user->roles ))){
                ?><div class="tomc-circle-container">
                    <img src="<?php echo get_theme_file_uri('/images/circle-background-0.jpg'); ?>" role="presentation" />
                    <p class="orange-shadow-heading tankindred-text tomc-circle-p-1"><a href="<?php echo esc_url(site_url('/groups/co-op-members/forum/'));?>"><strong>Members-Only</strong></a></p>
                    <p class="tomc-circle-p-2">A Space to Discuss All Things Cooperative</p>
                </div>
                <div class="red-orange-line-break-60"></div>
            <?php }
            ?><div class="tomc-circle-container tomc-circle-container-long-text">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-1.jpg'); ?>" role="presentation" />
                <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><a href="<?php echo esc_url(site_url('/forums/forum/general/'));?>"><strong>Public</strong></a></p>
                <p class="tomc-circle-p-2">A Space to Discuss All Things Literary</p>
            </div>
        <?php } else {
            ?>To participate in discussions, please <a href="<?php echo esc_url(site_url('/my-account'));?>">login</a>
        <?php }
    ?></div>
</main>

<?php get_footer(); ?>