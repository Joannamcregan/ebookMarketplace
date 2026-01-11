<?php get_header();
$user = wp_get_current_user();

?><main class="leaves">
    <div class='logo-image-large-container'>
        <picture class="logo-image-picture">
            <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/logo-large-alt.webp'); ?>" alt="Trunk of My Car Cooperative" class="logo-image-large" >
            <img src="<?php echo get_theme_file_uri('/images/logo-large-alt.jpg'); ?>" alt="Trunk of My Car Cooperative" class="logo-image-large" />
        </picture>
    </div>
    <div class="logo-image-large-container">
        <picture class="logo-image-picture">
            <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/sub-logo.webp'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" >
            <img src="<?php echo get_theme_file_uri('/images/sub-logo.jpg'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" />
        </picture>
        <!-- <img src="<?php echo get_theme_file_uri('/images/sub-logo.jpg'); ?>" alt="self-publishing evolution/revolution" class="sub-logo" /> -->
    </div>
    <p class="leaves-p centered-text">We're on a mission to collectively redistribute resources from those who take to those who create with a self-publishing platform <strong>owned by a community of people who love and create books.</strong></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <div>
                    <p class="leaf-text-large">Read</p>
                    <p class="leaf-text-small"><em class="no-decoration">buy books</em></p>
                </div>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/shop'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Browse New Books</p>
                </div>
                </a>
            </div>
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/my-account/orders/')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Books I've Purchased</p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <div>
                    <p class="leaf-text-large">Create</p>
                    <p class="leaf-text-small"><em class="no-decoration">publish books</em></p>
                    <p class="leaf-text-small"><em class="no-decoration">offer services</em></p>
                </div>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
        <?php if (is_user_logged_in() && in_array( 'dc_vendor', (array) $user->roles )){
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/dashboard')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Dashboard</p>
                </div>
                </a>
            </div>
        <?php } else {
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/options-to-offer-your-work')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Offer Your Work</p>
                </div>
                </a>
            </div>
        <?php }
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/services'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Services</p>
                </div>
                </a>
            </div>
            <p class="centered-text" id="instructions-non-leaf">Check out our <a href="<?php echo esc_url(site_url('/creator-roadmap'));?>" target="_blank">creator roadmap</a> for a quick guide to offering books and services.</p>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <a href="<?php echo esc_url(site_url('/own'));?>"  class="no-decoration">
            <div class="leaf orange-leaf">
                <div>
                    <p class="leaf-text-large">Own</p>
                    <p class="leaf-text-small"><em class="no-decoration">become a member</em></p>
                </div>
            </div>
            </a>
        </div>
    </div>
    <div id="tomc-newsletter-signup-form">
        <?php echo do_shortcode('[forminator_form id="5381"]'); ?>
    </div>
    </div>
</main>

<?php get_footer(); ?>