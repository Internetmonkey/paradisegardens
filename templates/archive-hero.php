<?php
	// ACF internally converts the object
	// This means the same field set can be used
	// for taxonomies, posts, pages etc
	$q_object = get_queried_object();

	$image = get_field('header_image', $q_object );
	$headline = get_field('header_headline', $q_object );
	$sub = get_field('header_sub', $q_object );

	if ( !$headline ) {
		$headline =  $q_object->name;
	}

	// We need at least a headline OR an image to display this section
	if ( !$headline && !$image ) return;
?>

<?php if ( $image ) : ?>
<div class="hero hero-image wow fadeIn" style="background-image: url(<?php echo $image ?>);">
<?php else: ?>
<div class="hero no-image">
<?php endif; ?>
	<div class="title-container">
		<div class="container">
			<div class="row">
			<?php if ( $headline ) : ?>
				<div class="headline-container col-sm-8 col-md-6">
					<h1 class="headline"><?php echo $headline; ?></h1>
				<?php if ( $sub ) : ?>
					<p class="sub-headline"><?php echo $sub; ?></p>
				<?php endif; ?>
				</div><!-- /.headline-container -->
			<?php endif ?>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
</div><!-- /.hero -->

