<?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/football/schedule/' . $school_year . '/' . $team_name . '/1');
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
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="schedule-date">';
						$source = $item->date;
						$date = new DateTime($source);
						echo '<div>' . $date->format('l') . '</div>'; // 31.07.2012
						echo '<div>' . $date->format('M j, Y') . '</div>'; // 31.07.2012
					echo '</td>';
					echo '<td class="opponent">';
						if ($item->tournament_title) {
							echo '<small>' .$item->tournament_title . '</small><br />';
						}
						echo '<strong>';
							if (strtolower($item->home_team) == strtolower($team_name)) {
								echo 'vs <img src="http://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">' . $item->away_team;
							} else {
								echo '@ <img src="http://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">' . $item->home_team;
							}
						echo '</strong>';
					echo '</td>';
					echo '<td>';
						if (!empty($item->minutes_remaining)) {
							if ($item->minutes_remaining) {
								echo $item->minutes_remaining;
							}
							if ($item->seconds_remaining) {
								echo ":" . $item->seconds_remaining;
							}
						} else {
							echo $item->time;
						}
						echo $item->game_status;
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/football/schedule/' . $school_year . '/' . $team_name . '/2');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4><?php echo $school_year; ?> Junior Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="schedule-date">';
						$source = $item->date;
						$date = new DateTime($source);
						echo '<div>' . $date->format('l') . '</div>'; // 31.07.2012
						echo '<div>' . $date->format('M j, Y') . '</div>'; // 31.07.2012
					echo '</td>';
					echo '<td class="opponent">';
						echo '<strong>';
							if (strtolower($item->home_team) == strtolower($team_name)) {
								echo 'vs <img src="http://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">' . $item->away_team;
							} else {
								echo '@ <img src="http://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">' . $item->home_team;
							}
						echo '</strong>';
					echo '</td>';
					echo '<td>';
						if (!empty($item->minutes_remaining)) {
							if ($item->minutes_remaining) {
								echo $item->minutes_remaining;
							}
							if ($item->seconds_remaining) {
								echo ":" . $item->seconds_remaining;
							}
						} else {
							echo $item->time;
						}
						echo $item->game_status;
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/football/schedule/' . $school_year . '/' . $team_name . '/3');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4><?php echo $school_year; ?> Freshman Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="schedule-date">';
						$source = $item->date;
						$date = new DateTime($source);
						echo '<div>' . $date->format('l') . '</div>'; // 31.07.2012
						echo '<div>' . $date->format('M j, Y') . '</div>'; // 31.07.2012
					echo '</td>';
					echo '<td class="opponent">';
						echo '<strong>';
							if (strtolower($item->home_team) == strtolower($team_name)) {
								echo 'vs <img src="http://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">' . $item->away_team;
							} else {
								echo '@ <img src="http://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">' . $item->home_team;
							}
						echo '</strong>';
					echo '</td>';
					echo '<td>';
						if (!empty($item->minutes_remaining)) {
							if ($item->minutes_remaining) {
								echo $item->minutes_remaining;
							}
							if ($item->seconds_remaining) {
								echo ":" . $item->seconds_remaining;
							}
						} else {
							echo $item->time;
						}
						echo $item->game_status;
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}
?>



