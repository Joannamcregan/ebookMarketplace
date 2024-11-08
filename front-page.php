<?php get_header();

?><main class="leaves">
    <div class='logo-image-large-container'>
        <img class="logo-image-large" src="<?php echo get_theme_file_uri('/images/logo-large-alt.png'); ?>" alt="Trunk of My Car Cooperative" />
    </div>
    <div class="logo-image-large-container">
        <img class="sub-logo" src="<?php echo get_theme_file_uri('/images/sub-logo.png'); ?>" alt="self-publishing evolution/revolution" />
    </div>
    <p class="leaves-p centered-text">We're on a mission to collectively redistribute resources from those who take to those who create with a self-publishing platform <strong>owned by a community of people who love and create books.</strong></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <p>Read</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/newly-added-books'));?>">
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
    <br>
    <p class="centered-text"><img src="<?php echo get_theme_file_uri('/images/corner-stars-0.jpg'); ?>" role="presentation" class="inline" /><em>buy books</em><img src="<?php echo get_theme_file_uri('/images/corner-stars-1.jpg'); ?>" role="presentation" class="inline" /></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <p>Create</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
        <?php $user = wp_get_current_user();
        if (is_user_logged_in() && in_array( 'dc_vendor', (array) $user->roles )){
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/dashboard')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Dashboard</p>
                </div>
                </a>
            </div>
        <?php } else {
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/about')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creating within a Co-op</p>
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
        </div>
    </div>
    <br>
    <p class="centered-text"><img src="<?php echo get_theme_file_uri('/images/corner-stars-1.jpg'); ?>" role="presentation" class="inline" /><em>publish books and/or offer services</em><img src="<?php echo get_theme_file_uri('/images/corner-stars-2.jpg'); ?>" role="presentation" class="inline" /></p>
    <p class="centered-text"><a href="#">how to publish books</a></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <a href="<?php echo esc_url(site_url('/own'));?>"  class="no-decoration">
            <div class="leaf orange-leaf">
                <p>Own</p>
            </div>
            </a>
        </div>
    </div>
    <br>
    <p class="centered-text"><img src="<?php echo get_theme_file_uri('/images/corner-stars-2.jpg'); ?>" role="presentation" class="inline" /><em>become a member</em><img src="<?php echo get_theme_file_uri('/images/corner-stars-0.jpg'); ?>" role="presentation" class="inline" /></p>
</main>

<?php get_footer(); ?>