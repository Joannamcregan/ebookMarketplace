<?php get_header();

?><main class="leaves">
    <!-- <h1><span class='special-display-text-small-sans'>The </span><span class='special-display-text-small'>Self-Publishing </span><span class='special-display-text-small-sans'>(R)evolution...</span></h1> -->
    <!-- <h1 class='special-display-text'>the self-publishing<br/><span class='special-display-text-sub'>(r)evolution</span></h1> -->
    <!-- <h1 class='special-display-text'>the self-publishing<br/>(r)evolution</h1> -->
    <!-- <p class="leaves-p centered-text">A <s>self</s> community-publishing platform <strong>owned by people who love and create books.</strong></p> -->
    <div class='logo-image-large-container'>
        <img class="logo-image-large" src="<?php echo get_theme_file_uri('/images/logo-large-alt.png'); ?>" alt="Trunk of My Car Cooperative" />
    </div>
    <div class="logo-image-large-container">
        <img class="sub-logo" src="<?php echo get_theme_file_uri('/images/sub-logo.png'); ?>" alt="self-publishing revolution" />
        <!-- <img class="sub-logo-2" src="<?php echo get_theme_file_uri('/images/sub-logo-2-alt.png'); ?>" alt="self-publishing revolution" /> -->
    </div>
    <!-- <h1 class="larger-heading blue-text">self-publishing (r)evolution</h1> -->
    <!-- <p class="leaves-p centered-text">A self-publishing platform <strong>owned by a community of people who love and create books.</strong> -->
    <!-- <br/>Trunk of My Car Cooperative is on a mission to <strong>collectively redistribute resources from those who take to those who create.</strong></p> -->
    <!-- <br/>We're on a mission to <strong>collectively redistribute resources from those who take to those who create.</strong></p> -->
    <p class="leaves-p centered-text">We're on a mission to collectively redistribute resources from those who take to those who create with a self-publishing platform <strong>owned by a community of people who love and create books.</strong></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf">
                <p>Read</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/new-books'));?>">
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
            <div class="leaf orange-leaf">
                <p>Create</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/wp-admin')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Dashboard</p>
                </div>
                </a>
            </div>
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/services'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Creator Services</p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf">
                <p>Own</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
            <a href="<?php echo esc_url(site_url('/coop')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>About the Co-op</p>
                </div>
            </a>
            </div>
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/events'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>Events</p>
                </div>
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>