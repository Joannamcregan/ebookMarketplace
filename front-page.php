<?php get_header();

?><main class="leaves">
    <h1 class='caprasimo-text special-display-text'>Trunk of My Car</h1>
    <p class="leaves-p centered-text">An online marketplace <strong>owned by people who love and create books.</strong></p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf">
                <!-- <p>Theirs</p> -->
                <p>Read</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/genres'));?>">
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
                <!-- <p>Mine</p> -->
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
                <div class="sub-leaf blue-leaf">
                    <p>Creator Services</p>
                </div>
            </div>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf">
                <!-- <p>Ours</p> -->
                <p>Own This Together</p>
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
                <div class="sub-leaf blue-leaf">
                    <p>For Members</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>