 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));




//  Show Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/golf-boys/schedule/' . $school_year . '/' . $team_name . '/1');
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



<?php
//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/golf-boys/schedule/' . $school_year . '/' . $team_name . '/2');
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



<?php
//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/golf-boys/schedule/' . $school_year . '/' . $team_name . '/3');
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