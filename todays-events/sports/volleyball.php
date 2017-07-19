<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/todays-events/' . $team_name);
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
				<span class="sport-name">Volleyball</span>
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
								if ($item->game_status >= 1 ) {
									if (strtolower($item->g_one_w) == strtolower($item->away_team)) {
										$one = 1;
									} else {
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
									echo array_sum($score); 
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
								if ($item->game_status >= 1 ) {
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
									echo array_sum($score);
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
								if ($item->game_status <= 0) {
									echo $item->time;
								}
								if ($item->game_status == 1) {
									echo '<span class="game-live">1st Game</span>';
								}
								if ($item->game_status == 2) {
									echo '<span class="game-live">2nd Game</span>';
								}
								if ($item->game_status == 3) {
									echo '<span class="game-live">3rd Game</span>';
								}
								if ($item->game_status == 4) {
									echo '<span class="game-live">4th Game</span>';
								}
								if ($item->game_status == 5) {
									echo '<span class="game-live">5th Game</span>';
								}
								if ($item->game_status == 6) {
									echo 'Final';
								}
							?>
							</strong>
						</span>
					</div>
				</div>
			</a>
		</li>

	<?php } ?>

<?php } ?>