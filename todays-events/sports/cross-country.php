<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/cross-country/todays-events/' . $team_name);
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
				<span class="sport-name">Cross Country</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">
							<?php
							echo $item->tournament_title;
							?>
						</span>
					</div>
					<div class="game-status">
						<span class="game-time">
							<strong>
							<?php
								echo $item->time;
							?>
							</strong>
						</span>
					</div>
				</div>
			</a>
		</li>

	<?php } ?>

<?php } ?>