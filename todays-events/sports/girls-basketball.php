<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'http://6thmansports.com/api/girls-basketball/todays-events/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<?php
	foreach( $data as $item ) { ?>
		<li>
	      <a href="<?php echo home_url(); ?>/girls-basketball/schedule">
	        <div class="category">
	          <div class="cat-name">Girls Basketball</div>
	          <div class="time">
	          	<?php
					if ($item->game_status <= 0) {
						echo $item->time;
					}
					if ($item->game_status == 1) {
						echo '<span class="live">1st Quarter</span>';
					}
					if ($item->game_status == 2) {
						echo '<span class="live">2nd Quarter</span>';
					}
					if ($item->game_status == 3) {
						echo '<span class="live">Halftime</span>';
					}
					if ($item->game_status == 4) {
						echo '<span class="live">3rd Quarter</span>';
					}
					if ($item->game_status == 5) {
						echo '<span class="live">4th Quarter</span>';
					}
					if ($item->game_status == 6) {
						echo '<span class="live">Overtime</span>';
					}
					if ($item->game_status == 7) {
						echo 'Final';
					}
				?>
	          </div>
	        </div>
	        <div class="away-team">
	          <div class="logo">
	          	<?php if ($item->away_team_logo) { ?>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>">
				<?php } ?>
	          </div>
	          <div class="team-name">
	          	<?php if ($item->away_team_final_score > $item->home_team_final_score) { ?>
	          		<strong>
	          	<?php } ?>
	          	<?php echo $item->away_team; ?>
	          	<?php if ($item->home_team_final_score > $item->away_team_final_score) { ?>
	          		</strong>
	          	<?php } ?>
	          </div>
	          <div class="score">
	          	<?php if ($item->away_team_final_score > $item->home_team_final_score) { ?>
	          		<strong>
	          	<?php } ?>
	          	<?php
					if ($item->game_status > 0) {
						if (!$item->away_team_final_score) {
							if ($item->away_team_first_qrt_score) {
								$fqs = $item->away_team_first_qrt_score;
							} else {
								$fqs = 0;
							}
							if ($item->away_team_second_qrt_score) {
								$sqs = $item->away_team_second_qrt_score;
							} else {
								$sqs = 0;
							}
							if ($item->away_team_third_qrt_score) {
								$tqs = $item->away_team_third_qrt_score;
							} else {
								$tqs = 0;
							}
							if ($item->away_team_fourth_qrt_score) {
								$ftqs = $item->away_team_fourth_qrt_score;
							} else {
								$ftqs = 0;
							}
							if ($item->away_team_overtime_score) {
								$os = $item->away_team_overtime_score;
							} else {
								$os = 0;
							}

							echo $fqs + $sqs + $tqs + $ftqs + $os;

						} else {
							echo $item->away_team_final_score;
						}
					} else {
						echo '-';
					}
				?>
				<?php if ($item->away_team_final_score > $item->home_team_final_score) { ?>
	          		</strong>
	          	<?php } ?>
	          </div>
	        </div>
	        <div class="home-team">
	          <div class="logo">
	          	<?php if ($item->home_team_logo) { ?>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
				<?php } ?>
	          </div>
	          <div class="team-name">
	          	<?php if ($item->home_team_final_score > $item->away_team_final_score) { ?>
	          		<strong>
	          	<?php } ?>
	          		<?php echo $item->home_team; ?>
	          	<?php if ($item->home_team_final_score > $item->away_team_final_score) { ?>
	          		</strong>
	          	<?php } ?>
	          </div>
	          <div class="score">
	          	<?php if ($item->home_team_final_score > $item->away_team_final_score) { ?>
	          		<strong>
	          	<?php } ?>
	          	<?php
					if ($item->game_status > 0) {
						if (!$item->home_team_final_score) {
							if ($item->home_team_first_qrt_score) {
								$fqs = $item->home_team_first_qrt_score;
							} else {
								$fqs = 0;
							}
							if ($item->home_team_second_qrt_score) {
								$sqs = $item->home_team_second_qrt_score;
							} else {
								$sqs = 0;
							}
							if ($item->home_team_third_qrt_score) {
								$tqs = $item->home_team_third_qrt_score;
							} else {
								$tqs = 0;
							}
							if ($item->home_team_fourth_qrt_score) {
								$ftqs = $item->home_team_fourth_qrt_score;
							} else {
								$ftqs = 0;
							}
							if ($item->home_team_overtime_score) {
								$os = $item->home_team_overtime_score;
							} else {
								$os = 0;
							}

							echo $fqs + $sqs + $tqs + $ftqs + $os;

						} else {
							echo $item->home_team_final_score;
						}
					} else {
						echo '-';
					}
				?>
				<?php if ($item->home_team_final_score > $item->away_team_final_score) { ?>
	          		</strong>
	          	<?php } ?>
	          </div>
	        </div>
	      </a>
	    </li>

	<?php
	} ?>

<?php
} ?>