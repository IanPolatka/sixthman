<?php

$team_name	 	= strtolower(get_field('school_name', 'option'));

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/wrestling/todays-events/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<?php
	foreach( $data as $item ) { ?>


		<li>
	      <a href="<?php echo home_url(); ?>/swimming/schedule/">
	        <div class="category">
	          	<div class="cat-name">Wrestling</div>
	          	<div class="time"><?php echo $item->time; ?></div>
	        </div>
	        <div class="away-team">
	        	<?php if ($item->schedule_for_logo) { ?>
	          		<div class="logo">
	          			<img src="https://6thmansports.com/images/team-logos/<?php echo $item->schedule_for_logo; ?>" alt="<?php echo $item->schedule_for; ?>">
	          		</div>
	          	<?php } ?>
	          <div class="team-name"><?php echo $item->schedule_for; ?></div>
	        </div>
	        <div class="home-team">
	        	<div class="logo">
	          		<img src="https://6thmansports.com/images/team-logos/<?php echo $item->tournament_host_logo; ?>" alt="<?php echo $item->schedule_for; ?>">
	          	</div>
	         	<div class="team-name"><?php echo $item->tournament_title; ?></div>
	        </div>
	      </a>
	    </li>

	<?php
	} ?>

<?php
} ?>