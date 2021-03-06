<?php
// Setup shit

$autoplay = get_field( 'slider_auto' );
$autoplay_speed = get_field( 'slider_delay' );

// Some error checking and default setting
if ( !$autoplay_speed || !is_int($autoplay_speed) ) {
	$autoplay_speed = 6000;
}

$img_slick_args = '{"arrows":false, "dots":true, "autoplay":' . $autoplay . ', "autoplaySpeed":' . $autoplay_speed .  ', "fade":true, "asNavFor":".text-slider"}';

$text_slick_args = '{"arrows":false, "fade":true, "asNavFor":".image-slider"}';

if ( ! have_rows( 'slider_slides' ) || get_field( 'slider_active' ) === "false" ) return;

?>
<div class="content-slider page-section" id="about">

	<div class="image-slider" data-slick='<?php echo $img_slick_args; ?>'>
	<?php while ( have_rows( 'slider_slides' ) ) : the_row();
		$image = get_sub_field( 'slide_image' );
		$url = $image['url'];
		$alt = $image['alt'];
	?>
		<div class="slide-wrapper">
			<div class="slide-image" style="background-image: url(<?php echo $url; ?>);"></div>
		</div>
	<?php endwhile; ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="text-slider col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" data-slick='<?php echo $text_slick_args; ?>'>
			<?php while ( have_rows( 'slider_slides' ) ) : the_row();
				$slide_headline = get_sub_field('slide_headline');
				$slide_content = get_sub_field('slide_content');
			?>
				<div class="slide-wrapper text-center">
					<h2 class="headline"><?php echo $slide_headline; ?></h3>
					<div class="slide-content"><?php echo $slide_content; ?></div>
				</div>
			<?php endwhile; ?>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div>

