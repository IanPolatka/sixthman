<?php

	$school_name 	= strtolower(get_field('school_name', 'option')); 
	$team_name 		= str_replace(' ', '%20', $school_name);
	$school_year	= get_field('school_year');

	$data = file_get_contents('http://6thmansports.com/api/football/schedule/' . $school_year . '/' . $team_name);
	$json_data = json_decode($data, true);

	?>

		<table class="schedule-table">
			<tbody>

						<?php
						foreach($json_data as $game) {

							echo '<tr>';
								echo '<td class="schedule-date">';
									$source = $game['date'];
									$date = new DateTime($source);
									echo '<div>' . $date->format('l') . '</div>'; // 31.07.2012
									echo '<div>' . $date->format('M j, Y') . '</div>'; // 31.07.2012
								echo '</td>';
								echo '<td class="opponent">';
									echo '<strong>';
									if (strtolower($game['home_team']) == $school_name) {
										echo 'vs <img src="http://6thmansports.com/images/team-logos/' . $game['away_team_logo'] . '">' . $game['away_team'];
									} else {
										echo '@ <img src="http://6thmansports.com/images/team-logos/' . $game['home_team_logo'] . '">' . $game['home_team'];
									}
									echo '</strong>';
								echo '</td>';
								echo '<td>';
									if (!empty($game['minutes_remaining'])) {
										if ($game['minutes_remaining']) {
											echo $game['minutes_remaining'];
										}
										if ($game['seconds_remaining']) {
											echo ":" . $game['seconds_remaining'];
										}
									} else {
										echo $game['time'];
									}
									echo $game['game_status'];
								echo '</td>';
							echo '</tr>';
						}
						?>

					</tbody>
				</table>