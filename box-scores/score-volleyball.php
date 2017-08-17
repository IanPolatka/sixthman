<?php

$id		 = get_field('event_id');

$request = wp_safe_remote_get( 'https://www.6thmansports.com/api/volleyball/match/' . $id );
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) {
		
foreach( $data as $item ) { ?>

<?php echo $item->home_team_first_half_score; ?>



<?php 
//  Insert data into box score on the home page
if ( is_home() ) { ?>

	<div class="box-score">

		<div class="teams">

			<div class="away-team">

				<div class="team-details">

					<div class="logo">
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="$item->away_team_school_name">
					</div>

					<div class="school-name">

						<h4><?php echo $item->away_team_abbreviated_name; ?></h4>
						<h5><?php echo $item->away_team_mascot; ?></h5>

					</div><!--  School Name  -->

				</div><!--  Team Details  -->

				<div class="score">

					<?php
					if (strtolower($item->g_one_w) == strtolower($item->away_team)) {
						$one = 1;
					}else {
						$one = 0;
					}
					if (strtolower($item->g_two_w) == strtolower($item->away_team)) {
						$two = 1;
					} else {
						$two = 0;
					}
					if (strtolower($item->g_three_w) == strtolower($item->away_team)) {
						$three = 1;
					} else {
						$three = 0;
					}
					if (strtolower($item->g_four_w) == strtolower($item->away_team)) {
						$four = 1;
					} else {
						$four = 0;
					}
					if (strtolower($item->g_five_w) == strtolower($item->away_team)) {
						$five = 1;
					} else {
						$five = 0;
					}

					$score = array($one, $two, $three, $four, $five);

					if ($item->game_status > 1)
						echo array_sum($score); 
					else {
						echo '-';
					}

					?>

				</div><!--  Score  -->

			</div><!--  Away Team  -->

			<div class="home-team">

				<div class="score">

					<?php
					if (strtolower($item->g_one_w) == strtolower($item->home_team)) {
						$one = 1;
					} else {
						$one = 0;
					}
					if (strtolower($item->g_two_w) == strtolower($item->home_team)) {
						$two = 1;
					} else {
						$two = 0;
					}
					if (strtolower($item->g_three_w) == strtolower($item->home_team)) {
						$three = 1;
					} else {
						$three = 0;
					}
					if (strtolower($item->g_four_w) == strtolower($item->home_team)) {
						$four = 1;
					} else {
						$four = 0;
					}
					if (strtolower($item->g_five_w) == strtolower($item->home_team)) {
						$five = 1;
					} else {
						$five = 0;
					}

					$score = array($one, $two, $three, $four, $five);
					
					if ($item->game_status > 1)
						echo array_sum($score); 
					else {
						echo '-';
					}

					?>

				</div><!--  Score  -->

				<div class="team-details">

					<div class="logo">
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
					</div>

					<div class="school-name">

						<h4><?php echo $item->home_team_abbreviated_name; ?></h4>
						<h5><?php echo $item->home_team_mascot; ?></h5>

					</div><!--  School Name  -->

				</div><!--  Team Details  -->

			</div><!--  Home Team  -->

		</div><!--  Teams  -->

	</div><!--  Box Score  -->

	<div class="game-status">
		<?php
			if ($item->game_status <= 0) {
				echo $item->time;
			}
			if ($item->game_status == 1) {
				echo '<span class="game-live">1st Quarter</span>';
			}
			if ($item->game_status == 2) {
				echo '<span class="game-live">2nd Quarter</span>';
			}
			if ($item->game_status == 3) {
				echo '<span class="game-live">Halftime</span>';
			}
			if ($item->game_status == 4) {
				echo '<span class="game-live">3rd Quarter</span>';
			}
			if ($item->game_status == 5) {
				echo '<span class="game-live">4th Quarter</span>';
			}
			if ($item->game_status == 6) {
				echo '<strong>Final</strong>';
			}
		?>
	</div><!--  Game Status  -->

	<?php

//  Close is Home Page check
} else { ?>

	<table class="individual-box-score">
		<thead>
			<tr>
				<th width="43%">
					<?php
						if ($item->game_status <= 0) {
							echo $item->time;
						}
						if ($item->game_status == 1) {
							echo '<span class="game-live">1st Quarter</span>';
						}
						if ($item->game_status == 2) {
							echo '<span class="game-live">2nd Quarter</span>';
						}
						if ($item->game_status == 3) {
							echo '<span class="game-live">Halftime</span>';
						}
						if ($item->game_status == 4) {
							echo '<span class="game-live">3rd Quarter</span>';
						}
						if ($item->game_status == 5) {
							echo '<span class="game-live">4th Quarter</span>';
						}
						if ($item->game_status == 6) {
							echo '<strong>Final</strong>';
						}
					?>
				</th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<?php if (isset($item->away_team_fourth_game_score) || isset($item->home_team_fourth_game_score)) { ?>
					<th>4</th>
				<?php } ?>
				<?php if (isset($item->away_team_fifth_game_score) || isset($item->home_team_fifth_game_score)) { ?>
					<th>5</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="$item->away_team_school_name">
					<strong><?php echo $item->away_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->away_team_first_game_score)) { ?>
						<?php echo $item->away_team_first_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->away_team_second_game_score)) { ?>
						<?php echo $item->away_team_second_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->away_team_third_game_score)) { ?>
						<?php echo $item->away_team_third_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>	
				</td>
				<?php if (isset($item->away_team_fourth_game_score)) { ?>
					<td>
						<?php echo $item->away_team_fourth_game_score; ?>
					</td>
				<?php } ?>
				<?php if (isset($item->away_team_fifth_game_score)) { ?>
					<td>
						<?php echo $item->away_team_fifth_game_score; ?>
					</td>
				<?php } ?>
			</tr>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="$item->home_team_school_name">
					<strong><?php echo $item->home_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->home_team_first_game_score)) { ?>
						<?php echo $item->home_team_first_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->home_team_second_game_score)) { ?>
						<?php echo $item->home_team_second_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->home_team_third_game_score)) { ?>
						<?php echo $item->home_team_third_game_score; ?>
					<?php } else { ?>
						-
					<?php } ?>	
				</td>
				<?php if (isset($item->home_team_fourth_game_score)) { ?>
					<td>
						<?php echo $item->home_team_fourth_game_score; ?>
					</td>
				<?php } ?>
				<?php if (isset($item->home_team_fifth_game_score)) { ?>
					<td>
						<?php echo $item->home_team_fifth_game_score; ?>
					</td>
				<?php } ?>
			</tr>
		</tbody>
	</table>

<?php } ?>

		<?php
		//  Close Foreach Loop

		}

	} else {
		echo 'No game to display';
	}

?>