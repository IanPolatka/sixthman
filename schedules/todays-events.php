<?php
$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/football/todays-events/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<ul>
		<li>
			<a href="">
				<span class="sport-name">Volleyball</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
						<span class="team-name">NCC</span>
						<span class="score">1 <sup>(28, 14, 8)</sup></span>
					</div>
					<div class="team">
						<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
						<span class="team-name">CCHS</span>
						<span class="score">3 <sup>(30, 25, 15)</sup></span>
					</div>
					<div class="game-status">
						<span class="game-time live"><strong>4th Game</strong></span>
					</div>
				</div>
			</a>
		</li>
	</ul>

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