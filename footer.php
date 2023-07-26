<footer class="footer--main">
      <div class="footer-top">
            <ul class="footer-top-left">
                  <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
                  <li><a href="<?php echo esc_url(site_url('/genres'));?>">E-books by Genre</a></li>       
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
                  <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">By Diverse Authors</a></li>
                  <li><a href="<?php echo esc_url(site_url('/merch'));?>">Merch and More</a></li>
            </ul>
            <ul class="footer-top-right">
                  <li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                  <li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My E-Book Downloads</a></li>
                  <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
                  <li><a href="<?php echo esc_url(site_url('/privacy-policy'));?>">Privacy Policy</a></li>
                  <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li>   
            </ul>
      </div>
      <!-- <p>Copyright 2022</p> -->
</footer>

<div class="menu-overlay">
  <i class="fa fa-window-close menu-overlay__close" aria-hidden="true"></i>
  <ul class="menu-overlay-list">
    <li><a href="<?php echo esc_url(site_url()) ?>">Home</a></li>
    <li><a href="<?php echo esc_url(site_url('/genres'));?>">E-books by Genre</a></li>       
    <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
    <li><a href="<?php echo esc_url(site_url('/diverse-books'));?>">By Diverse Authors</a></li>
    <li><a href="<?php echo esc_url(site_url('/merch'));?>">Merch and More</a></li>
    <li><a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a></li>
    <li><a href="<?php echo esc_url(site_url('/get-involved'));?>">Get Involved</a></li> 
  </ul>
</div>

<?php wp_footer(); ?>
</body>
</html>