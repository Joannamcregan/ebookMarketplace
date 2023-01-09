<footer class="footer--main">
      <div class="footer-top">
            <ul>
                  <li><a>Home</a></li>
                  <li><a>Browse by Genre</a></li>       
                  <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
                  <li><a href="<?php echo esc_url(site_url('/wishlist'));?>">Wishlist</a></li>
            </ul>
            <ul>
                  <li>About Us</li>
                  <li>Privacy Policy</li>
                  <li><a>For Authors</a></li>
                  <li><a href="<?php echo esc_url(site_url('/member-authors')) ?>">Our Author</a></li>
                  <li><a>Our Workers</a></li>    
            </ul>
      </div>
      <p>Copyright 2022</p>
</footer>

<div class="menu-overlay">
  <i class="fa fa-window-close menu-overlay__close" aria-hidden="true"></i>
  <ul class="menu-overlay-list">
    <li><a>Home</a></li>
    <li><a>Browse by Genre</a></li>       
    <li><a href="<?php echo esc_url(get_post_type_archive_link('curations')) ?>">Curated Bookshelves</a></li>
    <li><a href="<?php echo esc_url(site_url('/wishlist'));?>">Wishlist</a></li>
    <li><a>About Us</a></li>
    <li><a>For Authors</a></li>
  </ul>
</div>



<?php wp_footer(); ?>
</body>
</html>