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

<div class="search-overlay">
  <div class="search-overlay__top">
    <div class="container">
      <i class="fa fa-search search-overlay__icon" aria-hidden = "true"></i>
      <input type="text" class="search-term" placeholder = "What are you looking for?" id = "search-term">
      <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
    </div>
  </div>

  <div class="containter">
    <div id="search-overlay__results">
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>