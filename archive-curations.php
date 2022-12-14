<?php 
    get_header();
    ?><div class="banner">
        <h2 class="centered-text">Reading lists curated by our community of book lovers</h2>
    </div>
    <div class="centered-section">
        <a class="gray-link" href="<?php echo site_url('/add-new-bookshelf') ?>">Want to create curated bookshelves?</a></li>
    </div>
    <div class="full-screen">
        <?php while(have_posts()){
            the_post(); ?>
            <div class="page-accent-alt">
                <div class="center-left-text">
                    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                    <?php echo '<span>' . ' curated by ';
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