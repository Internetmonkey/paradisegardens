<?php
/**
 * Template Name: Home Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'hero'); ?>
  <?php get_template_part('templates/page', 'content'); ?>
  <?php get_template_part('templates/page', 'four-block-grid'); ?>
<?php endwhile; ?>
