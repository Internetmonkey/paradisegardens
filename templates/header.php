<?php

  use Roots\Sage\Nav;

?>

<header class="banner" role="banner">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".pg-nav-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
          <?php bloginfo('name'); ?>
      </a>
    </div>

      <?php
      if (has_nav_menu('primary_navigation')) :
                wp_nav_menu( array(
        'menu'              => 'primary_navigation',
        'theme_location'    => 'primary_navigation',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse pg-nav-collapse',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new Roots\Sage\Nav\BootstrapWalker(),)
        );
      endif;
      ?>
  </div>
</nav>
</header>
