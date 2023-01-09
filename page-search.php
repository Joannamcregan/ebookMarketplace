<?php get_header();

    ?><div class="generic-content half-screen">
        <form method="get" action="<?php echo esc_url(site_url('/')); ?>" id="basic-search-form">
            <input type="search" name="s" id="basic-search">
            <input type="submit" value="Search" id="basic-search-submit">
        </form>
      </div>

<?php get_footer();
?>