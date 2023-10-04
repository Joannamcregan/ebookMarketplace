<footer class="footer--main">
      <div class="footer-top">
            <ul class="footer-top-left">
                  <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
                  <li><a href="<?php echo esc_url(site_url('/genres'));?>">Ebook Genres</a></li>     
                  <li><a href="<?php echo esc_url(site_url('/audiobook-genres'));?>">Audiobook Genres</a></li>
                  <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">Diverse Books</a></li>
                  <li><a href="<?php echo esc_url(site_url('/free-shorts'));?>">Free Short Reads</a></li>
                  <li><a href="<?php echo esc_url(site_url('/merch'));?>">Signed Books and Merch</a></li>  
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
            </ul>
            <ul class="footer-top-right">
                  <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
                  <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li>  
                  <li><a href="<?php echo esc_url(site_url('/blog'));?>">Blog</a></li>
                  <li><a href="<?php echo esc_url(site_url('/forum'));?>">Forum</a></li>
                  <li><a href="<?php echo esc_url(site_url('/governance'));?>">Governance</a></li>  
                  <li><a href="<?php echo esc_url(site_url('/privacy-policy'));?>">Privacy Policy</a></li> 
                  <li><a href="<?php echo esc_url(site_url('/ad-policy'));?>">Ad Policy</a></li> 
            </ul>
      </div>
      <div class="footer-bottom">
            <ul>
                  <?php if (is_user_logged_in()){
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                        <li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Downloads</a></li>
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
      <li><a href="<?php echo esc_url(site_url('/genres'));?>">Ebook Genres</a></li>  
      <li><a href="<?php echo esc_url(site_url('/audiobook-genres'));?>">Audiobook Genres</a></li>
      <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">Diverse Books</a></li> 
      <li><a href="<?php echo esc_url(site_url('/free-shorts'));?>">Free Short Reads</a></li>
      <li><a href="<?php echo esc_url(site_url('/merch'));?>">Signed Books and Merch</a></li>    
      <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
      <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
      <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li> 
      </ul>
  </nav>
</div>

<?php wp_footer(); ?>
</body>
</html>