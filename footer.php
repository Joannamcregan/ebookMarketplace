<footer class="footer--main">
      <div class="footer-top">
            <ul>
                  <li>About Us</li>
                  <li>Privacy Policy</li>
            </ul>
            <ul>
                  <li><a href="<?php echo site_url('/member-authors') ?>">Our Author</a></li>
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
    <li><a href="<?php echo get_post_type_archive_link('curations') ?>">Curated Bookshelves</a></li>
    <li><a href="<?php echo site_url('/wishlist');?>">Wishlist</a></li>
    <li><a>About the Co-op</a></li>
    <li><a>For Authors</a></li>
  </ul>
</div>

<div class="search-overlay">
  <div class="search-overlay__top">
    <div class="overlay-main-container"> 
    <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
      <div class="overlay-input-container">
        <i class="fa fa-search search-overlay__icon" aria-hidden = "true"></i>
        <input type="text" class="search-term" placeholder = "What are you looking for?" id = "search-term">
      </div>
    </div>
  </div>

  <div class="container">
    <div id="search-overlay__results">
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>