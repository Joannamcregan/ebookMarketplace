<footer class="footer--main">
      <div class="footer-top">
            <ul class="footer-top-left">
                  <li><a href="<?php echo esc_url(site_url('/new-books'));?>">New Books</a></li>
                  <li><a href="<?php echo esc_url(site_url('/browse-by-genre'));?>">Browse Genres</a></li> 
                  <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li> 
            </ul>
            <ul class="footer-top-right">
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li>
                  <li><a href="<?php echo esc_url(site_url('/services'));?>">Services</a></li>   
                  <li><a href="<?php echo esc_url(site_url('/groups'));?>">Groups</a></li>               
            </ul>
      </div>
      <div class="footer-bottom">
            <ul>                  
                  <?php if (is_user_logged_in()){
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                        <?php if (is_user_logged_in()){
                              $tomc_user = get_userdata(get_current_user_id());
                              $tomc_username = $tomc_user->user_login;
                              ?><li><a href="<?php echo esc_url(site_url('/members')) . '/' . $tomc_username; ?>">
                              My Profile
                              </a></li>
                              <li><a href="<?php echo esc_url(site_url('/my-bookshelves')); ?>">My Bookshelves</a> </li>
                              <li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Downloads</a></li>
                              <?php $user = wp_get_current_user();
                              if (in_array( 'dc_vendor', (array) $user->roles )){
                                    ?><li><a href="<?php echo esc_url(site_url('/dashboard'));?>">My Vendor Portal</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add a Book</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/my-books'));?>">Books By Me</a></li>
                              <?php } ?>
                        <?php } ?>
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
            <li><a href="<?php echo esc_url(site_url('/new-books'));?>">New Books</a></li>
            <li><a href="<?php echo esc_url(site_url('/browse-by-genre'));?>">Browse Genres</a></li>
            <?php if (is_user_logged_in()){
                  ?><li><a href="<?php echo esc_url(site_url('/my-bookshelves')); ?>">My Bookshelves</a></li>
                  <?php $user = wp_get_current_user();
                  if (in_array( 'dc_vendor', (array) $user->roles )){
                  ?><li><a href="<?php echo esc_url(site_url('/dashboard'));?>">Vendor Portal</a></li>
                  <?php }
                  $tomc_user = get_userdata(get_current_user_id());
                  $tomc_username = $tomc_user->user_login;
                  ?><li><a href="<?php echo esc_url(site_url('/members') . '/' . str_replace(' ', '-', $tomc_username)); ?>">My Profile</a></li>
            <?php } else {
                  ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">Login</a></li>
            <?php }
      ?></ul>
      <ul class="menu-overlay-list-1">
            <?php if (is_user_logged_in()){
                  $tomc_user = get_userdata(get_current_user_id());
                  $tomc_username = $tomc_user->user_login;
                  if (in_array( 'dc_vendor', (array) $user->roles )){
                        ?><a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add a Book</a>
                        <a href="<?php echo esc_url(site_url('/my-books'));?>">Books By Me</a>
                  <?php }
                  ?><li><a href="<?php echo esc_url(site_url('/members')) . '/' . $tomc_username; ?>">
                  My Profile
                  </a></li>
            <?php } ?>          
            <li><a href="<?php echo esc_url(site_url('/coop'));?>">About the Co-op</a></li>
            <li><a href="<?php echo esc_url(site_url('/services'));?>">Services</a></li>
            <li><a href="<?php echo esc_url(site_url('/members'));?>">Members</a></li>
            <?php if (is_user_logged_in()){ ?><li><a href="<?php echo esc_url(site_url('/groups')); ?>">Groups</a></li><?php } ?>
            <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li>
      </ul>
  </nav>
</div>

<?php wp_footer(); ?>
</body>
</html>