<?php get_header();

    ?><div class="banner"><h1 class="centered-text"><?php echo get_the_title(); ?></h1></div>
    <br>
    <br>
    <div class="generic-content two-thirds-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
    </div>

    <?php wp_reset_postdata();
    $args = array(
        'role__in' => array('contributor', 'editor', 'administrator'),
        'orderby' => 'user_nicename',
        'order'   => 'DESC'
    );
    
    $user_query = new WP_User_Query( $args );
    
    ?><br><h3 class="centered-text">Meet our team</h3>
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

<?php get_footer();
?>