<?php get_header();

?><div class="two-thirds-screen">
    <h2 class="centered-text">About <?php echo get_author_name(); ?></h2>
    <div class="image-text--container">
        <img class="image-text--image" src="<?php echo get_avatar_url(get_the_author_id(), ['size' => '300']); ?>"/>
        <div>
            <?php if (get_the_author_meta('description', get_the_author_id())) {
                echo get_the_author_meta('description', get_the_author_id());
            } else {
                echo get_author_name() . ' is a part of our community.';
            }
            if (get_the_author_meta('user_url', get_the_author_id())) {
                ?><p><a href="<?php echo get_the_author_meta('user_url', get_the_author_id()); ?>"><i class="fa-solid fa-link"></i><?php echo ' ' . get_author_name() . "'s link" ?></a></p>
            <?php } ?>
        </div>
    </div>

    <?php wp_reset_postdata();
    $args = array(
        'post_type' => 'curations',
        'author'        =>  get_the_author_id(),
        'orderby'       =>  'post_date',
        'order'         =>  'ASC',
        'posts_per_page' => -1
    );

    $contributorCurations = get_posts($args);

    if ($contributorCurations) {
        ?><div class="page-accent">
            <h3 class="centered-text">Bookshelves Curated by <?php echo get_author_name() ?></h3>
            <?php foreach ($contributorCurations as $curation) {
                ?><div class="contributor-curation">
                    <a href="<?php echo get_the_permalink($curation); ?>"> <?php echo get_the_title($curation); ?></a>
                    <p><?php echo get_the_excerpt($curation); ?></p>
                </div>
            <?php } ?>
        </div>
    <?php }
    
    wp_reset_postdata();
    $args = array(
        'role__in' => array('contributor', 'editor', 'administrator'),
        'orderby' => 'user_nicename',
        'order'   => 'DESC'
    );
    
    $user_query = new WP_User_Query( $args );
    
    ?><br><h3 class="centered-text">Meet our community's workers.</h3>
    <div class="contributors">
        <?php if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $user ) {
                ?><a href="<?php echo get_author_posts_url($user->id); ?>"><div class="contributor"> 
                    <img src="<?php echo get_avatar_url($user->id, ['size' => '80']); ?>"/>
                    <p><?php echo $user->display_name;?></p>
                </div></a>
            <?php }
        }
    ?></div>

</div>

<?php get_footer(); ?>