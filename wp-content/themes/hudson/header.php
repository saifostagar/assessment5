<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" />

  <?php
  wp_head();
  ?>

</head>

<body>

  <header class="site-header">

    <nav class="navbar navbar-expand-lg navbar-light navigation">
      <div class="container site_logo">

        <?php
        if (function_exists('the_custom_logo')) {
          the_custom_logo();
        }
        ?>

    <div class="mobile_menu_section">
      <?php
      echo do_shortcode('[rmp_menu id="809"]');
      ?>
    </div>

        <div id="navbarSupportedContent">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'primary',
              'menu_class' => 'hnav',
              'container' => 'div',
              'container_class'   => 'collapse navbar-collapse',
              'container_id'      => 'navbarSupportedContent',
              // 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
              'menu_class' => 'nav navbar-nav mr-auto desktop-navbar mainmenu',
              'walker'          => new WP_Bootstrap_Navwalker(),

            )

          );
          ?>
        </div>
        <ul class="nav navbar-nav navbar-right mx-auto" id="search_box_icon">
          <li class="nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle search-toggle-icon" href="#">
              <img src="<?php bloginfo('template_url'); ?>/assets/img/search.png" alt="" class="img">
            </a>
            <a data-toggle="dropdown" class="nav-link dropdown-toggle hide" href="#"><i class="fas fa-times close-icon"></i></a>
            <ul class="dropdown-menu">
              <li>
                <?php echo do_shortcode("[wp_google_searchbox]"); ?>
              </li>
            </ul>
          </li>
        </ul> <!-- search form -->
      </div>
    </nav>
  </header>
  <?php if (is_front_page() ):  ?>

    <div class="home-hero-section">
      <?php
      echo do_shortcode('[smartslider3 slider="2"]');
      ?>
    </div
  <?php endif; ?>