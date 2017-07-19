 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/schedule-summary/' . $school_year . '/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<div class="most-recent-games-title">
		<h5>Latest Games</h5>
	</div>

	<div class="most-recent-games">
		<?php
		foreach( $data as $item ) { ?>

			<div class="game">
				
				<?php
				$source = $item->date;
				$date = new DateTime($source);
				?>
				<div><?php echo $date->format('D M j'); ?></div>

				<strong>
				<?php if ($item->game_status > 5) {
					if (strtolower($item->winning_team) == strtolower($team_name)) {
						echo '<span class="winning-text">W</span>';
					}
					if (strtolower($item->losing_team) == strtolower($team_name)) {
						echo '<span class="losing-text">L</span>';
					}
				} else {
					echo $item->time;
				} ?>
				</strong>

				<?php 
				if (strtolower($item->home_team) == strtolower($team_name)) { ?>
					<div class="team-logo-box">
						<?php
						if ($item->away_team_logo) { ?>
							<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="<?php echo $item->away_team ?>" title="<?php echo $item->away_abbreviated_name ?>">
						<?php
						} ?>
					</div><!--  Team Logo Box  -->
					vs<br />
					<?php echo $item->away_team ?>
				<?php } else { ?>
					<div class="team-logo-box">
						<?php
						if ($item->home_team_logo) {
						?>
							<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="<?php echo $item->home_team ?>" title="<?php echo $item->home_abbreviated_name ?>">
						<?php
						}
						?>
					</div><!--  Team Logo Box  -->
					@<br />
					<?php echo $item->home_team ?>
				<?php } ?>

			</div>

		<?php } ?>

		<div class="game">

			<a href="<?php echo home_url(); ?>/<?php echo 'volleyball/schedule'; ?>">

				<i class="fa fa-calendar-o" aria-hidden="true"></i>

				<div>See Full Schedule</div>

			</a>

		</div><!--  Game  -->

	</div><!--  Most Recent Games  -->

<?php } ?>