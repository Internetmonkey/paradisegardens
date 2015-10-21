<?php

if ( is_category() || is_home() ) :

	$queried_object = get_queried_object();
	
	if ( get_field( 'header_image', $queried_object ) ) :

		get_template_part('templates/archive', 'hero');

	endif;

else : ?>

<header >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php get_template_part('templates/page', 'header'); ?>
			</div>
		</div>
	</div>
</header>

<?php endif; ?>






<section class="page-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php echo(get_post_field('post_content',10)); ?>
			</div>
		</div>
	</div>
</section>


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


	<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>

</div><!-- /.col-sm-8 -->

