<! DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset='<?php bloginfo('charset'); ?>'>
        <meta name = "viewport" content = "width=device-width", initial-scale=1>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="header--top">
      <div class="top-nav-container">
        <div class="top-nav-section" id="top-nav-left">          
          <a><i class="fa fa-bars" aria-hidden="true"></i></a>
          <!-- <a><i class="fa-solid fa-house"></i></a> -->
        </div>
        <h3 class="logo-text">
          <a href="<?php echo site_url() ?>">A <strong>Cooperative</strong> E-Book Marketplace</a>
        </h3> 
        <div class="top-nav-section" id="top-nav-right">
          <a class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>          
          <a class="glowing-text" href="<?php echo wc_get_cart_url(); ?>"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
      </div>
    </header>
    <header class="header--main">      
      <nav class="main-nav">  
        <div class="nav-container">    
          <a>Browse by Genre</a>       
          <a href="<?php echo get_post_type_archive_link('curations') ?>">Curated Bookshelves</a>
          <a href="<?php echo site_url('/wishlist');?>">Wishlist</a>
          <a>About the Co-op</a>
          <a>For Authors</a>
        </div>
      </nav>
    </header>

