 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));



//  Show Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/tennis-boys/schedule/' . $school_year . '/' . $team_name . '/1');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4 class="schedule-title"><?php echo $school_year; ?> Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
					endif;
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
							echo '</div>';
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';

						if (($item->winning_team) || ($item->losing_team)) {
							if ((strtolower($item->winner_team)) === $team_name) {
								echo '<span class="winning-text">W </span>';
							}
							if ((strtolower($item->losing_team)) === $team_name) {
								echo '<span class="losing-text">L </span>';
							}
							echo ($item->match_score);
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

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

	<h4 class="schedule-title"><?php echo $school_year; ?> Junior Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
					endif;
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
							echo '</div>';
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';

						if (($item->winning_team) || ($item->losing_team)) {
							if ((strtolower($item->winner_team)) === $team_name) {
								echo '<span class="winning-text">W </span>';
							}
							if ((strtolower($item->losing_team)) === $team_name) {
								echo '<span class="losing-text">L </span>';
							}
							echo ($item->match_score);
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

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

	<h4 class="schedule-title"><?php echo $school_year; ?> Freshman Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
					endif;
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
							echo '</div>';
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';

						if (($item->winning_team) || ($item->losing_team)) {
							if ((strtolower($item->winner_team)) === $team_name) {
								echo '<span class="winning-text">W </span>';
							}
							if ((strtolower($item->losing_team)) === $team_name) {
								echo '<span class="losing-text">L </span>';
							}
							echo ($item->match_score);
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php } ?>