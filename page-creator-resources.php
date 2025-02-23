<?php get_header();

?><main>
    <div class="banner semi-large-heading"><h1 class="centered-text banner-heading-36">Creator Resources</h1></div>
    <br>
    <br>
    <div class="generic-wrapper-2">
        <div class="generic-wrapper-1">
            <div class="generic-wrapper-0">
                <p class="centered-text">
                    <a href="<?php echo esc_url(site_url('/creator-roadmap'));?>">Creator Roadmap</a>
                </p>
                <p class="centered-text">
                    <a href="<?php echo esc_url(site_url('/copyright-primer'));?>">Copyright Primer</a>
                </p>
                <p class="centered-text">
                    <a href="<?php echo esc_url(site_url('/dmca-takedown-primer'));?>">DMCA Takedown Primer</a>
                </p>
                <p class="centered-text">
                    <a href="<?php echo esc_url(site_url('/dmca-takedown-template'));?>">DMCA Takedown Template</a>
                </p>
            </div>
        </div>
    </div>
</main>

<?php get_footer();
?>