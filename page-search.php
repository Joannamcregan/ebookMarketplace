<?php get_header();
?><main>
    <div class="banner"><h1 class="centered-text">Perform a Search</h1></div>
    <div class="generic-content half-screen">
        <form method="get" action="<?php echo esc_url(site_url('/')); ?>" id="basic-search-form">
            <input type="search" name="s" id="basic-search" aria-label="search field">
            <input type="submit" value="Search" id="basic-search-submit" aria-label="search">
        </form>
    </div>
</main>
<?php get_footer(); ?>