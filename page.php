
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'hero'); ?>
	

	<section class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">

<?php get_template_part('templates/page', 'header'); ?>
<?php the_content(); ?>
  
			</div>
		</div>
	</div>
</section>

<?php get_template_part('templates/page', 'content-slider'); ?>
  
<?php endwhile; ?>

