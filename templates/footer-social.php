<?php
$social_heading = get_field('social_media_headline', 'options' );


// Minimum contenty to display is heading, content and 1 social member / org
if ( ! $social_heading || ! have_rows( 'social_media_links', 'options' ) ) return;

?>
<div class="social page-section">
	<div class="container">
		<div class="row">
			<div class="social-heading col-md-8 col-md-offset-2">
				<h2 class="headline social-headline"><?php echo $social_heading; ?></h2>
			</div><!-- /.social-heading -->
		</div><!-- /.row -->
		<div class="row">
			<div class="social-links-wrapper">
			<?php while ( have_rows( 'social_media_links', 'options' ) ) : the_row();
				$title = get_sub_field( 'link_title' );
				$link = get_sub_field( 'link' );
				$icon = get_sub_field( 'link_icon' );
			?>
				<div class="social-icon-wrapper col-sm-1">
					<a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $icon; ?></a>
				</div><!-- /.social-member-wrapper -->
			<?php endwhile; ?>
			</div><!-- /.social-links-wrapper -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.social -->