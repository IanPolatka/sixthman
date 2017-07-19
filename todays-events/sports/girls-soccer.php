<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/soccer-girls/todays-events/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<?php
	foreach( $data as $item ) { ?>
		<li>
			<a href="">
				<span class="sport-name">Girls Soccer</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">
							<?php if ($item->away_team_logo) { ?>
								<img src="http://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>">
							<?php } ?>
						</span>
						<span class="team-name"><?php echo $item->away_team; ?></span>
						<span class="score">
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
						</span>
					</div>
					<div class="team">
						<span class="team-logo">
							<?php if ($item->home_team_logo) { ?>
								<img src="http://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
							<?php } ?>
						</span>
						<span class="team-name"><?php echo $item->home_team; ?></span>
						<span class="score">
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
										echo $item->home_team_final_score;
									}
								} else {
									echo '-';
								}
							?>
						</span>
					</div>
					<div class="game-status">
						<span class="game-time">
							<strong>
							<?php
								if (($item->game_status > 0) && ($item->game_status < 5)) {
									if ($item->minutes_remaining) {
										echo '<span class="live">' . $item->minutes_remaining . '\'</span>';
									} else {
										if ($item->game_status == 1) {
											echo '<span class="live">1st Half</span>';
										}
										if ($item->game_status == 2) {
											echo '<span class="live">Halftime</span>';
										}
										if ($item->game_status == 3) {
											echo '<span class="live">2nd Half</span>';
										}
										if ($item->game_status == 4) {
											echo '<span class="live">Overtime</span>';
										}
									}
								} elseif ($item->game_status == 5) {
									echo 'Final';
								} else {
									echo $item->time;
								}
							?>
							</strong>
						</span>
					</div>
				</div>
			</a>
		</li>

	<?php
	} ?>

<?php
} ?>