<! DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name = "viewport" content = "width=device-width", initial-scale=1>
    <script src="https://kit.fontawesome.com/9d40013081.js" crossorigin="anonymous"></script>
    <title>Trunk of My Car</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header--top">
  <div class="top-nav-container">
    <a href="#" class="site-header__menu-trigger fa fa-bars" aria-label="menu" tabindex="-1"><i aria-hidden="true"></i></a>
    <a href="<?php echo esc_url(site_url()) ?>"><img class="logo-image" src="<?php echo get_theme_file_uri('/images/logo.jpg'); ?>" alt="Trunk of My Car Cooperative" /></a>
    <div class="top-nav-section" id="top-nav-right">
      <a href="<?php echo esc_url(site_url('/search'));?>" class="js-search-trigger " aria-label="search"><i class="fa fa-search" aria-hidden="true"></i></a>          
      <a class="glowing-text" href="<?php echo wc_get_cart_url(); ?>" aria-label="shopping cart"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></a>
    </div>
  </div>
</header>
<div class="header--main">      
  <nav class="main-nav" aria-label="main navigation bar">  
    <div class="nav-container site-header__menu group">    
      <a href="<?php echo esc_url(site_url('/new-books'));?>">New Books</a>
      <a href="<?php echo esc_url(site_url('/genres'));?>">Browse Genres</a> 
      <a href="<?php echo esc_url(get_post_type_archive_link('curations')); ?>">Curated Bookshelves</a> 
      <a href="<?php echo esc_url(get_post_type_archive_link('curations')); ?>">My Bookshelves</a> 
      <?php if (is_user_logged_in()){ ?><a href="<?php echo esc_url(site_url('/my-account/downloads'));?>">My Book Downloads</a><?php } ?>
      <?php if (is_user_logged_in()){ ?><a href="<?php echo esc_url(site_url('/wp-admin')); ?>">My Vendor Portal</a><?php } ?>
    </div>
  </nav>
</div>
<div class="header--sub">      
  <nav class="main-nav" aria-label="main navigation bar">  
    <div class="nav-container site-header__menu group">    
      <?php if (is_user_logged_in()){ ?><a href="<?php echo esc_url(site_url('/wp-admin')); ?>">My Profile</a><?php } ?>
      <?php if (is_user_logged_in()){ ?><a href="<?php echo esc_url(site_url('/wp-admin')); ?>">My Groups</a><?php } ?>
      <a href="<?php echo esc_url(site_url('/coop'));?>">About the Co-op</a>
      <a href="<?php echo esc_url(site_url('/services'));?>">Our Services</a>
      <a href="<?php echo esc_url(site_url('/members'));?>">Our Members</a>
      <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>">Our Events</a>
    </div>
  </nav>
</div>

