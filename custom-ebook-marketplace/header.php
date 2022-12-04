<! DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset='<?php bloginfo('charset'); ?>'>
        <meta name = "viewport" content = "width=device-width", initial-scale=1>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="header--main">
      <div>
        <h3 class="logo-text">
          <a href="<?php echo site_url() ?>">A <strong>Cooperative</strong> E-Book Marketplace</a>
        </h3>
        <nav class="main-nav">              
            <ul>              
              <li><a href="<?php echo site_url('/activity') ?>">Readers' Social Room</a></li>     
              <li><a href="<?php echo site_url('/members') ?>">Reader Profiles</a></li>    
            </ul>
          </nav>
          <nav class="main-nav">              
            <ul>
              <li><a href="<?php echo site_url('/member-authors') ?>">All Authors</a></li>
              <li <?php if (get_post_type() == 'curations') echo 'class="current-menu-item"';?>><a href="<?php echo get_post_type_archive_link('curations') ?>">Bookshelves</a></li>
              <?php if (is_user_logged_in()){
                ?><li><a href="<?php echo bp_loggedin_user_domain() ?>">My Reader Profile</a></li>
              <?php }  
            ?></ul>
          </nav>
        <!-- <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i> -->
        <!-- <div class="site-header__menu group">          
          <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div> -->
    </header>
