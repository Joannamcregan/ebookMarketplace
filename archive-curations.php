<?php 
    get_header();
    ?><div class="banner">
        <h1 class="centered-text">Curated Reading Lists</h2>
    </div>
    <div class="centered-section">
        <a class="gray-link" href="<?php echo esc_url(site_url('/get-involved'));?>">Want to help us curate lists?</a></li>
    </div>
    <div class="full-screen">
        <?php while(have_posts()){
            the_post(); ?>
            <div class="page-accent-alt">
                <div class="center-left-text">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <?php echo '<span class="right-text">' . ' curated by ';
                    ?><a class="gray-link" href="<?php echo get_author_posts_url(get_the_author_id()); ?>"><?php echo get_the_author() . '</span>'; ?></a>
                    <?php $books = get_field('curated_books');
                    if ($books) {
                        ?><a href="<?php the_permalink(); ?>"><div class="book-pile">
                            <div class="bookshelf-tablet-0">
                                <img class="bookshelf-book-0" src="<?php echo get_the_post_thumbnail_url($books[0]); ?>"/>
                            </div>   
                            <?php if (count($books) > 1) { 
                                ?><div class="bookshelf-tablet-1">
                                    <img class="bookshelf-book-1" src="<?php echo get_the_post_thumbnail_url($books[1]); ?>"/>
                                </div>
                                <?php if (count($books) >2) {
                                    ?><div class="bookshelf-tablet-2">
                                        <img class="bookshelf-book-2" src="<?php echo get_the_post_thumbnail_url($books[2]); ?>"/>
                                    </div>
                            <?php }
                            }
                        ?></div></a>                     
                    <?php }                          
                ?></div>
            </div>
        <?php }
        echo paginate_links();
        wp_reset_postdata();
    ?></div>
    <?php get_footer();