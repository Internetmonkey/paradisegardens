<?php
/**
 * Template Name: Leasing
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'hero'); ?>
  <?php get_template_part('templates/page', 'content'); ?>
  <?php get_template_part('templates/page', 'masterplan'); ?>
  <?php get_template_part('templates/page', 'content-slider'); ?>
<?php endwhile; ?>
