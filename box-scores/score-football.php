<?php

	$id			= get_field('event_id');

	$data 		= file_get_contents('http://6thmansports.com/api/football/game/'.$id);
	$json_data 	= json_decode($data, true);
	$game 		= $json_data[0];

?>

<?php if ( is_home() ) { ?>

<div class="box-score">

	<div class="teams">

		<div class="away-team">

			<div class="team-details">

				<div class="logo">
					<img src="http://6thmansports.com/images/team-logos/<?php echo $game['away_team_logo']; ?>">
				</div>

				<div class="school-name">

					<h4><?php echo $game['away_team_abbreviated_name']; ?></h4>
					<h5><?php echo $game['away_team_mascot']; ?></h5>

				</div><!--  School Name  -->

			</div><!--  Team Details  -->

			<div class="score">

				<?php
					if ($game['game_status'] > 0) {
						if (!$game['away_team_final_score']) {
							if ($game['away_team_first_qrt_score']) {
								$fqs = $game['away_team_first_qrt_score'];
							} else {
								$fqs = 0;
							}
							if ($game['away_team_second_qrt_score']) {
								$sqs = $game['away_team_second_qrt_score'];
							} else {
								$sqs = 0;
							}
							if ($game['away_team_third_qrt_score']) {
								$tqs = $game['away_team_third_qrt_score'];
							} else {
								$tqs = 0;
							}
							if ($game['away_team_fourth_qrt_score']) {
								$ftqs = $game['away_team_fourth_qrt_score'];
							} else {
								$ftqs = 0;
							}
							if ($game['away_team_overtime_score']) {
								$os = $game['away_team_overtime_score'];
							} else {
								$os = 0;
							}

							echo $fqs + $sqs + $tqs + $ftqs + $os;

						} else {
							$game['away_team_final_score'];
						}
					} else {
						echo '-';
					}
				?>

			</div><!--  Score  -->

		</div><!--  Away Team  -->

		<div class="home-team">

			<div class="score">

				<?php
					if ($game['game_status'] > 0) {
						if (!$game['home_team_final_score']) {
							if ($game['home_team_first_qrt_score']) {
								$fqs = $game['home_team_first_qrt_score'];
							} else {
								$fqs = 0;
							}
							if ($game['home_team_second_qrt_score']) {
								$sqs = $game['home_team_second_qrt_score'];
							} else {
								$sqs = 0;
							}
							if ($game['home_team_third_qrt_score']) {
								$tqs = $game['home_team_third_qrt_score'];
							} else {
								$tqs = 0;
							}
							if ($game['home_team_fourth_qrt_score']) {
								$ftqs = $game['home_team_fourth_qrt_score'];
							} else {
								$ftqs = 0;
							}
							if ($game['home_team_overtime_score']) {
								$os = $game['home_team_overtime_score'];
							} else {
								$os = 0;
							}

							echo $fqs + $sqs + $tqs + $ftqs + $os;

							} else {
								$game['home_team_final_score'];
							}
						} else {
							echo '-';
						}
					?>

				</div><!--  Score  -->

			<div class="team-details">

				<div class="logo">
					<img src="http://6thmansports.com/images/team-logos/<?php echo $game['home_team_logo']; ?>">
				</div>

				<div class="school-name">

					<h4><?php echo $game['home_team_abbreviated_name']; ?></h4>
					<h5><?php echo $game['home_team_mascot']; ?></h5>

				</div><!--  School Name  -->

			</div><!--  Team Details  -->

		</div><!--  Home Team  -->

	</div><!--  Teams  -->

</div><!--  Box Score  -->

<div class="game-status">
	<?php
		if ($game['game_status'] <= 0) {
			echo $game['time'];
		}
		if ($game['game_status'] == 1) {
			echo '<span class="game-live">1st Quarter</span>';
		}
		if ($game['game_status'] == 2) {
			echo '<span class="game-live">2nd Quarter</span>';
		}
		if ($game['game_status'] == 3) {
			echo '<span class="game-live">Halftime</span>';
		}
		if ($game['game_status'] == 4) {
			echo '<span class="game-live">3rd Quarter</span>';
		}
		if ($game['game_status'] == 5) {
			echo '<span class="game-live">4th Quarter</span>';
		}
		if ($game['game_status'] == 6) {
			echo '<span class="game-live">Overtime</span>';
		}
		if ($game['game_status'] == 7) {
			echo 'Final';
		}
	?>
</div><!--  Game Status  -->

<?php
	if (!empty($game['minutes_remaining']) || !empty($game['seconds_remaining'])) { ?>
		<div class="game-time">
			<?php
				if ($game['minutes_remaining']) {
					echo $game['minutes_remaining'];
				}
				if ($game['seconds_remaining']) {
					echo ":" . $game['seconds_remaining'];
				}
			?>
		</div><!--  Game Time  -->
<?php } ?>





<?php } ?>