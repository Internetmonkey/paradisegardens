<?php
$team_heading = get_field('meet_the_team_heading');
$team_content = get_field('meet_the_team_content');

// Minimum contenty to display is heading, content and 1 team member / org
if ( ! $team_heading || ! $team_content || ! have_rows( 'team_member' ) ) return;

?>
<div class="team page-section wow fadeIn" id="the-team">
	<div class="container">
		<div class="row">
			<div class="meet-the-team col-md-4">
				<h2 class="headline team-headline"><?php echo $team_heading; ?></h2>
				<div class="meet-the-team-content"><?php echo $team_content; ?></div>
			</div><!-- /.meet-the-team -->
			<div class="team-members col-md-7 col-lg-6 col-lg-offset-1">
			<?php while ( have_rows( 'team_member' ) ) : the_row();
				$member_title = get_sub_field( 'team_member_title' );
				$member_bio = get_sub_field( 'team_member_bio' );
			?>
				<div class="team-member-wrapper">
					<h3 class="member-headline headline"><?php echo $member_title; ?></h3>
					<div class="member-bio"><?php echo $member_bio; ?></div>
				</div><!-- /.team-member-wrapper -->
			<?php endwhile; ?>
			</div><!-- /.team-members -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.team -->