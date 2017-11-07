 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));




//  Show Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/boys-bowling/schedule/' . $school_year . '/' . $team_name . '/1');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4><?php echo $school_year; ?> Varsity Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php
						if ($item->tournament_title) {
							echo '<small>' .$item->tournament_title . '</small><br />';
						}
						echo '<strong>';
							if (strtolower($item->home_team) == strtolower($team_name)) {
								echo 'vs <img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">' . $item->away_team;
							} else {
								echo '@ <img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">' . $item->home_team;
							}
						echo '</strong>';
						?>
				<td>
					<?php if (($item->winning_team) || ($item->losing_team)) {
						if ((strtolower($item->winner_team)) === $team_name) {
							echo '<span class="winning-text">W </span>';
						}
						if ($item->losing_team === $team_name) {
							echo '<span class="losing-text">L </span>';
						}
						echo ($item->match_score);
					} else {
						echo $item->time;
					} 
					?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php } ?>



<?php
//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/boys-bowling/schedule/' . $school_year . '/' . $team_name . '/2');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4>Junior Varsity Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php if ($item->tournament_title) { ?>
						<div class="text-muted"><small><?php echo $item->tournament_title; ?></small></div>
					<?php } ?>
					<strong>
						<?php 
						if (strtolower($item->home_team) == strtolower($team_name)) { ?>
							vs 
							<?php 
							if ($item->away_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="<?php echo $item->away_team ?>" title="<?php echo $item->away_team ?>">
							<?php } else {
								echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							} ?>
							<?php echo $item->away_team ?>
						<?php } else { ?>
							@ 
							<?php 
							if ($item->home_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="<?php echo $item->home_team ?>" title="<?php echo $item->home_team ?>">
							<?php } else {
								echo '&nbsp;&nbsp;&nbsp;&nbsp;';
							} ?>
							<?php echo $item->home_team ?>
						<?php } ?>
					</strong>
				</td>
				<td>
					<?php echo $item->time; ?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php } ?>



<?php
//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/boys-bowling/schedule/' . $school_year . '/' . $team_name . '/3');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4>Freshman Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php if ($item->tournament_title) { ?>
						<div class="text-muted"><small><?php echo $item->tournament_title; ?></small></div>
					<?php } ?>
					<strong>
						<?php 
						if (strtolower($item->home_team) == strtolower($team_name)) { ?>
							vs 
							<?php if ($item->away_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="<?php echo $item->away_team ?>" title="<?php echo $item->away_team ?>">
							<?php } ?>
							<?php echo $item->away_team ?>
						<?php } else { ?>
							@
							<?php if ($item->home_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="<?php echo $item->home_team ?>" title="<?php echo $item->home_team ?>">
							<?php } ?>
							<?php echo $item->home_team ?>
						<?php } ?>
					</strong>
				</td>
				<td>
					<?php echo $item->time; ?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php } ?>