<?php
$image = get_field('location_image');
$headline = get_field('location_headline');
$content = get_field('location_content');
$location = get_field('location_location');

// $content is bare minimum to render this section
if ( ! $content ) return; 

// Only include this script if we really need it
if ( !empty($location) ) {
	wp_enqueue_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), null, true );
}

// Setup Columns (content becomes full width if no image)
$columns = $image ? 'col-sm-5 col-lg-4' : 'col-sm-12';

?>
<div class="page-section location" id="location">
	<div class="container location-top">
		<main class="row" role="main">
		<?php if ( $image ) : ?>
			<div class="image-container col-sm-7 col-lg-8">
				<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>">
			</div>
		<?php endif; ?>
			<div class="content-container <?php echo $columns; ?>">
			<?php if( $headline ) : ?>
				<h2 class="headline location-headline"><?php echo $headline; ?></h2>
			<?php endif; ?>
				<p class="location-content"><?php echo $content; ?></p>
			</div>
		</main><!-- /.row -->
	</div><!-- /.container -->
<?php if ( !empty( $location) ) : ?>
	<div class="location-map">
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div><!-- /.acf-map -->
	</div><!-- /.location-map -->
<?php endif; ?>
</div><!-- /.page-section -->