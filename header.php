<! DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset='<?php bloginfo('charset'); ?>'>
    <meta name = "viewport" content = "width=device-width", initial-scale=1>
    <script src="https://kit.fontawesome.com/9d40013081.js" crossorigin="anonymous"></script>
    <title>The Book Marketplace</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header--top">
  <div class="top-nav-container">
    <a href="#" class="site-header__menu-trigger fa fa-bars" aria-label="menu" tabindex="-1"><i aria-hidden="true"></i></a>
    <div class="mini-logo-section">
      <a href="<?php echo esc_url(site_url()) ?>"><span class="logo-text">Trunk of My Car</span>
      <p><span class="logo-text">Cooperative</span></a></p>
    </div>
    <div class="top-nav-section" id="top-nav-right">
      <a href="<?php echo esc_url(site_url('/search'));?>" class="js-search-trigger " aria-label="search"><i class="fa fa-search" aria-hidden="true"></i></a>          
      <a class="glowing-text" href="<?php echo wc_get_cart_url(); ?>" aria-label="shopping cart"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></a>
    </div>
  </div>
</header>
<div class="header--main">      
  <nav class="main-nav" aria-label="main navigation bar">  
    <div class="nav-container site-header__menu group">    
      <a href="#">New Books</a>
      <a href="<?php echo esc_url(site_url('/genres'));?>">Ebook Genres</a>
      <!-- <a href="<?php echo esc_url(site_url('/audiobook-genres'));?>">Audiobook Genres</a>   
      <a href="<?php echo esc_url(site_url('/diverse-books'));?>">Diverse Books</a>
      <a href="<?php echo esc_url(site_url('/free-shorts'));?>">Free Short Reads</a>
      <a href="<?php echo esc_url(site_url('/merch'));?>">Signed Books and Merch</a>    
      <a href="<?php echo esc_url(get_post_type_archive_link('curations')); ?>">Curated Bookshelves</a> -->
      <a href="#">My Books</a>
      <a href="#">Events</a>
      <a href="#">Services</a>
      <a href="#">My Creator Dashboard</a>
      <a href="#">The Co-op</a>
    </div>
  </nav>
</div>

