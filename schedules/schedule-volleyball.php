<?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));



////////////////////////////////////////////////////////
//  Year Summary
////////////////////////////////////////////////////////

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/record/' . $school_year . '/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

echo $request[0];

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<ul class="schedule-summary">
		<li>
			<div class="item">Overall Record</div>
			<?php echo $data[0]->Wins; ?>-<?php echo $data[0]->Losses; ?>
		</li>
		<li>
			<div class="item">District Record</div>
			<?php echo $data[0]->DistrictWins; ?>-<?php echo $data[0]->DistrictLoses; ?>
		</li>
	</ul>

<?php }



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/schedule/' . $school_year . '/' . $team_name . '/1');
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

						if($item->game_status > 5) {
							//  Away Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->away_team)) {
								$a_one = 1;
							} else {
								$a_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->away_team)) {
								$a_two = 1;
							} else {
								$a_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->away_team)) {
								$a_three = 1;
							} else {
								$a_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->away_team)) {
								$a_four = 1;
							} else {
								$a_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->away_team)) {
								$a_five = 1;
							} else {
								$a_five = 0;
							}

							//  Home Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->home_team)) {
								$h_one = 1;
							} else {
								$h_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->home_team)) {
								$h_two = 1;
							} else {
								$h_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->home_team)) {
								$h_three = 1;
							} else {
								$h_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->home_team)) {
								$h_four = 1;
							} else {
								$h_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->home_team)) {
								$h_five = 1;
							} else {
								$h_five = 0;
							}

							if (strtolower($item->winning_team) == strtolower($team_name)) {
								echo '<span class="winning-text">W</span>';
							}
							if (strtolower($item->losing_team) == strtolower($team_name)) {
								echo '<span class="losing-text">L</span>';
							}

							$a_score = array($a_one, $a_two, $a_three, $a_four, $a_five);
							$h_score = array($h_one, $h_two, $h_three, $h_four, $h_five);

							if ($a_score >= $h_score) {
								echo array_sum($a_score);
								echo '-';
								echo array_sum($h_score);
							} else {
								echo array_sum($h_score);
								echo '-';
								echo array_sum($a_score);
							}

							if ($a_score >= $h_score) {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->away_team_first_game_score . '-' . $item->home_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->away_team_second_game_score . '-' . $item->home_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->away_team_third_game_score . '-' . $item->home_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->away_team_fourth_game_score . '-' . $item->home_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->away_team_fifth_game_score . '-' . $item->home_team_fifth_game_score;
								}
								echo ')</sup>';
							} else {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->home_team_first_game_score . '-' . $item->away_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->home_team_second_game_score . '-' . $item->away_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->home_team_third_game_score . '-' . $item->away_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->home_team_fourth_game_score . '-' . $item->away_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->home_team_fifth_game_score . '-' . $item->away_team_fifth_game_score;
								}
								echo ')</sup>';
							}
							
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/schedule/' . $school_year . '/' . $team_name . '/2');
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
								if ((($item->away_region) === ($item->home_region)) &&
								(($item->away_district) === ($item->home_district))) :
									echo ' <em>(District Matchup)</em>';
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

						if($item->game_status > 5) {
							//  Away Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->away_team)) {
								$a_one = 1;
							} else {
								$a_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->away_team)) {
								$a_two = 1;
							} else {
								$a_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->away_team)) {
								$a_three = 1;
							} else {
								$a_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->away_team)) {
								$a_four = 1;
							} else {
								$a_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->away_team)) {
								$a_five = 1;
							} else {
								$a_five = 0;
							}

							//  Home Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->home_team)) {
								$h_one = 1;
							} else {
								$h_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->home_team)) {
								$h_two = 1;
							} else {
								$h_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->home_team)) {
								$h_three = 1;
							} else {
								$h_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->home_team)) {
								$h_four = 1;
							} else {
								$h_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->home_team)) {
								$h_five = 1;
							} else {
								$h_five = 0;
							}

							if (strtolower($item->winning_team) == strtolower($team_name)) {
								echo '<span class="winning-text">W</span>';
							}
							if (strtolower($item->losing_team) == strtolower($team_name)) {
								echo '<span class="losing-text">L</span>';
							}

							$a_score = array($a_one, $a_two, $a_three, $a_four, $a_five);
							$h_score = array($h_one, $h_two, $h_three, $h_four, $h_five);

							if ($a_score >= $h_score) {
								echo array_sum($a_score);
								echo '-';
								echo array_sum($h_score);
							} else {
								echo array_sum($h_score);
								echo '-';
								echo array_sum($a_score);
							}

							if ($a_score >= $h_score) {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->away_team_first_game_score . '-' . $item->home_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->away_team_second_game_score . '-' . $item->home_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->away_team_third_game_score . '-' . $item->home_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->away_team_fourth_game_score . '-' . $item->home_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->away_team_fifth_game_score . '-' . $item->home_team_fifth_game_score;
								}
								echo ')</sup>';
							} else {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->home_team_first_game_score . '-' . $item->away_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->home_team_second_game_score . '-' . $item->away_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->home_team_third_game_score . '-' . $item->away_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->home_team_fourth_game_score . '-' . $item->away_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->home_team_fifth_game_score . '-' . $item->away_team_fifth_game_score;
								}
								echo ')</sup>';
							}
							
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/schedule/' . $school_year . '/' . $team_name . '/3');
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

						if($item->game_status > 5) {
							//  Away Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->away_team)) {
								$a_one = 1;
							} else {
								$a_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->away_team)) {
								$a_two = 1;
							} else {
								$a_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->away_team)) {
								$a_three = 1;
							} else {
								$a_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->away_team)) {
								$a_four = 1;
							} else {
								$a_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->away_team)) {
								$a_five = 1;
							} else {
								$a_five = 0;
							}

							//  Home Team Calculated Score
							if (strtolower($item->g_one_w) == strtolower($item->home_team)) {
								$h_one = 1;
							} else {
								$h_one = 0;
							}
							if (strtolower($item->g_two_w) == strtolower($item->home_team)) {
								$h_two = 1;
							} else {
								$h_two = 0;
							}
							if (strtolower($item->g_three_w) == strtolower($item->home_team)) {
								$h_three = 1;
							} else {
								$h_three = 0;
							}
							if (strtolower($item->g_four_w) == strtolower($item->home_team)) {
								$h_four = 1;
							} else {
								$h_four = 0;
							}
							if (strtolower($item->g_five_w) == strtolower($item->home_team)) {
								$h_five = 1;
							} else {
								$h_five = 0;
							}

							if (strtolower($item->winning_team) == strtolower($team_name)) {
								echo '<span class="winning-text">W</span>';
							}
							if (strtolower($item->losing_team) == strtolower($team_name)) {
								echo '<span class="losing-text">L</span>';
							}

							$a_score = array($a_one, $a_two, $a_three, $a_four, $a_five);
							$h_score = array($h_one, $h_two, $h_three, $h_four, $h_five);

							if ($a_score >= $h_score) {
								echo array_sum($a_score);
								echo '-';
								echo array_sum($h_score);
							} else {
								echo array_sum($h_score);
								echo '-';
								echo array_sum($a_score);
							}

							if ($a_score >= $h_score) {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->away_team_first_game_score . '-' . $item->home_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->away_team_second_game_score . '-' . $item->home_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->away_team_third_game_score . '-' . $item->home_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->away_team_fourth_game_score . '-' . $item->home_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->away_team_fifth_game_score . '-' . $item->home_team_fifth_game_score;
								}
								echo ')</sup>';
							} else {
								echo ' <sup>(';
								if ($item->away_team_first_game_score || $item->home_team_first_game_score) {
									echo $item->home_team_first_game_score . '-' . $item->away_team_first_game_score;
								}
								if ($item->away_team_second_game_score || $item->home_team_second_game_score) {
									echo ', ' . $item->home_team_second_game_score . '-' . $item->away_team_second_game_score;
								}
								if ($item->away_team_third_game_score || $item->home_team_third_game_score) {
									echo ', ' . $item->home_team_third_game_score . '-' . $item->away_team_third_game_score;
								}
								if ($item->away_team_fourth_game_score || $item->home_team_fourth_game_score) {
									echo ', ' . $item->home_team_fourth_game_score . '-' . $item->away_team_fourth_game_score;
								}
								if ($item->away_team_fifth_game_score || $item->home_team_fifth_game_score) {
									echo ', ' . $item->home_team_fifth_game_score . '-' . $item->away_team_fifth_game_score;
								}
								echo ')</sup>';
							}
							
						}

					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}
?>



