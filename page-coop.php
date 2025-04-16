<?php get_header();

?><main class="leaves">
    <h1 class='caprasimo-text'><span class="special-display-text">Trunk of My Car</span><span class="special-display-text-sub"> Cooperative</span></h1>
    <p class="leaves-p centered-text"><strong>A Cooperatively Owned Self-Publishing Marketplace</strong></p>
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
                <a href="<?php echo esc_url(site_url('/resources')); ?>">
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
    </div>
    <div class="leaf-section">
        <div class="leaf-wrapper">
            <div class="leaf orange-leaf expandable-leaf">
                <p>Connect</p>
            </div>
        </div>
        <div class="sub-leaf-section not-displayed">
        <?php if (is_user_logged_in()){
            $user = wp_get_current_user();
            if (in_array( 'creator-member', (array) $user->roles ) || in_array( 'reader-member', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles )){
                ?><div class="sub-leaf-wrapper">
                    <a href="<?php echo esc_url(site_url('/forums/forum/members-only-space/'));?>">
                    <div class="sub-leaf blue-leaf">
                        <p>Members Only Forum</p>
                    </div>
                    </a>
                </div>
            <?php }
        }
            ?><div class="sub-leaf-wrapper">
                <a href="<?php echo esc_url(site_url('/forums/forum/general/')); ?>">
                <div class="sub-leaf blue-leaf">
                    <p>General Forum</p>
                </div>
                </a>
            </div>
        </div>
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