<?php
$main_headline = get_field('main_headline');
$columns = $main_headline ? 'col-sm-8' : 'col-sm-12';
?>
<div class="page-section content">
<div class="container">
	<main class="row" role="main">
	<?php if ( $main_headline ) : ?>
		<div class="headline-container col-sm-4">
			<h2 class="headline"><?php echo $main_headline; ?></h2>
		</div>
	<?php endif; ?>
		<div class="post-content <?php echo $columns; ?>">
		<?php the_content(); ?>
		</div>
	</main>
</div>
</div>