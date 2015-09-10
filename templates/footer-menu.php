<?php 
$owner = get_field( 'copyright_holder', 'options' );
$credit = get_field( 'footer_credits', 'options' );
$year = date("Y");
?>
<div class="footer-menu-left pull-left">
	<p class="site-credits">&copy; <?php echo $owner . " " . $year . " | " . $credit; ?>
</div>

<div class="footer-menu-right pull-right">
	<?php wp_nav_menu( array( "theme_location" => 'footer_navigation', "depth" => 1, "container_class" => 'footer-menu' ) ); ?>
</div>