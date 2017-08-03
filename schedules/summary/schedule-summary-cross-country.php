<?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/cross-country/schedule-summary/' . $school_year . '/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<div class="most-recent-games-title">
		<h5>Latest Games</h5>
	</div>

	<div class="most-recent-games">
		<?php
		foreach( $data as $item ) { ?>

			<div class="game">

				<?php
				$source = $item->date;
				$date = new DateTime($source);
				?>
				<div><?php echo $date->format('l'); ?></div>
				<div><?php echo $date->format('M j'); ?></div>
				<div><strong><?php echo  $item->time; ?></strong></div>

				<?php if (strtolower($item->host_school) == strtolower($team_name)) { ?>
					<div class="team-logo-box">
						<?php 
						if ($item->host_school_logo) { ?>
							<img src="https://6thmansports.com/images/team-logos/<?php echo $item->host_school_logo; ?>" 
							alt="<?php echo $item->host_school ?>" title="<?php echo $item->host_school ?>">
						<?php } ?>
					</div><!--  Team Logo Box  -->
					<br />
					<?php echo $item->host_school ?><br />
				<?php } else { ?>
					<div class="team-logo-box">
						<?php 
						if ($item->host_school_logo) { ?>
							<img src="https://6thmansports.com/images/team-logos/<?php echo $item->host_school_logo; ?>" 
							alt="<?php echo $item->host_school ?>" title="<?php echo $item->host_school ?>">
						<?php } ?>
					</div><!--  Team Logo Box  -->
					@<br />
					<?php echo $item->host_school ?><br />
				<?php } ?>

			</div><!--  Game  -->
			
		<?php } ?>

		<div class="game">

			<a href="<?php echo home_url(); ?>/<?php echo 'cross-country/schedule'; ?>">

				<i class="fa fa-calendar-o" aria-hidden="true"></i>

				<div>See Full Schedule</div>

			</a>

		</div><!--  Game  -->

	</div><!--  Most Recent Games  -->

<?php } ?>