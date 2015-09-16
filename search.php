<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php get_template_part('templates/page', 'header'); ?>
		</div>
	</div>
</div>

<section class="page-section">

<div class="container">
	<div class="row">
		<div class="col-md-8">

			<?php if (!have_posts()) : ?>
			  <div class="alert alert-warning">
			    <?php _e('Sorry, no results were found.', 'sage'); ?>
			  </div>
			  <?php get_search_form(); ?>
			<?php endif; ?>

			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/content', 'search'); ?>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		</div>
