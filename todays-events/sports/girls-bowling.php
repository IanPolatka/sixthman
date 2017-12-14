<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'http://6thmansports.com/api/girls-bowling/todays-events/ryle');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<?php
	foreach( $data as $item ) { ?>
		<li>
	      <a href="<?php echo home_url(); ?>/girls-bowling/schedule">
	        <div class="category">
	          <div class="cat-name">Girls Bowling</div>
	          <div class="time">
	          	<?php echo $item->time; ?>
	          </div>
	        </div>
	        <div class="away-team">
	          <div class="logo">
	          	<?php if ($item->away_team_logo) { ?>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>">
				<?php } ?>
	          </div><!--  Logo  -->
	          <div class="team-name">
	          	<?php echo $item->away_team; ?>
	          </div><!--  Team Name  -->
	        </div><!--  Away Team  -->
	        <div class="home-team">
	          <div class="logo">
	          	<?php if ($item->home_team_logo) { ?>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
				<?php } ?>
	          </div>
	          <div class="team-name">
	          	<?php echo $item->home_team; ?>
	          </div><!--  Team Name  -->
	        </div><!--  Home Team  -->
	      </a>
	    </li>

	<?php
	} ?>

<?php
} ?>