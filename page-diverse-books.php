<?php get_header();

    ?><div class="banner"><h1 class="centered-text">Discover Books by Diverse Authors</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/asian-voices'));?>">by Asian Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/black-voices'));?>">by Black Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/disabled-voices'));?>">by Disabled Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/indigenous-voices'));?>">by Indigenous Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/latinx-voices'));?>">by Latinx Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/lgbtqia2s-voices'));?>">by LGBTQIA+ Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/middle-eastern-voices'));?>">by Middle Eastern Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/neurodivergent-voices'));?>">by Neurodivergent Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/oceanic-and-pacific-islander-voices'));?>">by Oceanic and Pacific Islander Authors</a></div>
        <div class="genre-category subcategory"><a href="<?php echo esc_url(site_url('/diverse-books/poor-and-working-class-voices'));?>">by Poor and Working Class Authors</a></div>
    </div>

<?php get_footer();
?>