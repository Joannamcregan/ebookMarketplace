<?php get_header();

?><main>
    <div class="banner"><h1 class="centered-text">Discover Ebooks by Diverse Authors</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/asian-voices'));?>"><h2 class="centered-text">by Asian Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/black-voices'));?>"><h2 class="centered-text">by Black Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/disabled-voices'));?>"><h2 class="centered-text">by Chronically Ill and Disabled Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/indigenous-voices'));?>"><h2 class="centered-text">by Indigenous/Native American Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/latinx-voices'));?>"><h2 class="centered-text">by Latine/Latinx Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/lgbtqia-voices'));?>"><h2 class="centered-text">by LGBTQIA+ Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/middle-eastern-voices'));?>"><h2 class="centered-text">by Middle Eastern Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/neurodivergent-voices'));?>"><h2 class="centered-text">by Neurodivergent Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/oceanic-and-pacific-islander-voices'));?>"><h2 class="centered-text">by Oceanic and Pacific Islander Authors</h3></a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/poor-peoples-voices'));?>"><h2 class="centered-text">by Poor Authors</h3></a>
        </div>
    </div>
</main>

<?php get_footer();
?>