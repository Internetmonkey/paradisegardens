
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'hero'); ?>
	<section class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
<?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
			</div>
		</div>
	</div>
</section>
  
<?php endwhile; ?>

