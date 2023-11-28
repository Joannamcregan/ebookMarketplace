<?php get_header();

while(have_posts()){
    the_post(); 
    ?>
    <h1 class="centered-text"><?php echo get_the_title(); ?></h1>
    <p class="centered-text"><?php echo get_field('event_date'); ?> EST</p>
    <a href="<?php echo get_field('event_link'); ?>"><p class="centered-text">Register</p></a>
    <div class="generic-content half-screen">
        <?php the_content(); ?>
    </div>
<?php }

?><p class="right-text"><a href="<?php echo get_post_type_archive_link('event'); ?>">See All Events</a></p>

<?php get_footer(); ?>