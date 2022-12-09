<! DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset='<?php bloginfo('charset'); ?>'>
        <meta name = "viewport" content = "width=device-width", initial-scale=1>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="header--main">
      <div class="top-nav-container">
        <div class="logo-container">
          <h3 class="logo-text">
            <a href="<?php echo site_url() ?>">A <strong>Cooperative</strong> E-Book Marketplace</a>
          </h3>
        </div>
        <nav class="right-nav">      
          <ul>        
            <li><a href="<?php wc_get_cart_url(); ?>">My Cart</a></li>
          </ul>
        </nav>
      </div>
      <nav class="main-nav">              
        <ul>              
          <li><a href="<?php echo site_url('/activity') ?>">Readers' Social Room</a></li>     
          <li <?php if (get_post_type() == 'curations') echo 'class="current-menu-item"';?>><a href="<?php echo get_post_type_archive_link('curations') ?>">Curated Bookshelves</a></li>
          <?php if (is_user_logged_in()){
            ?><li><a href="<?php echo bp_loggedin_user_domain() ?>">My Reader Profile</a></li>
          <?php }  
        ?></ul>
      </nav>
    </header>

