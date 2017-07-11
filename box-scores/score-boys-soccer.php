<?php

$id		 = get_field('event_id');

$request = wp_safe_remote_get( 'https://www.6thmansports.com/api/soccer-boys/game/' . $id );
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) {
		
foreach( $data as $item ) { ?>

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
						if ($item->game_status > 0 || $item->minutes_remaining) {
							if (!$item->away_team_final_score) {
								if ($item->away_team_first_half_score) {
									$fhs = $item->away_team_first_half_score;
								} else {
									$fhs = 0;
								}
								if ($item->away_team_second_half_score) {
									$shs = $item->away_team_second_half_score;
								} else {
									$shs = 0;
								}
								if ($item->away_team_overtime_score) {
									$os = $item->away_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fhs + $shs + $os;

							} else {
								echo $item->away_team_final_score;
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
						if ($item->game_status > 0 || isset($item->minutes_remaining)) {
							if (!$item->home_team_final_score) {
								if ($item->home_team_first_half_score) {
									$fhs = $item->home_team_first_half_score;
								} else {
									$fhs = 0;
								}
								if ($item->home_team_second_half_score) {
									$shs = $item->home_team_second_half_score;
								} else {
									$shs = 0;
								}
								if ($item->home_team_overtime_score) {
									$os = $item->home_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fhs + $shs + $os;

							} else {
								$item->home_team_final_score;
							}
						} else {
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
			if ($item->game_status <= 0 && !isset($item->minutes_remaining)) {
				echo $item->time;
			}
			if ($item->game_status == 1) {
				echo '<span class="game-live">1st Half</span>';
			}
			if ($item->game_status == 2) {
				echo '<span class="game-live">Halftime</span>';
			}
			if ($item->game_status == 3) {
				echo '<span class="game-live">2nd Half</span>';
			}
			if ($item->game_status == 4) {
				echo '<span class="game-live">Overtime</span>';
			}
			if ($item->game_status == 5) {
				echo 'Final';
			}
		?>
	</div><!--  Game Status  -->

	<?php
	if (!empty($item->minutes_remaining) || !empty($item->seconds_remaining)) { ?>
		<div class="game-time">
			<?php
				if ($item->minutes_remaining) {
					echo '<div class="game-live">' . $item->minutes_remaining . '\'</div>';
				}
			?>
		</div><!--  Game Time  -->

	<?php 
	//  Close Minutes/Seconds Remaining
	}

//  Close is Home Page check
} else { ?>

	<table class="individual-box-score">
		<thead>
			<tr>
				<th width="65%">
					<?php
						if ($item->game_status <= 0) {
							echo $item->time;
						}
						if ($item->game_status == 1) {
							echo '<span class="game-live">1st Half</span>';
						}
						if ($item->game_status == 2) {
							echo '<span class="game-live">Halftime</span>';
						}
						if ($item->game_status == 3) {
							echo '<span class="game-live">2nd Half</span>';
						}
						if ($item->game_status == 4) {
							echo '<span class="game-live">Overtime</span>';
						}
						if ($item->game_status == 5) {
							echo 'Final';
						}
					?>
				</th>
				<th>1</th>
				<th>2</th>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
				<th>OT</th>
				<?php } ?>
				<th>
					<?php if ($item->game_status > 6) {
						echo 'F';
					} else {
						echo 'T';
					} ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="$item->away_team_school_name">
					<strong><?php echo $item->away_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->away_team_first_half_score)) { ?>
						<?php echo $item->away_team_first_half_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->away_team_second_half_score)) { ?>
						<?php echo $item->away_team_second_half_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
					<td>
						<?php if (isset($item->away_team_overtime_score)) { ?>
							<?php echo $item->away_team_overtime_score; ?>
						<?php } else { ?>
							-
						<?php } ?>
					</td>
				<?php } ?>
				<td>
					<?php
						if ($item->game_status > 0) {
							if (isset($item->away_team_final_score)) {
								echo '<strong>' . $item->away_team_final_score . '</strong>';
							} else {
								if ($item->away_team_first_half_score) {
									$fhs = $item->away_team_first_qrt_score;
								} else {
									$fhs = 0;
								}
								if ($item->away_team_second_half_score) {
									$shs = $item->away_team_second_qrt_score;
								} else {
									$shs = 0;
								}
								if ($item->away_team_overtime_score) {
									$os = $item->away_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fhs + $shs + $os;
							}
						} else {
							echo '-';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="$item->home_team_school_name">
					<strong><?php echo $item->home_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->home_team_first_half_score)) { ?>
						<?php echo $item->home_team_first_half_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->home_team_second_half_score)) { ?>
						<?php echo $item->home_team_second_half_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
					<td>
						<?php if (isset($item->home_team_overtime_score)) { ?>
							<?php echo $item->home_team_overtime_score; ?>
						<?php } else { ?>
							-
						<?php } ?>
					</td>
				<?php } ?>
				<td>
					<?php
						if ($item->game_status > 0) {
							if (isset($item->home_team_final_score)) {
								echo '<strong>' . $item->home_team_final_score . '</strong>';
							} else {
								if ($item->home_team_first_half_score) {
									$fhs = $item->home_team_first_half_score;
								} else {
									$fhs = 0;
								}
								if ($item->home_team_second_half_score) {
									$shs = $item->home_team_second_half_score;
								} else {
									$shs = 0;
								}
								if ($item->home_team_overtime_score) {
									$os = $item->home_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fhs + $shs + $os;
							}
						} else {
							echo '-';
						}
					?>
				</td>
			</tr>
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