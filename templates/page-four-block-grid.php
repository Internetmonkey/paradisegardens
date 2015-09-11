<?php
$top_image = get_field('block_grid_top_image');
$top_title = get_field('block_grid_top_title');
$top_link = get_field('block_grid_top_link');
$top_link_text = get_field('block_grid_top_link_text');
$bottom_image = get_field('block_grid_bottom_image');
$bottom_title = get_field('block_grid_bottom_title');
$bottom_link = get_field('block_grid_bottom_link');
$bottom_link_text = get_field('block_grid_bottom_link_text');

if ( !$top_image && !$bottom_image ) return; 
?>
<div class="four-block-grid ">
	<div class="container-fluid">
		<div class="row top-row wow fadeInLeft">
			<div class="grid-image grid-left col-sm-6 grid-match">
				<img src="<?php echo $top_image; ?>" class="img-responsive ">
			</div>
			<div class="grid-content grid-right col-sm-6 grid-match">
				<div class="grid-content-wrapper text-center">
					<a class="grid-link" href="<?php echo $top_link; ?>">
					<h2 class="headline"><?php echo $top_title; ?></h2>
					<span class="more-link"><?php echo $top_link_text; ?></span>
					</a>
				</div>
			</div>
		</div><!-- /.top-row -->
		<div class="row bottom-row wow fadeInRight">
			<div class="grid-image grid-right col-sm-6 col-sm-push-6 grid-match">
				<img src="<?php echo $bottom_image; ?>" class="img-responsive ">
			</div>
			<div class="grid-content grid-left col-sm-6 col-sm-pull-6 grid-match">
				<div class="grid-content-wrapper text-center">
					<a class="grid-link" href="<?php echo $bottom_link; ?>">
					<h2 class="headline"><?php echo $bottom_title; ?></h2>
					<span class="more-link"><?php echo $bottom_link_text; ?></span>
				</a>
				</div>
			</div>
		</div><!-- /.bottom-row -->
	</div><!-- /.container -->
</div><!-- /.4-block-grid -->