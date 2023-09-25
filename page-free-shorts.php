<?php get_header();

?><div class="banner"><h1 class="centered-text">Free Short Reads</h1></div>
<br>
<br>

<?php $shortsCounter = 0;

$ad1 = new WP_Query( array( 
    'post_type' => 'ad', 
    'posts_per_page' => 1,
    'orderby' => 'title', 
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'ad_start_date',
            'compare' => '<=',
            'value' => date("Y-m-d"),
            'type' => 'DATE'
        ),
        array(
            'key' => 'ad_end_date',
            'value' => date("Y-m-d"), 
            'compare' => '>=', 
            'type' => 'DATE'
        )
        ),
        'order' => 'ASC'
) );

wp_reset_postdata();

$ad2 = new WP_Query( array( 
    'post_type' => 'ad2', 
    'posts_per_page' => 1,
    'orderby' => 'title', 
    'order' => 'DESC',
    'meta_query' => array(
        array(
            'key' => 'ad_start_date',
            'compare' => '<=',
            'value' => date("Y-m-d"),
            'type' => 'DATE'
        ),
        array(
            'key' => 'ad_end_date',
            'value' => date("Y-m-d"), 
            'compare' => '>=', 
            'type' => 'DATE'
        )
        ),
        'order' => 'ASC'
) );

wp_reset_postdata();

$shorts = new WP_Query( array( 
    'post_type' => 'short', 
    'posts_per_page' => 10,
    'orderby' => 'date', 
    'order' => 'DESC' 
) );

while ( $shorts->have_posts() ){
    ?><div class="short-piece">
        <?php if ($shortsCounter == 3 && $ad1->have_posts()){
            while($ad1->have_posts()){
                $ad1->the_post();
                ?><div class="shorts-front-ad-wrapper">
                    <h3 class="shorts-wrapper-heading"><?php the_title(); ?></h3>
                    <div class="shorts-front-ad">
                        <?php the_content(); ?>
                    </div>
                    <p class="shorts-wrapper-p"><a href="#">Learn more</a> about how we use ads and affiliate links to help fund our platform.</p>
                </div>
            <?php }
        } else if ($shortsCounter == 6 && $ad2->have_posts()){
            while($ad2->have_posts()){
                $ad2->the_post();
                the_content();
            }
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
                    ?><span>Unknown or Anonymous Author(s) </span>
                <?php }
            ?></p></em>
            <div class="shorts-excerpt">
                <?php $shortExcerpt = get_field('excerpt');
                if ($shortExcerpt){
                    echo wp_trim_words($shortExcerpt, 100, ' [...]');
                } else {
                    the_excerpt();
                }
            ?></div>
            <p class="right-text"><a href="<?php the_permalink(); ?>">See more &raquo;</a></p>
        <?php $shortsCounter++; ?>
        </div>
    </div>
<?php }

?><div class="paginate-links">
    <?php echo paginate_links(array(
        'total'=> $shorts->max_num_pages
    ));
?></div>

<?php get_footer(); ?>