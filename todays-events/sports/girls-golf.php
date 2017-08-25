<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/golf-girls/todays-events/' . $team_name);
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
				<span class="sport-name">Girls Golf</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">
							<?php if ($item->away_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>">
							<?php } ?>
						</span>
						<span class="team-name"><?php echo $item->away_team; ?></span>
						
					</div>
					<div class="team">
						<span class="team-logo">
							<?php if ($item->home_team_logo) { ?>
								<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
							<?php } ?>
						</span>
						<span class="team-name"><?php echo $item->home_team; ?></span>
						<span class="score" style="text-align: right;">
							<?php if (strtolower($item->winning_team) == $team_name) { ?>
								<strong><span class="winning-text">W</span></strong>
							<?php } ?>
							<?php if (strtolower($item->losing_team) == $team_name) { ?>
								<strong><span class="losing-text">L</span></strong>
							<?php } ?>
						</span>
					</div>
					<div class="game-status">
						<span class="game-time">
							<strong>

							<?php echo $item->time; ?>
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