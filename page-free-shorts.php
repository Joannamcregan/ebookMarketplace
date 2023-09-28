<?php get_header();

?><div class="banner"><h1 class="centered-text">Free Short Reads</h1></div>
<br>
<br>

<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$shortsCounter = 0;

$ads = new WP_Query( array( 
    'post_type' => 'ad', 
    'orderby' => 'date', 
    'post_status' => 'publish',
    'order' => 'ASC'
) );

$adArray = array();

if ($ads->have_posts()){
    while($ads->have_posts()){
        $ads->the_post();
        array_push($adArray, $ads);
    }
}

wp_reset_postdata();

$shorts = new WP_Query( array( 
    'post_type' => 'short', 
    'posts_per_page' => 30,
    'post_status' => 'publish',
    'paged' => $paged,
    'orderby' => 'date', 
    'order' => 'DESC' 
) );

while ( $shorts->have_posts() ){
    ?><div class="short-piece">
        <?php if (fmod($shortsCounter, 3) == 0 && $shortsCounter > 0){
            if (count($adArray) > 0){
                array_shift($adArray)->the_post();
                ?><div class="shorts-front-ad-wrapper">
                    <h3 class="centered-text"><a class="gray-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <em><p class="centered-text"><span>a short </span>
                    <?php $shortCategory = get_the_category();
                    if ($shortCategory){
                        foreach($shortCategory as $cat){
                            if ($cat != $shortCategory[count($shortCategory)-1]){
                                ?><span><?php echo $cat->cat_name ?></span><span> / </span>
                            <?php } else {
                                ?><span><?php echo $cat->cat_name ?> </span>
                            <?php }
                        }
                    }   
                    $companyName = get_field('company_name');
                    $adLink = get_field('ad_link');
                    if ($companyName){
                        ?><span>piece written to promote </span></em>
                        <a class="gray-link" href="<?php echo esc_url( $adLink ); ?>" target="_blank" rel="noopener noreferrer">
                            <span><?php echo $companyName; ?></span>
                        </a>
                    <?php } else {
                        ?><span>piece written to promote a product or service</span></em>
                    <?php }
                    ?><div class="shorts-front-ad">
                        <?php the_content(); ?>
                    </div>
                    <p class="right-text"><a class="gray-link" href="<?php echo esc_url( $adLink ); ?>" target="_blank" rel="noopener noreferrer">Visit site </a></p>
                    <br>
                    <p class="centered-text"><a class="gray-link">Learn how ads and affiliate links help us support authors.</a></p>
                </div>
            <?php }
        }
        $shorts->the_post();
        ?><div class="shorts-excerpt-wrapper">
            <h3 class="centered-text"><a class="gray-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <em><p class="centered-text"><span>a short </span>
            <?php $shortCategory = get_the_category();
            if ($shortCategory){
                foreach($shortCategory as $cat){
                    if ($cat != $shortCategory[count($shortCategory)-1]){
                        ?><span><?php echo $cat->cat_name ?></span><span> / </span>
                    <?php } else {
                        ?><span><?php echo $cat->cat_name ?> </span>
                    <?php }
                }
            }
            ?><span>piece by </span>
            <?php $shortAuthor = get_field('short_author');
            if ($shortAuthor) {
                foreach($shortAuthor as $author) {
                    if ($author != $shortAuthor[count($shortAuthor)-1]){
                        ?><span><?php echo get_the_title($author) ?></span><span>, </span>
                            <?php } else {
                                ?><span><?php echo get_the_title($author) ?></span>
                            <?php }
                        }
                } else {
                    ?><span>unknown or anonymous author(s) </span>
                <?php }
            ?></p></em>
            <div class="shorts-excerpt">
                <?php if (str_word_count(get_the_excerpt()) > 200){
                    echo wp_trim_words(get_the_excerpt(), 200, ' [...]');
                } else {
                    the_excerpt();
                }                
            ?></div>
            <p class="right-text"><a href="<?php the_permalink(); ?>">Read more</a></p>
        <?php $shortsCounter++; ?>
        </div>
    </div>
<?php }

?><div class="paginate-links">
    <!-- <?php echo paginate_links(array(
        'total'=> $shorts->max_num_pages
    ));
?> -->
<?php 
echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $shorts->max_num_pages,
            'current'      => $paged,
            'format'       => '?page=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 5,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    =>__( '<i class="fa fa-angle-double-left"></i> Prev', 'twentyfifteen' ),
            'next_text'    => __( 'Next <i class="fa fa-angle-double-right"></i>', 'twentyfifteen' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
            'add_args'     => false,
            'add_fragment' => '',
        ) ); ?>
</div>

<?php get_footer(); ?>