<footer class="footer--main">
      <img src="<?php echo get_theme_file_uri('/images/yellow-logo.jpg'); ?>" alt="Funky letters spell out Trunk of My Car over a yellow background" id="footer-logo" />
      <div class="footer-list">
            <ul>                 
                  <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
                  <?php if (is_user_logged_in()){                        
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                        <!-- <li><a href="<?php echo esc_url(site_url('/my-events'));?>">My Events</a></li> -->
                        <li><a href="<?php echo esc_url(site_url('/my-isbn-registrations'));?>">My ISBN Registrations</a></li>
                        <li><a href="<?php echo esc_url(site_url('/my-account/orders'));?>">My Orders</a></li>
                        <li><a href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a></li>
                  <?php } else {
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">Login/Register</a></li>
                  <?php }                  
                  ?>
                  <li class="privacy-policy-li"><a href="<?php echo esc_url(site_url('/privacy'));?>">Privacy Policy</a></li>
                  <li><a href="<?php echo esc_url(site_url('/terms-and-conditions'));?>">Terms and Conditions</a></li>
                  <li><a href="<?php echo esc_url(site_url('/contact'));?>">Contact Us</a></li>
                  <li><a href="<?php echo esc_url(site_url('/faq'));?>">FAQ</a></li> 
            </ul>
      </div>
      <div id="kofi-link">
            <a href="https://ko-fi.com/trunkofcarcoop" target="_blank">Buy Us a Coffee!</a>
      </div>
      <div id="social-links">
            <a href="https://www.threads.net/@trunkofcarcoop" target="_blank"><img src="<?php echo get_theme_file_uri('/images/threads-icon.svg'); ?>" alt="threads logo" /></a>
            <a href="https://www.facebook.com/trunkofmycarcoop" target="_blank"><img src="<?php echo get_theme_file_uri('/images/fb-icon.svg'); ?>" alt="facebook logo" /></a>
            <a href="https://www.instagram.com/trunkofcarcoop/" target="_blank"><img src="<?php echo get_theme_file_uri('/images/ig-icon.svg'); ?>" alt="instagram logo" /></a>
      </div>
</footer>

<div class="menu-overlay">
  <i class="fa fa-window-close menu-overlay__close" aria-label="close overlay"></i>
  <nav aria-label="mobile navigation bar">
      <ul class="menu-overlay-list">
            <li><a href="<?php echo esc_url(site_url('/shop'));?>">Shop</a></li>
            <li><a href="<?php echo esc_url(site_url('/browse-by-genre'));?>">Browse Genres</a></li>
            <?php if (is_user_logged_in()){
                  ?><li><a href="<?php echo esc_url(site_url('/my-bookshelves')); ?>">My Bookshelves</a></li>
                  <?php $user = wp_get_current_user();
                  // $tomc_user = get_userdata(get_current_user_id());
                  $user = wp_get_current_user();
                  $tomc_user = get_userdata($user->ID);
                  $tomc_username = $tomc_user->user_login;
                  ?><li><a href="<?php echo esc_url(site_url('/members') . '/' . str_replace(' ', '-', $tomc_username)); ?>">My Profile</a></li>
                  <?php if (in_array( 'creator-member', (array) $user->roles )){
                        ?><li><a href="<?php echo esc_url(site_url('/dashboard'));?>">Creator Dashboard</a></li>
                        <li><a href="<?php echo esc_url(site_url('/dashboard/edit-product'));?>">Add a Product</a></li>
                  <?php } else if (in_array( 'dc_vendor', (array) $user->roles )){
                        ?><li><a href="<?php echo esc_url(site_url('/dashboard'));?>">Vendor Dashboard</a></li>
                        <li><a href="<?php echo esc_url(site_url('/dashboard/edit-product'));?>">Add a Product</a></li>
                  <?php }
            } else {
                  ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">Login/Register</a></li>
            <?php }
      ?></ul>
      <ul class="menu-overlay-list-1">
            <?php if (is_user_logged_in()){
                  // $tomc_user = get_userdata(get_current_user_id());
                  $user = wp_get_current_user();
                  $tomc_user = get_userdata($user->ID);
                  $tomc_username = $tomc_user->user_login;
                  if (in_array( 'dc_vendor', (array) $user->roles )){
                        ?><a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add Book Info</a>
                        <li><a href="<?php echo esc_url(site_url('/my-books'));?>">Edit Book Info</a></li>
                        <li><a href="<?php echo esc_url(site_url('/creator-resources'));?>">Creator Resources</a></li>
                  <?php }
                  ?><li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Book Downloads</a></li>
            <?php } ?>          
            <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
            <li><a href="<?php echo esc_url(site_url('/services'));?>">Creative Services</a></li>
            <?php if (is_user_logged_in()){ ?><li><a href="<?php echo esc_url(site_url('/discussions')); ?>">Discussions</a></li><?php } ?>
            <!-- <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li> -->
      </ul>
  </nav>
</div>

<div class="search-overlay" id="tomc-search-overlay">
      <div class="search-overlay__top">
            <div class="overlay-main-container"> 
                  <i class="fa fa-window-close search-overlay__close" aria-label="close overlay"></i>
                  <div class="overlay-input-container">
                        <!-- <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i> -->
                        <input type="text" class="search-term" id = "search-term">                  
                        <button class="medium-purple-button" id="tomc-search--roll-results">let's roll!</button>
                  </div>                  
                  <div id="search-overlay__options">
                        <p class="centered-text" id="search-overlay__filter-out-warnings">filter out triggering books</p>
                        <p class="centered-text search-overlay__filter-languages" id="search-overlay__filter-languages">filter books by language</p>
                        <i id="search-overlay__toggle-filters-section" class="fa fa-caret-up hidden" aria-label="hide the filter section"></i>
                  </div>
                  <div id="search-overlay__filters-section" class="hidden">
                        <div class="hidden" id="search-overlay__warnings-section">
                              <h1 class="centered-text small-heading">Content Warnings</h1>
                              <p class="centered-text">Select any triggers you want to avoid. We'll exclude books that have been tagged with corresponding content warnings from your search results.</p>
                              <div id="search-overlay--triggers-container" class="tomc-book-organization--options-container">
                              </div>
                        </div>
                        <div class="hidden" id="search-overlay__languages-section">
                              <h1 class="centered-text small-heading">Languages</h1>
                              <p class="centered-text">Select any languages you read</p>
                              <div id="search-overlay--languages-container" class="tomc-book-organization--options-container">
                              </div>
                              <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-languages-selected">
                                    <p>Choose as least one language, or <span class="search-overlay__filter-languages">include all languages</span>.</p>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-search-term">
            <p>Enter a search term with at least 3 letters.</p>
      </div>
      <div class="container">
            <div id="search-overlay__results">
            </div>
      </div>
</div>
<div class="tomc-settings-overlay">
      <div class="orange-translucent-background">
            <div class="overlay-main-container"> 
            <i class="fa fa-window-close search-overlay__close" aria-label="close overlay"></i>
            <br>
            <h1 class="centered-text">My Settings</h1>
            </div>
      </div>
      <div class="settings-overlay--section">
            <h2 class="centered-text">My Triggers</h2>
            <p class="centered-text">Select triggers you want to avoid and we won't include books that have been tagged with them in your search results.</p>
            <div id="settings-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
            <!-- L<a href="#"><p class="centered-text">suggest a new trigger warning</p></a> -->
            <p class="centered-text" style="display:none;" id="tomc-reader-settings-trigger-settings-saved-message">settings saved</p>
            <button class="purple-button" id="tomc-reader-settings--save-trigger-settings">save trigger settings</button>
      </div>
      <div class="settings-overlay--section">
            <h2 class="centered-text">Languages I Read</h2>
            <p class="centered-text">Select languages you read and we'll include books tagged with them in your search results.</p>
            <div id="settings-overlay--languages-container" class="tomc-book-organization--options-container"></div>
            <p class="centered-text" style="display:none;" id="tomc-reader-settings-language-settings-saved-message">settings saved</p>
            <button class="purple-button" id="tomc-reader-settings--save-language-settings">save language settings</button>
      </div>
</div>


<?php wp_footer(); ?>
</body>
</html>