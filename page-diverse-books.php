<?php get_header();

    $featuredAsianIds = array(884);
    $featuredBlackIds = array(869, 949, 946);
    $featuredDisabledIds = array();
    $featuredIndigenousIds = array();
    $featuredLatinxIds = array();
    $featuredLgtbqiaIds = array();
    $featuredMiddleEasternIds = array();
    $featuredNeurodivergentIds = array();
    $featuredOceanicIds = array();
    $featuredPoorIds = array();

    ?><div class="banner"><h1 class="centered-text">Discover Books by Diverse Authors</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/asian-voices'));?>"><h3>by Asian Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredAsianBooks = new WP_Query( array( 'post_type' => 'product', 'post__in' => $featuredAsianIds ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredAsianBooks -> have_posts()){
                $featuredAsianBooks->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/black-voices'));?>"><h3>by Black Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredBlackBooks = new WP_Query( array( 'post_type' => 'product', 'post__in' => $featuredBlackIds ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredBlackBooks -> have_posts()){
                $featuredBlackBooks->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>                
            <?php } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/disabled-voices'));?>">by Disabled Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/indigenous-voices'));?>">by Indigenous Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/latinx-voices'));?>">by Latinx Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/lgbtqia2s-voices'));?>">by LGBTQIA+ Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/middle-eastern-voices'));?>">by Middle Eastern Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/neurodivergent-voices'));?>">by Neurodivergent Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/oceanic-and-pacific-islander-voices'));?>">by Oceanic and Pacific Islander Authors</a>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/poor-and-working-class-voices'));?>">by Poor and Working Class Authors</a>
        </div>
    </div>

<?php get_footer();
?>