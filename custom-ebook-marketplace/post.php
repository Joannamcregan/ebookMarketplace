<?php get_header();

    ?><div class="generic-content full-screen">
          <?php wp_reset_postdata();
          the_content(); ?>
      </div>

<?php get_footer();
?>