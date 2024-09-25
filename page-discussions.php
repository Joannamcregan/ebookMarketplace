<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-40">Let's Discuss...</h1></div>
        <?php if (is_user_logged_in()){
            $user = wp_get_current_user();
            if (in_array( 'creator-member', (array) $user->roles )){
                ?><div class="tomc-circle-container">
                    <img src="<?php echo get_theme_file_uri('/images/circle-background-0.jpg'); ?>" role="presentation" />
                    <p class="orange-shadow-heading tankindred-text tomc-circle-p-1"><a href="<?php echo esc_url(site_url('/groups/creator-members/forum/'));?>"><strong>Creating</strong></a></p>
                    <p class="tomc-circle-p-2">Let's talk about all things writing and/or creating! This forum is for co-op members who are part of our Creators' Circle.</p>
                </div>
            <?php } else {
                ?><div class="tomc-circle-container">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-0.jpg'); ?>" role="presentation" />
                <p class="orange-shadow-heading tankindred-text tomc-circle-p-1"><strong>Creating</strong></p>
                <p class="tomc-circle-p-2">Want to talk about all things writing and/or creating? Join our <a href="<?php echo esc_url(site_url('/creators-circle-membership'));?>">Creators' Circle!</a></p>
            </div>
            <?php }
            ?><div class="red-orange-line-break-60"></div>
            <?php if (in_array( 'reader-member', (array) $user->roles )){
                ?><div class="tomc-circle-container">
                    <img src="<?php echo get_theme_file_uri('/images/circle-background-1.jpg'); ?>" role="presentation" />
                    <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><a href="<?php echo esc_url(site_url('/groups/reader-members/forum/'));?>"><strong>Reading</strong></a></p>
                    <p class="tomc-circle-p-2">Let's talk about books we're reading, books we've read, books we want to read, and reading itself! This forum is for co-op members who are part of our Readers' Circle.</p>
                </div>
            <?php } else {
                ?><div class="tomc-circle-container">
                    <img src="<?php echo get_theme_file_uri('/images/circle-background-1.jpg'); ?>" role="presentation" />
                    <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><strong>Reading</strong></p>
                    <p class="tomc-circle-p-2">Want to talk about books and reading? Join our <a href="<?php echo esc_url(site_url('/readers-circle-membership'));?>">Readers' Circle!</a></p>
                </div>
            <?php }
            ?> <div class="red-orange-line-break-60"></div>
            <div class="tomc-circle-container tomc-circle-container-long-text">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-2.jpg'); ?>" role="presentation" />
                <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><a href="<?php echo esc_url(site_url('/forums/forum/general-discussions'));?>"><strong>Whatever</strong></a></p>
                <p class="tomc-circle-p-2">Let's get to know each other better and talk about whatever comes to mind! This forum is for anyone who is interested in the Trunk of My Car journey and/or cooperatives in general.</p>
            </div>
        <?php } else {
            ?>To participate in discussions, please <a href="<?php echo esc_url(site_url('/my-account'));?>">login</a>
        <?php }
    ?></div>
</main>

<?php get_footer(); ?>