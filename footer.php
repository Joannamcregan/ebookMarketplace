<footer class="footer--main">
      <div class="footer-top">
            <ul class="footer-top-left">
                  <li><a href="<?php echo esc_url(site_url('/new-books'));?>">New Books</a></li>
                  <li><a href="<?php echo esc_url(site_url('/genres'));?>">Browse Genres</a></li>  
            </ul>
            <ul class="footer-top-right">
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li>
                  <li><a href="<?php echo esc_url(site_url('/services'));?>">Services</a></li>                  
            </ul>
      </div>
      <div class="footer-bottom">
            <ul>
                  <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
                  <?php if (is_user_logged_in()){
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                        <li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Downloads</a></li>
                        <li><a href="<?php echo esc_url(site_url('/groups'));?>">My Group Discussions</a></li>
                        <li><a href="<?php echo esc_url(site_url('/wp-admin')); ?>">My Creator Dashboard</a></li>
                        <li><a href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a></li>
                  <?php } else {
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">Login</a></li>
                  <?php }
            ?></ul>
      </div>
</footer>

<div class="menu-overlay">
  <i class="fa fa-window-close menu-overlay__close" aria-hidden="true"></i>
  <nav aria-label="mobile navigation bar">
      <ul class="menu-overlay-list">
      <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
      <li><a href="<?php echo esc_url(site_url('/new-books'));?>">New Books</a></li>
      <li><a href="<?php echo esc_url(site_url('/genres'));?>">Browse Genres</a></li>  
      <li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Downloads</a></li>
      <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li>
      <li><a href="<?php echo esc_url(site_url('/services'));?>">Services</a></li>
      <li><a href="<?php echo esc_url(site_url('/wp-admin')); ?>">My Creator Dashboard</a></li>
      <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
      </ul>
  </nav>
</div>

<?php wp_footer(); ?>
</body>
</html>