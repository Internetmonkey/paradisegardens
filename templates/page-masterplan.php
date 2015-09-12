<?php
$image = get_field('master_plan_feature_image');
$headline = get_field('master_plan_headline');
$content = get_field('master_plan_content');
$button_text = get_field('master_plan_button_text');
$button_type = get_field('master_plan_button_type');
// Button can be link to a page or a lightbox image
if ( $button_type && $button_type === 'image' ) {
	$button_link = get_field('master_plan_image');
} else {
	$button_link = get_field('master_plan_button_link');
}
if ( !$content || !$button_link ) return;
// Fallback in case people are stupid
$button_text =  $button_text ? $button_text : "View Masterplan";
// Content will go full width if no image provided
$columns = $image ? 'col-sm-5 col-lg-4' : 'col-sm-12';

?>
<div class="page-section masterplan" id="masterplan">
<div class="container">
	<main class="row" role="main">
	<?php if ( $image ) : ?>
		<div class="image-container col-sm-7 col-lg-8">
			<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>">
		</div>
	<?php endif; ?>
		<div class="content-container <?php echo $columns; ?>">
		<?php if( $headline ) : ?>
			<h2 class="headline masterplan-headline"><?php echo $headline; ?></h2>
		<?php endif; ?>
			<p class="masterplan-content"><?php echo $content; ?></p>
		<?php if ( $button_type === 'image' ) : ?>
			<a href="<?php echo $button_link; ?>" title="View the Masterplan" data-featherlight="image" class="btn btn-default masterplan-button"><?php echo $button_text; ?></a>
		<?php else : ?>
			<a href="<?php echo $button_link; ?>" class="btn btn-default masterplan-button page-button"><?php echo $button_text; ?></a>
		<?php endif; ?>
		</div>
	</main>
</div>
</div>