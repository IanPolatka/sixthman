 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));




//  Show Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/wrestling/schedule/' . $school_year . '/' . $team_name . '/1');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4>Varsity Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php if ($item->meet_location) { ?>
						<div class="text-muted"><small><?php echo $item->meet_location; ?></small></div>
					<?php } ?>
					<?php if ($item->host_school_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->host_school_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php } ?>
					<?php if ($item->tournament_title) { ?>
						<strong><?php echo $item->tournament_title; ?></strong>
					<?php } ?>
				</td>
				<td>
					<?php if (($item->boys_result) || ($item->girls_result)) {
						if ($item->boys_result) {
							echo '<div><small>Boys Place: ' . $item->boys_result . '</small></div>';
						}
						if ($item->girls_result) {
							echo '<div><small>Girls Place: ' . $item->girls_result . '</small><div>';
						}
					} else {
						echo $item->time;
					} ?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php }




//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/wrestling/schedule/' . $school_year . '/' . $team_name . '/2');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4>Junior Varsity Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php if ($item->meet_location) { ?>
						<div class="text-muted"><small><?php echo $item->meet_location; ?></small></div>
					<?php } ?>
					<?php if ($item->host_school_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->host_school_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php } ?>
					<?php if ($item->tournament_title) { ?>
						<strong><?php echo $item->tournament_title; ?></strong>
					<?php } ?>
				</td>
				<td>
					<?php if (($item->boys_result) || ($item->girls_result)) {
						if ($item->boys_result) {
							echo '<div><small>Boys Place: ' . $item->boys_result . '</small></div>';
						}
						if ($item->girls_result) {
							echo '<div><small>Girls Place: ' . $item->girls_result . '</small><div>';
						}
					} else {
						echo $item->time;
					} ?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php }



//  Show Freshman Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/wrestling/schedule/' . $school_year . '/' . $team_name . '/3');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4>Freshman Schedule</h4>

	<table class="schedule-table">

		<tbody>
		
		<?php
		foreach( $data as $item ) { ?>

			<tr>
				<td class="schedule-date">
					<?php
					$source = $item->date;
					$date = new DateTime($source);
					?>
					<div><?php echo $date->format('l'); ?></div>
					<div><?php echo $date->format('M j, Y'); ?></div>
				</td>
				<td class="opponent">
					<?php if ($item->meet_location) { ?>
						<div class="text-muted"><small><?php echo $item->meet_location; ?></small></div>
					<?php } ?>
					<?php if ($item->host_school_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->host_school_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php } ?>
					<?php if ($item->tournament_title) { ?>
						<strong><?php echo $item->tournament_title; ?></strong>
					<?php } ?>
				</td>
				<td>
					<?php if (($item->boys_result) || ($item->girls_result)) {
						if ($item->boys_result) {
							echo '<div><small>Boys Place: ' . $item->boys_result . '</small></div>';
						}
						if ($item->girls_result) {
							echo '<div><small>Girls Place: ' . $item->girls_result . '</small><div>';
						}
					} else {
						echo $item->time;
					} ?>
				</td>
			</tr>

		<?php } ?>

		</tbody>
			
	</table>

<?php } ?>