<?php
$headline = get_field( 'signup_headline', 'options' );
?>
<!-- SIGNUP SECTION IS A MOCK FOR NOW -->
<div class="signup page-section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 text-center">
				<h2 class="signup-heading heading"><?php echo $headline ?></h2>
			</div>
			<div class="signup-form-wrapper col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
				<div class="widget-section-wrapper">
				    <?php dynamic_sidebar('sidebar-footer'); ?>
				  </div>
			</div>
			<!-- <div class="signup-form-wrapper col-sm-12">
				<form class="signup-form">
					<div class="form-group col-sm-4">
						<label for="exampleInputName2">Name</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
					</div>
					<div class="form-group col-sm-4">
						<label for="exampleInputEmail2">Email</label>
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
					</div>
					<button type="submit" class="btn btn-default">Send invitation</button>
				</form>
			</div> -->


		</div>
	</div>
</div>	