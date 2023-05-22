<footer class="footer--main">
      <div class="footer-top">
            <ul>
                  <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
                  <li><a href="<?php echo esc_url(site_url('/genres'));?>">Browse by Genre</a></li>       
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
                  <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">Browse Diverse Books</a></li>
            </ul>
            <ul>
                  <li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                  <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
                  <li><a href="<?php echo esc_url(site_url('/privacy-policy'));?>">Privacy Policy</a></li>
                  <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li>   
            </ul>
      </div>
      <p>Copyright 2022</p>
</footer>

<div class="menu-overlay">
  <i class="fa fa-window-close menu-overlay__close" aria-hidden="true"></i>
  <ul class="menu-overlay-list">
    <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
    <li><a href="<?php echo esc_url(site_url('/genres'));?>">Browse by Genre</a></li>       
    <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
    <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">Browse Diverse Books</a></li>
    <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
    <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li> 
  </ul>
</div>

<?php wp_footer(); ?>
</body>
</html>