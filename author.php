<?php get_header();

?><div class="two-thirds-screen">
    <h2 class="centered-text">About <?php echo get_author_name(); ?></h2>
    <div class="image-text--container">
        <img class="image-text--image" src="<?php echo get_avatar_url(get_the_author_id(), ['size' => '300']); ?>"/>
        <div>
            <?php if (get_the_author_meta('description', get_the_author_id())) {
                echo get_the_author_meta('description', get_the_author_id());
            } else {
                echo get_author_name() . ' is a contributor helping create a cooperative e-book marketplace';
            }
            if (get_the_author_meta('user_url', get_the_author_id())) {
                ?><p class="centered-text"><a href="<?php echo get_the_author_meta('user_url', get_the_author_id()); ?>"><i class="fa-solid fa-link"></i></a></p>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="page-accent">
        <h3 class="centered-text">Meet all of our workers.</h3>
        <div class="contributors">
            <?php $contributors = new WP_Query( array( 'post_type' => 'product')); 
            if ($contributors) {
                echo 'there are contributors';
            } else {
                echo 'there are no contributors';
            }
        ?></div>
    </div>
</div>

<?php get_footer(); ?>