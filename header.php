<! DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset='<?php bloginfo('charset'); ?>'>
        <meta name = "viewport" content = "width=device-width", initial-scale=1>
        <script src="https://kit.fontawesome.com/9d40013081.js" crossorigin="anonymous"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="header--top">
      <div class="top-nav-container">
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="mini-logo-section">
          <a href="<?php echo esc_url(site_url()) ?>"><span class="logo-text">The <strong>Book</strong></span>
          <p><span class="logo-text">Marketplace</span></a><a href="<?php echo esc_url(site_url('/our-beta-launch'));?>"><span class="detail-text"> Beta</span></a></p>
        </div>
        <div class="top-nav-section" id="top-nav-right">
          <a href="<?php echo esc_url(site_url('/search'));?>" class="js-search-trigger "><i class="fa fa-search" aria-hidden="true"></i></a>          
          <a class="glowing-text" href="<?php echo wc_get_cart_url(); ?>"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
    </header>
    <header class="header--main">      
      <nav class="main-nav">  
        <div class="nav-container site-header__menu group">    
          <a href="<?php echo esc_url(site_url('/genres'));?>">Ebook Genres</a>
          <a href="<?php echo esc_url(site_url('/audiobook-genres'));?>">Audiobook Genres</a>   
          <a href="<?php echo esc_url(site_url('/diverse-books'));?>">Diverse Books</a>
          <a href="<?php echo esc_url(site_url('/free-shorts'));?>">Free Short Reads</a>
          <a href="<?php echo esc_url(site_url('/merch'));?>">Signed Books and Merch</a>    
          <a href="<?php echo esc_url(get_post_type_archive_link('curations')); ?>">Curated Bookshelves</a>
          <a href="<?php echo esc_url(site_url('/about'));?>">About the Marketplace</a>
        </div>
      </nav>
    </header>

