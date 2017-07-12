 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/soccer-boys/schedule-summary/' . $school_year . '/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

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
							vs <img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="<?php echo $item->away_team ?>" title="<?php echo $item->away_team ?>">
							<?php echo $item->away_team ?>
						<?php } else { ?>
							@ <img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="<?php echo $item->home_team ?>" title="<?php echo $item->home_team ?>">
							<?php echo $item->home_team ?>
						<?php } ?>
					</strong>
				</td>
				<td>
					<?php if (isset($item->minutes_remaining) || (($item->game_status) && ($item->game_status) < 5)) {
						if ($item->minutes_remaining) {
							echo '<span class="game-live">' . $item->minutes_remaining . '\'</span>';
						}
					} elseif ($item->game_status == 5) {
						if (strtolower($item->winning_team) == strtolower($team_name)) {
							echo '<span class="winning-text">W</span>';
							if (strtolower($item->home_team) == $team_name) {
								echo $item->home_team_final_score;
								echo '-';
								echo $item->away_team_final_score;
							} else {
								echo $item->away_team_final_score;
								echo '-';
								echo $item->home_team_final_score;
							}
						} elseif (strtolower($item->losing_team) == strtolower($team_name)) {
							echo '<span class="losing-text">L</span>';
							if (strtolower($item->home_team) == $team_name) {
								echo $item->home_team_final_score;
								echo '-';
								echo $item->away_team_final_score;
							} else {
								echo $item->away_team_final_score;
								echo '-';
								echo $item->home_team_final_score;
							}
						} else {
							echo '<strong>T</strong> ';
							echo $item->home_team_final_score;
							echo '-';
							echo $item->away_team_final_score;
						}
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