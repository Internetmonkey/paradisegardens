<?php
	$image = get_field('header_image');
	$headline = get_field('header_headline');
	$sub = get_field('header_sub');

	// We need at least a headline OR an image to display this section
	if ( !$headline && !$image ) return;
?>

<?php if ( $image ) : ?>
<div class="hero hero-image" style="background-image: url(<?php echo $image ?>);">
<?php else: ?>
<div class="hero no-image">
<?php endif; ?>
	<div class="container">
		<div class="row">
		<?php if ( $headline ) : ?>
			<div class="headline-container col-md-3">
				<h1 class="headline"><?php echo $headline; ?></h1>
			<?php if ( $sub ) : ?>
				<p class="sub-headline"><?php echo $sub; ?></p>
			<?php endif; ?>
			</div><!-- /.headline-container -->
		<?php endif ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.hero -->

