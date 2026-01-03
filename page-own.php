<?php get_header();
?><main>
    <div class="two-thirds-screen">
        <div class="banner"><h1 class="centered-text banner-heading-40">Become a Member</h1></div>
        <div class="tomc-circle-container tomc-circle-container-xl">
            <picture>
                <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/circle-background-0.webp'); ?>" role="presentation">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-0.jpg'); ?>" role="presentation" />
            </picture>
            <p class="tomc-circle-p-0">This circle is for all our creatives out there. Those who write, design cover art, edit all the words, and/or are indie presses.</p>
            <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><strong>Creator</strong></p>
            <br><br>
            <div class="tomc-circle-p-2">
                <p class="centered-text">Those who want to upload their work, collaborate with other members, and be in community, while reaping the benefits of ownership.</p>
                <p class="centered-text"><strong>Join as an <a href="<?php echo esc_url(site_url('/creators-circle-membership'));?>">individual</a> or <a>organization</a>.</strong></p>
            </div>
        </div>
        <div class="red-orange-line-break-60"></div>
        <div class="tomc-circle-container">
            <picture>
                <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/circle-background-1.webp'); ?>" role="presentation">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-1.jpg'); ?>" role="presentation" />
            </picture>
            <p class="tomc-circle-p-0">This circle is for those among us who love books just as much as creators but would rather read than write. </p>
            <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><a href="<?php echo esc_url(site_url('/readers-circle-membership'));?>"><strong>Reader</strong></a></p>
            <br><br>
            <p class="tomc-circle-p-2">Folks who believe in shared ownership and community and are also here for the perks!</p>
        </div>
        <div class="red-orange-line-break-60"></div>
        <div class="tomc-circle-container tomc-circle-container-long-text">
            <picture>
                <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/circle-background-2.webp'); ?>" role="presentation">
                <img src="<?php echo get_theme_file_uri('/images/circle-background-2.jpg'); ?>" role="presentation" />
            </picture>
            <p class="tomc-circle-p-0">This circle is for those who run all the things behind the scenes, keeping Trunk of My Car on the road.</p>
            <p class="orange-shadow-heading tankindred-text tomc-circle-p-1-padded-2x"><strong>Worker</strong></p>
            <br><br>
            <p class="tomc-circle-p-2">Those who fill the tank, clean the windshield, and change the occasional tire. We don't have any job listings at the moment, but check back as we grow!</p>
        </div>
    </div>
</main>

<?php get_footer(); ?>