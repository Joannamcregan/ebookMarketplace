<?php
    get_header();

    if (!is_user_logged_in()){
        ?><h3 class="centered-text">Welcome!</h3>
        <a href="/login"><p class="centered-text">login or sign up</p></a>
    <?php } else {
        global $current_user;
        wp_get_current_user() ;        
        ?><h3 class="centered-text"><span>Welcome back,  </span><?php  echo $current_user->user_login; ?><span>!</span></h3>
        <a href="/login"><p class="centered-text small-text"><span>Not </span><span><?php echo $current_user->user_login; ?></span><span>?</span></p></a>
    <?php }

    $newestReleases = new WP_Query(array(
                'posts_per_page' => 30,
                'post_type' => 'product',
                'orderby' => 'date',
                'order' => 'DESC'
            ));

            if ($newestReleases->have_posts()){
                echo '<div class="page-accent">';
                    echo '<h3 class="left-text"> Newest Additions</h3>';
                    ?> <div class="book-sections-container"> 
                    <?php while ($newestReleases -> have_posts()){
                        $newestReleases->the_post();
                        ?><div class="book-section--small">
                            <a href="<?php the_permalink(); ?>"><img class="book-cover--small" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                        </div>                
                    <?php }
                    ?></div>
                </div>
            <?php }

            wp_reset_postdata();
            
    get_footer();