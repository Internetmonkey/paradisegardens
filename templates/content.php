<div class="row article-listing wow fadeInUp">

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="col-sm-4">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( array(500,500) ); ?>
		</a>

	</div>
	<div class="col-sm-8">	
	<?php else : ?>
		
	<div class="col-sm-12">

	<?php endif; ?>


<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
</div>
</div>
