<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div class="preloader" id="preloader">
  
        <div class="preload-graphic"></div>
      
    </div>

    
    <div class="wrap" role="document">

      

        <?php include Wrapper\template_path(); ?>

        <?php if (Config\display_sidebar()) : ?>

              <aside class="sidebar col-md-4 wow fadeInRight" role="complementary">
                <?php include Wrapper\sidebar_path(); ?>
              </aside><!-- /.sidebar -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </section><!-- /.page-section -->

        <?php else : ?>

        </div><!-- /.row -->
          </div><!-- /.container -->

          </section><!-- /.page-section -->


        <?php endif; ?>


    </div><!-- /.wrap -->

    <?php get_template_part('templates/footer', 'contact'); ?>
    <?php get_template_part('templates/footer', 'signup'); ?>
    <?php get_template_part('templates/footer', 'social'); ?>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
