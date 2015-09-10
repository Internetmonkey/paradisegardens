<?php
$headline = get_field( 'contact_form_headline', 'options' );
$content = get_field( 'contact_form_content', 'options' );
$form = get_field( 'select_contact_form', 'options' );
$show = get_field( 'show_contact_form', 'options' );

if ( $form ) {
	$_id = $form->ID;
	$_title = $form->post_title;
}
?>
<div id="contact" class="contact page-section">
	<div class="container">
	<?php if ( $headline && $content ) : ?>
		<div class="row">
			<div class="contact-before col-md-8 col-md-offset-2">
				<h2 class="contact-headline headline"><?php echo $headline; ?></h2>
				<div class="contact-content"><?php echo $content; ?></div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( $show === 'true' && $_id ) : 
		$shortcode = '[contact-form-7 id="' . $_id . '" title="' . $_title . '"]';
	?>
		<div class="row">
			<div class="contact-form col-sm-12">
				<?php echo do_shortcode( $shortcode ); ?>
			</div>
		</div>
	<?php endif; ?>
	</div><!-- /.container -->
</div><!-- /.contact -->