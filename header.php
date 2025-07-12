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
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->
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
          <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABUJJREFUWEfNmF1sFFUUx/9nugtVKLgzlfDRnW1jjKE7y0dU/CSISNQiKISYmGCCiS++GB8UEzEK8SuRB+OLL76IJj6oWCUqYDCAiSKxBnBnF6NourNQBNnZSosC273HzJZZbreznbslUu7b7v2f//3NmZl7zh3CVT5Ila/Qaz9JTVgK5jtANAPMzQA1AWAwSiAMgHknafxuLD5vn6pvmC4UsJjPPM3MGwDMCTOT5o8KwRta21PdDcQESusCnrLtqU3TeA+BbhnnIgxgn25aS8cZXwkLBBw4YXdeuID9RJg2hrkA4SyYr714q4MzQDg1qVlbMOX6zhPjAR0F6MGVSsgEmJUYvBdMXyHC24w5qbyv6c8duVmQWA3mFSAsCAKJRpFsmWVlG4UcAVg4no5TmQ4DiNUY5aOTtK6WmZ122ALFXPpxJnp7tAd/rJupR8Pia+dHAjr2AQIWySIG3jNM64lGjV0n3Q3QIyO8mDcbidSmRryqgKed9FMa6J0aw01GIrW5EUNZ6zr2hwAe8/9jxp8a8HwsYb2v6lkFdJ20A1BcCtx7uW+g5+XmMx+AeV0VEugxTOvWhgCL+fQaZtomBQ1FtKbktLa5v6oa1dMVfjvchslN3qMzu7JtEIZicSuq6lvJYCGX3klE91+6FbzbSKSWq5qE6dycnQVhrpTFVwzTeiksrnJBw4B2HxFm+QFC8Iut7anXVAxUNAUnvYVAz1a1hF/0uFUFHsujAujm7PMgTPKFVC51xDoW9qosrqIp/mHP5wgOSdp+3bRqt7JAq2FAx/bKkj9KumlVYVUAVDSuYwupcimvEQSofHUqYL6m4NiDBEzxf+umFdqoVJ9BOYMElGL/RwbzdgmMyEVA1k1LU7lAP4PnAEy+FKCldDO8rKks4GlOOukboqCj0ls8aJhWi0r8MGDedsCQNml6QzeTL6gYqGiKx7LPsBBvSdqsblpJlVg/g58DWHXpCrnHMFPKu33YQq5jfwtgcVXH2KInLK8JDh0VwDPH7ZVDZWyX1YKxvjVhbQ11CBG4+exzYPGmJCvz+XK7ceP8YyredWsxM580EqmZKiZjaVwn8y/gnV+q4zvdtO5W9R2zmyFCdyxurVE1q9W5ju110fJFcjSi3dMyu9O75UojvB9ksdVIzFuv5CaJ3Jx9cFR3zTikJ6yFjXgFddReWz5VNiHgd1EurzM65v8QZu7m7LtA+ALAdTXafgAaC37QaE99H+bjz4/azf/q7ZnVpDX3BRgIBn4ixickSh/JtbqY/3kJOPIwQywDMC9wccYZDB/C/iEND8XarD0qkIHlhnt6osUZzd7ZZKyOowxgAMD0eqdDD4CAkyC0MsM75PvjHBNWG3FrZxjkmPXQdewdAB4IM6k/zzZANwEIalCHCLQ2Zia9PbjuCC3YAyeOLCmVypvA8J4tlU5YMPhgBLRxumnt6s9llgniL0eW0irPEINXGGbq63qEoYByoOukXwXRWgBt0reZ4QM80AdQd9/f/LJlWRdGxmUWA7wLwDUBIOdY8LJ6L05DgOO/1UDhWPZ2EmI3pJZL8hsUwL2tpvVj7RpXDNBb+HTeXqQJ7AZhdCfDGBAaLW+NJw/UbHGXk5fGYwu96TtJo28AyOXPNxqVySuaQZ/CzWe7wOXtdT46DQqi+/xMTgigB1p07FUM/rQO5Flmus1IJDMTBuhBur3pFdDoM6B6FJCfmR26aXVNKGAFMmevBLH3oUmuNN5U5fA24YBSJr3PxVIhoNd1M7nxqgCspMurOODuyhbE2E+i1BXrWNh/1QDW27D+A2Cc6TgXE4NUAAAAAElFTkSuQmCC" x="0" y="0" width="30" height="30" alt="magnifying glass search icon"/>
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
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="35" viewBox="0 0 30 30">
          <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAABQ5JREFUWEftmG2IVFUYx//PvXPOrKm7946F5s4dy5eyzKgIDPpghSmGmWURgn0oFBJFeqWiKMPIsMgiDCu/lBChQplUthpGRC8UFuJLux9S7h1Xrbx3drXVO3fmPnFnd3V25uzOzI4DBp5vc+Z5/s/vPOec55xzCRd4owucDzUBnjzW8XWQzc4e/qAIIt60fPTYSe9WqzEkIHenxwQhL0SImSC0+qd7ZgS5oKlacZWdjI84JqX8A8B+DbwrZqY+G0pvUMCsZz8C4A2ATAC/Aeg+j4DtDLYINJGZD2gxbYloTv6oAlUCBl32HA5pB8BvSjP1ZL/jqc72Nbkwv2zYGSQtiOti0Yhxk3ZFGtyTTgY+bwLzTULGr6JRY4+XaisBfdc+AsKvcTN1z7BhqnRkPtGc9f49SIQ2aaYergjIXc6UIEQHCEulYW2sMk5dZr5rbwbh5riZmlgRMOcdmR8i3EYa5ooWa0ddkat09l3ndSI8JQxcQmSdLnYrm2I/k36AmDcTabOF0bqzyhh1mfmus4YIzwoNY6jFci8C1prO/3cGuzo71oX5YDkzi1pH3kh7Tde6hS4WU8Y5eDrkfF3HV6NAdT22h1x7HzcqQL26mqafuAhYTxY1Xf+bMukDXhiGRj1CjfIVUrZRz/GO+4I8vwrmyQDrjQpWiy4zfE3Tfpax2JKzR53v2Z8T6O5ahBpnS49LM/lWpH8OsO88bFzQ6pWL7wHFgIuJsKl6mcZZCtk0nkZednRABrNe+gaAo6u9qq0URu6DrBdbHV2LlBbM34uYtiBL+jgKcr+AMEJh97vQ9TuDPFtA2AbgUoWNK01rTH//gOtW1nOURVsY+kii8T3sdU4IkD+sAiTGcyJhvRb9l/XsnQDNKrUjwjPCsNZG/b7r7CDCHIXWd9K0ZioBfc/pIGBKqZNgbQIlWu2+4GcAipcLn1vYvudsJ2BeqY0Gvrf/FZd1nZ9AmFGmw7xBJlJn3z0DMuh7zqcELCgfOc0SRvKbAqBr7wPRtOEAciw2LT768gO9Ok43CKMVgCtkIrVencGM/QoxPV/mRLRMGskNhakZZBBA5QwKI6kTUVh4b+f5H+VSAW4XpvWtGrDLXkQhfVzueO756bvOWiI8XWsGGXw4bqauLGSvK30LQla+gwWFCTImeGpA15lOhL2lwRm8PW6m5hfEM85SMN6vFRDgndJMFT6bZL30QwB/pMjgX9K0xhb3D1iD0aU1yKTPANCKjZjRHk9YU6O+wHNuY2B37YBYL01rRe8ySa8m8AsKwN3StO4YFLDg7DrRI7oAU9Ty0rRi0W/ucVoDH+lhAD4mTevt3g1ifwKiBxWA70jTWjk0oOdsJWBhqbMgMYmMcX/2TpGtKDVDbxJNw12xFuurXn9nD4AbywCJHpVG8r1KgKsIeKnUmYjnCCMVVf+oROwFYfpAm2JAexuBCmu2vwldm0rNre19/soSQ7p2q2hu/WFIwFwmfX/IvKUMEFglTOtl5kNNQSYWTfHZ46jPdqM0raW9a8w+RKArijU0pnmxRPIL/+TRaymX26+YXgiMMsk0M0MC8snOa4JcvlBMBzaOtv6HYMwC0XWqAMy8hYgmK6ePcYqBDUSIdvL1ZeqMI/GElVQkpgSDmYJMOle6k1VA57OPmdviiVTZ2TzI5zfnSyLMPZ8AlbXoCWkm11XMYGRQKCVn8CIIV1cWrtuCialNJJJrVEo1fUSvG2UYAv8BmFQy3R+TB+0AAAAASUVORK5CYII=" x="0" y="0" width="30" height="30" alt="shopping basket icon"/>
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

