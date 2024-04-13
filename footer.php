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
                        <li><a href="<?php echo esc_url(site_url('/my-books'));?>">Books By Me</a></li>
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

<div class="search-overlay" id="tomc-search-overlay">
      <div class="search-overlay__top">
            <div class="overlay-main-container"> 
            <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
            <div class="overlay-input-container">
            <i class="fa fa-search search-overlay__icon" aria-hidden = "true"></i>
            <input type="text" class="search-term" id = "search-term">
            </div>
            </div>
      </div>
      <div class="container">
            <div id="search-overlay__results">
                  <h1 class="centered-text small-heading">Content Warnings</h1>
                  <p class="centered-text">Select any triggers you want to avoid. We'll exclude books that have been tagged with corresponding content warnings from your search results.</p>
                  <div id="search-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
                  <h1 class="centered-text small-heading">Languages</h1>
                  <p class="centered-text">Select any languages you read</p>
                  <div id="search-overlay--languages-container" class="tomc-book-organization--options-container"></div>
                  <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-languages-selected">
                        <p>Choose as least one language to ensure your book shows up in search results.</p>
                  </div>
                  <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-search-term">
                        <p>Enter a search term.</p>
                  </div>
            </div>
            <button class="purple-button" id="tomc-search--roll-results">let's roll!</button>
      </div>
</div>
<div class="tomc-settings-overlay">
      <div class="orange-translucent-background">
            <div class="overlay-main-container"> 
            <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
            <br>
            <h1 class="centered-text">My Settings</h1>
            </div>
      </div>
      <div class="settings-overlay--section">
            <h2 class="centered-text">My Triggers</h2>
            <p class="centered-text">Select triggers you want to avoid and we won't include books that have been tagged with them in your search results.</p>
            <div id="settings-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
            <a href="#"><p class="centered-text">suggest a new trigger warning</p></a>
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