<! DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name = "viewport" content = "width=device-width", initial-scale=1>
    <meta property="og:image" content="<?php echo get_theme_file_uri('/images/screenshot.png'); ?>" />
    <meta name="twitter:image" content="<?php echo get_theme_file_uri('/images/screenshot.png'); ?>">
    <title><?php
            if (is_front_page()) {
                echo 'Home | ';
                bloginfo('name');
            }
            else {
                wp_title(' | ', true, 'right');
                bloginfo('name');
            }
        ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header--top">
  <div class="top-nav-container">
    <span class="site-header__menu-trigger" tabindex="-1">
      <!-- <i aria-label="close overlay"></i> -->
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="40" viewBox="0 0 40 40">
        <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAS9JREFUWEftVjsKwkAQfROwtPLTqRfQygt4ibRW4sWsxEt4AO0sxUJL0cZOMCOjbkxkA4sTwcAshG3mzee94W0If37oz/uDNahVyBg0BrUMaPHpDvJqVcPwwsCRgTghIvYlZ2YCFhHQIqzr7x0e7hIgZiJKippi5ghYRnmc1BxJPS8uLXDeb67Aw3bki163t0cAkkwGyA7hMHIXHcE5rItx9VJcwjxu9gYzCcg26GVMK9E3+Mo2eEmn5Zd0lJNQBH3vHHleoSKcJHbYAByDp43uYJ6T+HTYTL6R4xeYG7Bsd/rbXIO/KFRGTnvqtCyaUX8waEatXakgfNFLYkYdRB8AM+pQpkLiqvOS2B/1U08z6pC9VseYUWspNKPWMpjFV8eoy5y6zFzGoJZNY1DL4B0/K/Ypsaft3wAAAABJRU5ErkJggg==" x="0" y="0" width="30" height="40" alt="mobile menu icon" />
      </svg>
    </span>
    <a href="<?php echo esc_url(site_url()) ?>">
      <picture>
        <source type="image/webp" srcset="<?php echo get_theme_file_uri('/images/logo.webp'); ?>"  alt="Trunk of My Car Cooperative" class="logo-image" >
        <img src="<?php echo get_theme_file_uri('/images/logo.jpg'); ?>" alt="Trunk of My Car Cooperative" class="logo-image" />
      </picture>
    </a>
    <div class="top-nav-section" id="top-nav-right">
      <span class="js-search-trigger tomc-icon-span">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="30" viewBox="0 0 30 30">
          <image xlink:href="data:image/png;base64,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" x="0" y="0" width="25" height="25" alt="magnifying glass search icon" />
        </svg>
      </span>
      <?php if (is_user_logged_in()){ ?>
        <span class="js-settings-trigger tomc-icon-span">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30">
            <image xlink:href="data:image/png;base64,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" x="0" y="0" width="30" height="30" alt="settings gear icon" />
          </svg>
        </span>
      <?php } ?>
      <a class="tomc-icon-span tomc-cart-icon" href="<?php echo wc_get_cart_url(); ?>" aria-label="shopping cart">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" viewBox="0 0 30 30">
          <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABJdJREFUWEfF2E+oFVUYAPDzZ+Y7M3OvvTdjKfLembAszT9laYGLFkISLawWBS0KAoMWbYIWboJoXwtBwYhaCAUVuCgIiQqKMrTneygmomI5oz40m7m+e+fPOfPnxAui68V7u7455Vl/832/e75zzj0zGGkaauHS2qKq9yGFtiGMziGE3wV3+kDT9LhpgsXnVeeCWyhyBiO016B4r6zxE1hV+7GiO01v6ocmNbQAZRy+jxAi4PJdf2NEFL6IEHoT3OmNGONyqcjGQBXHk4XqXTIp4niCR/0QGYfHMUG7zQl+6LYBZSfcpZR6hrn+04OIohPuVko9AK7/8m0Dijj8DGN0CCb5B4MI0Z3fgIria+b5q24bUMbhNYTIDnCn5gYRSilSdMLcVHQN9qaCpSAbrUHVnb+rKMt5c3LaGrYRZBzMEEXfNrypL/53oOxc3qLq6iDz+N3Disso+ARhfBhcvuc/A/61lsry+cECGKE1SqntCOPFY+amAyv0JEKqVBh/MxgABH2EJ/jZUfCxWizji+/UqHpJ1SrrT4YxMQnGTlVX14cVIZgAxphVddXtj6GE2gqh/czlb2kAhnvKQm7L8+zR/mRgslnDMFCaJY8MKwLMmqXUUFna29IfY9nOEUrN75jHdzcHdi7uK4XYmovssf5kjtOeQwSvSHvdqWFFbKc9Qynhvd7CSqT+iWK2c8Q0jB/B9d9oDozC94pCbhYDQGbZs4QaLEu6G4YVWYyhlDppkqxDfUKL2UcNgJ/A5a83B8bBh0UhN4k837qUnXizZyzbPmqYbAYmp1/TAAwPFEKsFzK/YR01wVpg/2wAzIHHX20OjMKPZZGvlUIM3Qy3imWWNWOa7Di4/JXGQBEFnxaFXCNF/vCtQobubrCOAYOT/3aRGOscFHF4sJD5ainEZl1ABtYxk7HT4PLFe+PQMSYw+LwQwpdSPKQLCIzNgsnOgue/0BwYhV8KkU+XhdikEThngnWeufy5xkAZB18JIVYVUmzUBTQBjgOzfmOu/6wGYPityLOVRSHX6wICWCdMxgLm8p0agMH3IksX737rdAENA04yy77IPP5Uc2AUHs6zdHlZFffrAprAfmGMzYPr72gOjMOjeZZMlmV5ny4gmHAKLPsquHy7DuBsnqV3lGVxry6gacBpZlnXwPMfbw6MwhN5nrTLslytC2gY5hnLciLw+LbGQBEFp7IsadVV5WsDmuY5y3JicPkNd8zB/GP+k4Rnsiyx67Kc1gWkhvGrbbc64PKRF5AxgcH5PEmsqq6W/AI++MMoNS7YdmsBPP6ghhaHQZb2WF1XK/TNoBlalt1jnj/y8B9vBqPgcpr2QNX1cm1AQi9brXbCXD7ybB0LKOPwapp0zbquJ7UBKbliOe2Uuf49jVss4yBKk65R12qZLiAhxu+208pGfZVYrDXeDEbhQpIsUKWUow1ISWTb7Zx5/tBX1lsBpmnSJbWqmS4gJfS63WoLcPlKHS2WSdIjqq6pLiAhpOe0lklw+ciNN16L47BKegtEqb5PAw2lBJPcabUleP6EhhkMryCEtJ2BfaA/wOV3jgL+CSy8A0c1l5UFAAAAAElFTkSuQmCC" x="0" y="0" width="30" height="30"/>
        </svg>
      </a>
    </div>
  </div>
</header>
<div class="header--main">      
  <nav class="main-nav" aria-label="main navigation bar top row">  
    <div class="nav-container site-header__menu group">    
      <a href="<?php echo esc_url(site_url('/shop'));?>">Shop</a>
      <a href="<?php echo esc_url(site_url('/browse-by-genre'));?>">Genres</a> 
      <?php if (is_user_logged_in()){ 
        ?><a href="<?php echo esc_url(site_url('/my-bookshelves')); ?>">My Bookshelves</a>
        <a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Book Downloads</a>
        <?php $user = wp_get_current_user();
        if (in_array( 'dc_vendor', (array) $user->roles )){
          ?><a href="<?php echo esc_url(site_url('/add-a-book'));?>">Add Book Info</a>
          <a href="<?php echo esc_url(site_url('/my-books'));?>">Edit Book Info</a>
        <?php }
      } else {
        ?><a href="<?php echo esc_url(site_url('/my-account'));?>">Login/Register</a>
      <?php }
    ?></div>
  </nav>
</div>
<div class="header--sub">      
  <nav class="main-nav" aria-label="main navigation bar bottom row">  
    <div class="nav-container site-header__menu group">   
      <a href="<?php echo esc_url(site_url('/coop'));?>">The Co-op</a>
      <a href="<?php echo esc_url(site_url('/services'));?>">Services</a>
      <?php if (is_user_logged_in()){
        $tomc_user = get_userdata($user->ID);
        $tomc_username = $tomc_user->user_login;
        ?><a href="<?php echo esc_url(site_url('/members') . '/' . str_replace(' ', '-', $tomc_username)); ?>">My Profile</a>
        <?php $user = wp_get_current_user();
        if ((in_array( 'reader-member', (array) $user->roles )) || (in_array( 'creator-member', (array) $user->roles )) || (in_array( 'administrator', (array) $user->roles ))){
          ?><a href="<?php echo esc_url(site_url('/discussions')); ?>">Spaces</a>
        <?php } else {
          ?><a href="<?php echo esc_url(site_url('/forums/forum/general/'));?>">Spaces</a>
        <?php }
        if (in_array( 'creator-member', (array) $user->roles )){
          ?><a href="<?php echo esc_url(site_url('/dashboard'));?>">Creator Dashboard</a>
          <a href="<?php echo esc_url(site_url('/dashboard/edit-product'));?>">Add a Product</a>
        <?php } else if (in_array( 'dc_vendor', (array) $user->roles )){
          ?><a href="<?php echo esc_url(site_url('/dashboard'));?>">Vendor Dashboard</a>
          <a href="<?php echo esc_url(site_url('/dashboard/edit-product'));?>">Add a Product</a>
        <?php }
      }
    ?></div>
  </nav>
</div>

