<?php get_header();

?><main class="leaves">
    <h1 class='caprasimo-text special-display-text'>Trunk of My Car</h1>
    <p class="leaves-p centered-text"><strong>Our Cooperatively Owned</strong> Book Marketplace</p>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <p>Learn</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/about'));?>">
                <div class="sub-leaf blue-leaf">
                    <p>About Us</p>
                </div>
                </a>
            </div>
            <div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('#')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>Learning Resource List</p>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <a class="no-decoration" href="<?php echo esc_url(site_url('/own'));?>">
            <div class="leaf orange-leaf">
                <p>Join</p>
            </div>
            </a>
        </div>
    <!-- <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf">
                <p>Govern</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
            <div class="sub-leaf-wrapper">
                <div class="sub-leaf blue-leaf">
                    <p>Next Election</p>
                </div>
            </div>
            <div class="sub-leaf-wrapper">
                <div class="sub-leaf blue-leaf">
                    <p>Past Elections</p>
                </div>
            </div>
        </div>
    </div> -->
</main>

<?php get_footer(); ?>