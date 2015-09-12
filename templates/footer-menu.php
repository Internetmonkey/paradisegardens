<?php 
$owner = get_field( 'copyright_holder', 'options' );
$credit = get_field( 'footer_credits', 'options' );
$year = date("Y");
?>
<div class="container-fluid">
	<div class="row">

		<div class="footer-menu-left col-sm-6">
			<p class="site-credits">&copy; <?php echo $owner . " " . $year . " | " . $credit; ?>
		</div>

		<div class="footer-menu-right col-sm-6">
			<?php wp_nav_menu( array( "theme_location" => 'footer_navigation', "depth" => 1, "container_class" => 'footer-menu' ) ); ?>
		</div>

	</div>
</div>