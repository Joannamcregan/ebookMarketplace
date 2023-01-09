<?php get_header();

?><div class="generic-content two-thirds-screen">

    <?php $s=get_search_query();
    $args = array(
                    's' =>$s
                );
        // The Query
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        ?><div class="simple-search-result">
            <?php _e("<h2>Search Results for: ".get_query_var('s')."</h2>");
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                if (get_post_type() == 'member-author') {
                    ?><li>
                        <span>See books by author '</span>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title();
                        ?></a>
                    </li>
                <?php } else if (get_post_type() == 'product') {
                    ?><li>
                        <a href="<?php the_permalink(); ?>">
                            <img src = "<?php echo get_the_post_thumbnail_url(); ?>" class="image-text--image" />
                            <?php the_title();
                        ?></a>
                        <?php if (get_the_title() != 'Gift Cart') {
                            echo '<br>by an author<br><br>';
                            the_excerpt();
                        }
                    ?> </li>
                <?php } else if (get_post_type() == 'curations') {
                    ?><li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title();
                        ?></a>
                        <?php echo ' a bookshelf curated by ' . get_the_author();
                        ?><br>
                        <?php the_content();
                    ?></li>
                <?php }           
            }
            ?><p class="centered-text"><a href="<?php echo esc_url(site_url('/search')); ?>"> Try another search</a></p>
        </div>
    <?php }else{
        ?><div class="simple-search-result">
            <h2 class="centered-text">Nothing Found</h2>        
            <p class="centered-text">Sorry, but nothing matched your search criteria. <a href="<?php echo esc_url(site_url('/search')); ?>"> Please try a new search.</a></p>
        </div>
    <?php } 
?></div>

<?php get_footer();
?>