<footer class="footer--main">
      <picture>
            <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/yellow-logo.webp'); ?>" alt="Funky letters spell out Trunk of My Car over a yellow background" id="footer-logo">
            <img src="<?php echo get_theme_file_uri('/images/yellow-logo.jpg'); ?>" alt="Funky letters spell out Trunk of My Car over a yellow background" id="footer-logo" />
      </picture>
      <div class="footer-list">
            <ul>                 
                  <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
                  <li><a href="<?php echo esc_url(site_url('/blog'));?>">All Blog Posts</a></li>
                  <?php if (is_user_logged_in()){                        
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">My Account</a></li>
                        <!-- <li><a href="<?php echo esc_url(site_url('/my-events'));?>">My Events</a></li> -->
                        <li><a href="<?php echo esc_url(site_url('/my-account/orders'));?>">My Orders</a></li>
                        <li><a href="<?php echo esc_url(site_url('/my-isbn-registrations'));?>">My ISBN Registrations</a></li>
                        <?php $user = wp_get_current_user();
                        if (in_array( 'creator-member', (array) $user->roles ) ||  in_array( 'administrator', (array) $user->roles )){                              
                              ?>
                              <li><a href="<?php echo esc_url(site_url('/my-blog-posts'));?>">My Blog Posts</a></li>
                              <li><a href="<?php echo esc_url(site_url('/creator-resources'));?>">Creator Resources</a></li>
                        <?php } else {
                              ?><li><a href="<?php echo esc_url(site_url('/creator-roadmap'));?>" target="_blank">Creator Roadmap</a></li>
                        <?php }
                        ?><li><a href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a></li>
                  <?php } else {
                        ?><li><a href="<?php echo esc_url(site_url('/my-account'));?>">Login/Register</a></li>
                  <?php }                  
                  ?>
                  <li class="privacy-policy-li"><a href="<?php echo esc_url(site_url('/privacy'));?>">Privacy Policy</a></li>
                  <li><a href="<?php echo esc_url(site_url('/terms-and-conditions'));?>">Terms and Conditions</a></li>
                  <li><a href="<?php echo esc_url(site_url('/contact'));?>">Contact Us</a></li>
                  <li><a href="<?php echo esc_url(site_url() . '#tomc-newsletter-signup-form'); ?>">Newsletter Signup</a></li>
                  <li><a href="<?php echo esc_url(site_url('/faq'));?>">FAQ</a></li> 
            </ul>
      </div>
      <div id="kofi-link">
            <a href="https://ko-fi.com/trunkofcarcoop" target="_blank">Buy Us a Coffee!</a>
      </div>
      <div id="social-links">
            <picture>
                  <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/bluesky_icon.webp'); ?>"  alt="bluesky logo">
                  <img src="<?php echo get_theme_file_uri('/images/bluesky_icon.jpg'); ?>" alt="bluesky logo" />
            </picture>
      </div>
</footer>

<div class="menu-overlay">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30" class="menu-overlay__close">
            <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABW9JREFUWEfNmHtQVHUUx78/nooPWNAUE9YkR4G1MLV8YCqChCPKNCrTlGmkTVGjBE1UE6DEpJOK7xyTGaGaibQZYYVJVEhD1IjQZEPRQF45kDwUAXnurzkX94bLwt673HH4/bOzu+fxuef8fud3zmUY4ov15rtXUeyvh341B5/MGGyfJDvnrBuMlzPO0pzVmpMG3yJgQ4UuGgzbnyRUv74Ytju7aT6l/wXAxmqdD9fzAoBZDwlAAmPWi1RunucFwPpKXTID1g0VOOLgQJaLu+YVAbChQlcOBrUpwM62dpRdvoLR48bA1fNZxZ6hvaUVpRf/gKvnFKgmju9jl3Ne66KePv4RYFEpGJtsynvOwRSUXioEYwwBEW9DPXP6oCHpobVb96Ch6g5s7OywesdnGOmieswu52hyUWsczQL+/NUhVF+7ISiTseCYTRjzjJvFkFyvR9bOb1B17XqPDcawals0VBNdLQNsqb+HtLhdaL3XJBhwcBqNkK1RGOHiZBFkXvJxFJ+9IOrOXrMcPisCTKRYYgRJs668GhkJ+0CpoeXsPgErYiNgO8xeFqTu1Dlc+v6EqDPNbx4WhIWatCE5xQbtqqvFyEo8AkoRLTcfLwRGbgSzspIEWVGow5ndSeCcC/LuPt5YGrmhX33ZgGT0enYeLhw9JgJ5ByzAvHWrzALWl1dD+8VedLV3CLK0h4M/3wQbe7t+dS0CJGv5qVr8mZEtGp679lVoAhf266il8T7SY3eBPmmNGuuMlVsiMdxx1IAPZjEgOEf2gRSU/Xal5xBaWWHphxvgPsO7j0OKGEWOIkjLfqSDsHedJowzG3XLAQF0d3Yi88uDqL11W3BEhyU4ZjNc1E+Ljmmvnd6dhMpCnfCbta0Nln3yPsZPNVlu+wAPCpCstTW3QLtlN+7X3BWMj3B2QsjWSDioHIXvdFrp1PaEmWHJB+sx+SUfs5EzCAwakAw11dYhfUsi2h609Gz+SROFSN7MzQfVO8Oa83oIpgctlgxHgooAkiFKM6Wb0k5rrIcadberxHJEB4gOktylGCA5vp1/FWf3JwuP3XtNmvUc/DeHCfe43KUoIDm/mPIT/jqTK3LQlRiaGAsbO8sac0UBG6troI3fg47Wh48F6sXQYDwf7C83eIK8YoDURKTHJaK5vlE8sWKqGYNf+Fp4zJ0pG1IRQGoeTibsEwsx1brAqHdQeCILNSWlAhT9FhQdDtdpHrIgBw2o79bj9K7H+zq/8DfhMfcFtDe3Il2okf8KUPYjHLAiTtoNolgdzE1KxY1zl8SoGO834xop9Q5WBPBK+mkUHM8U4Tz95sM3bE2fFNbeLEPmNqqRXcJ/UrqYQQP+nVeAXw59J8KY6wtpnsn5+luxRprrAwcFeKf4FmhG0Xd190Tk0dU2UF9Hcle1Z/D7sYz/I75kPnzf6hvx3imQfUiMax1NYSupOXAaLel0/nrkB5Scv9zvnjU2IgvQuNbZOQwX+jpT82x/tPrubpzacRj/6ErEejlQjZQMaFzrrKytERT9HiZ4TZEUud5CdNPQjUPZMFcjJQOe2nkYNDAZ1qJ338AU39my4QwKzXUNSItLxMP7D8QaGRIfJby5kL0HqUxo4/eKerNWLcOMkECL4QyKd8sqkZGwH10dPUPU1IVz8PLG1+QDUkp+/CgBbU3NkDrBSaWnMTTnQIoAOX/9anj5+8oHJA1qRJvrGuHo+pRU35Ll6ME72zuESW/gU1xZlAow0yO+ZHfKChq9fitaDsbE167KurLMGgMLU7l7HxV78cZKXQwH4i0zp7AWxw5nteZjsmr0Er0oQA9EcDA/xjBMYbdmzXHOz1oxtl/lrtEahOVPM2bdKCvwHxDIx0eoA76hAAAAAElFTkSuQmCC" x="0" y="0" width="30" height="30" alt="X close button" />
      </svg>
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
                  <?php }
                  ?><li><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Book Downloads</a></li>
            <?php } ?>          
            <li><a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a></li>
            <li><a href="<?php echo esc_url(site_url('/services'));?>">Creative Services</a></li>
            <?php $user = wp_get_current_user();
            if ((in_array( 'reader-member', (array) $user->roles )) || (in_array( 'creator-member', (array) $user->roles ))){
            ?><li><a href="<?php echo esc_url(site_url('/discussions')); ?>">Spaces</a></li>
            <?php } else {
            ?><li><a href="<?php echo esc_url(site_url('/forums/forum/general/'));?>">Spaces</a></li>
            <?php } ?>
            <!-- <li><a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Events</a></li> -->
      </ul>
  </nav>
</div>

<div class="search-overlay" id="tomc-search-overlay">
      <div class="search-overlay__top">
            <div class="overlay-main-container"> 
                  <!-- <i class="fa fa-window-close search-overlay__close" aria-label="close overlay"></i> -->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30" class="search-overlay__close">
                        <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABWVJREFUWEfNmHtQ1FUUx7+/H08BRRTDMTABETXGhMxEBZTl5UiLzqRhY2EN5pj5ABSyIRBtGmiC1IqaMCUtGZRpUBoNZbd4+MhHUKZoiPkg0RRBVAwEbnN+Kz9h2XV/v90d2/PPzu7ee87nnnPvuedcDhYuXG++zKCwSJ5nC1k3AsGBf7LsjFiO8YzfuaaybE+PbREwK0SRB4b4Jwul11phSoUqlv4VAD8KDo1g4EotBE7A4Dj2anK5ukAAzAoK2w6OvWZJgIyxk+9WqidpAIMVfwLw0QVoY28Hryn+aL1+E4215822BjtHB3hPfR6NtXVobrimS29LSoXKRQMYojgPBm9do0KXxcE7MACMMRzc+DUunTxlMiQtWpm+CkM8RqCzowO713yIu03NffRyQGtyhcrZIOCs5KVwnzBWmEzKSjZsxs2/rhgNyfE8Ile/BY8J4zQ6GEPR2iw0NzQaB+g4dDDmZCTBYfAgQUFbSyuK07Nxr6nFKMhpi+ZhfNh0ce7xXT+gZu/Bfroke5Bmuo5yR3TqClBoSG5dvoq96zfiwb/tsiD9omYgcOFccc5Z9WFUbi3UqUMWIGnwmDgekYmLQSEiuVJzBqU5eWDd3ZIgRwb4ISIhHhynSb2Xa07jQM4WvfNlA5LScYppmP7GfBHo9MFKHP6myCDg0FHuUL6/EtZ2tsJY2sMlH2xGZ3uH3rlGAZK2ybFKPBetEBUf2fE9/igt12vI0cUZMeuTQJ8kd27cwp51Obh/+85jF2Y0IDgOinfi4PWiv+YQdnfjwCdbcLn6dD+D5DHyHHmQpP1um7B3W65eN+h14wEBWNnYYPZ7y+Dm4ykYosNSsmETmi79LRqmvRaeEI9nAvyE37oedGJf5ue4du6CQTgaYBIgKbB3coRyXQKchw8TDN671YLi9By0Nd8WvtNppVOrcTOD6rN8XPilRhKcWQBJySA3V8SsS4T9QEfB8M2LDYInxwRNBuW7Hjn6XTFO7f9JMpzZAEkRhZnCTWEnuVF/Ca6eHmI6ogNEB0mumBzi3gY9J09E2PJFVCP14bh44neUbdoq3ONyxayAZHxq3Mt4NjxI5KArsTBxPTo7HshlE8abFdDFfTiUaatg6zCgD8yxwhL8VlL2/wJSERGTkQinoS7iiRVDzRjUuTtQf+SkbEizeJCKh5dSV4iJmHJdafZXCJgbieG+mvKSftuflYvGs/WyIE0G5K14RCT1revUudtRf+RX2Dk5IEbIkU8JUO332rA3Q9oN0rMKkwGD4mMxdkag6BXt/aadI6XewWYB9I+JwKR5s0W4WvUhVG3d1S+EbmO8MHst5Uhr4T8pVYzJgKOnTcLMpY8aQEN1IfUzoW+/LuZIQ3WgSYAjxvuAehTe2krjkYdX2+PqOho3URmOF+ZHP/K46hCqtvX3eO8QyN6D2rmOurA9VBy0tEo6ncGLF8A3ZIrePautRBagdq7raLsv1HV6+lmdwLyVFaLWLMHTfr5ivnxcjpQMqJ3ruru6sD/rC1w9UyfJc70H0U1DNw5Fw1COlAwYtXqJ0DD1yM9ffou6quOy4XomOLkOwZyMRAxwHijmyOK0bOHlQvYepDShTFspzjtRtA/Vxaa/MQ3zGono1OWwttU0UefKj6Iir0A+IIXklY9TYT/ICVI7OKmupTaUehuCPJS/G2fKqvQDZgYr6jnAS5dyKkSdXF1wu/EfqbYlj6OF29jZCp2eoVNcAAbhwdCCpDqlQhXw8PltphLgxWdXi4Dk2Jsp5eptj56Ag8J2gmMLLAKO4ceUStUsYtF6RFfE8hwSGdhogHvCj+iCa+o5xj5NrlTn9ziqb5djEe7rC/EfEN2XR0giN+8AAAAASUVORK5CYII=" x="0" y="0" width="30" height="30" alt="X close icon" />
                  </svg>
                  <div class="overlay-input-container flex-text">
                        <!-- <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i> -->
                        <input type="text" class="search-term" id="search-term" aria-label="search term">                  
                        <button class="medium-purple-button" id="tomc-search--roll-results">let's roll!</button>
                  </div>                  
                  <div id="search-overlay__options">
                        <p class="centered-text" id="search-overlay__filter-out-warnings">filter out triggers</p>
                        <p class="centered-text search-overlay__filter-languages" id="search-overlay__filter-languages">filter books by language</p>
                        <!-- <i id="search-overlay__toggle-filters-section" class="fa fa-caret-up hidden" aria-label="hide the filter section"></i> -->
                        <img src="<?php echo get_theme_file_uri('/images/up-arrow.svg'); ?>" alt="up arrow" id="search-overlay__toggle-filters-section__up" class="hidden" />
                        <img src="<?php echo get_theme_file_uri('/images/down-arrow.svg'); ?>" alt="down arrow" id="search-overlay__toggle-filters-section__down" class="hidden" />
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
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30" class="search-overlay__close">
                  <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABWVJREFUWEfNmHtQ1FUUx7+/H08BRRTDMTABETXGhMxEBZTl5UiLzqRhY2EN5pj5ABSyIRBtGmiC1IqaMCUtGZRpUBoNZbd4+MhHUKZoiPkg0RRBVAwEbnN+Kz9h2XV/v90d2/PPzu7ee87nnnPvuedcDhYuXG++zKCwSJ5nC1k3AsGBf7LsjFiO8YzfuaaybE+PbREwK0SRB4b4Jwul11phSoUqlv4VAD8KDo1g4EotBE7A4Dj2anK5ukAAzAoK2w6OvWZJgIyxk+9WqidpAIMVfwLw0QVoY28Hryn+aL1+E4215822BjtHB3hPfR6NtXVobrimS29LSoXKRQMYojgPBm9do0KXxcE7MACMMRzc+DUunTxlMiQtWpm+CkM8RqCzowO713yIu03NffRyQGtyhcrZIOCs5KVwnzBWmEzKSjZsxs2/rhgNyfE8Ile/BY8J4zQ6GEPR2iw0NzQaB+g4dDDmZCTBYfAgQUFbSyuK07Nxr6nFKMhpi+ZhfNh0ce7xXT+gZu/Bfroke5Bmuo5yR3TqClBoSG5dvoq96zfiwb/tsiD9omYgcOFccc5Z9WFUbi3UqUMWIGnwmDgekYmLQSEiuVJzBqU5eWDd3ZIgRwb4ISIhHhynSb2Xa07jQM4WvfNlA5LScYppmP7GfBHo9MFKHP6myCDg0FHuUL6/EtZ2tsJY2sMlH2xGZ3uH3rlGAZK2ybFKPBetEBUf2fE9/igt12vI0cUZMeuTQJ8kd27cwp51Obh/+85jF2Y0IDgOinfi4PWiv+YQdnfjwCdbcLn6dD+D5DHyHHmQpP1um7B3W65eN+h14wEBWNnYYPZ7y+Dm4ykYosNSsmETmi79LRqmvRaeEI9nAvyE37oedGJf5ue4du6CQTgaYBIgKbB3coRyXQKchw8TDN671YLi9By0Nd8WvtNppVOrcTOD6rN8XPilRhKcWQBJySA3V8SsS4T9QEfB8M2LDYInxwRNBuW7Hjn6XTFO7f9JMpzZAEkRhZnCTWEnuVF/Ca6eHmI6ogNEB0mumBzi3gY9J09E2PJFVCP14bh44neUbdoq3ONyxayAZHxq3Mt4NjxI5KArsTBxPTo7HshlE8abFdDFfTiUaatg6zCgD8yxwhL8VlL2/wJSERGTkQinoS7iiRVDzRjUuTtQf+SkbEizeJCKh5dSV4iJmHJdafZXCJgbieG+mvKSftuflYvGs/WyIE0G5K14RCT1revUudtRf+RX2Dk5IEbIkU8JUO332rA3Q9oN0rMKkwGD4mMxdkag6BXt/aadI6XewWYB9I+JwKR5s0W4WvUhVG3d1S+EbmO8MHst5Uhr4T8pVYzJgKOnTcLMpY8aQEN1IfUzoW+/LuZIQ3WgSYAjxvuAehTe2krjkYdX2+PqOho3URmOF+ZHP/K46hCqtvX3eO8QyN6D2rmOurA9VBy0tEo6ncGLF8A3ZIrePautRBagdq7raLsv1HV6+lmdwLyVFaLWLMHTfr5ivnxcjpQMqJ3ruru6sD/rC1w9UyfJc70H0U1DNw5Fw1COlAwYtXqJ0DD1yM9ffou6quOy4XomOLkOwZyMRAxwHijmyOK0bOHlQvYepDShTFspzjtRtA/Vxaa/MQ3zGono1OWwttU0UefKj6Iir0A+IIXklY9TYT/ICVI7OKmupTaUehuCPJS/G2fKqvQDZgYr6jnAS5dyKkSdXF1wu/EfqbYlj6OF29jZCp2eoVNcAAbhwdCCpDqlQhXw8PltphLgxWdXi4Dk2Jsp5eptj56Ag8J2gmMLLAKO4ceUStUsYtF6RFfE8hwSGdhogHvCj+iCa+o5xj5NrlTn9ziqb5djEe7rC/EfEN2XR0giN+8AAAAASUVORK5CYII=" x="0" y="0" width="30" height="30" alt="X close icon" />
            </svg>
            <br>
            <h1 class="centered-text">My Settings</h1>
            </div>
      </div>
      <div class="settings-overlay--section">
            <h2 class="centered-text">My Triggers</h2>
            <p class="centered-text">Select triggers you want to avoid and we won't include books that have been tagged with them in your search results.</p>
            <div id="settings-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
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