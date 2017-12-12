 <?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));


//  Show Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/swimming/schedule/' . $school_year . '/' . $team_name . '/1');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4 class="schedule-title"><?php echo $school_year; ?> Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if ($item->tournament_host_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->tournament_host_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php }
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';
						echo '<div class="event-results">';
						if ($item->boys_result) :
							echo '<strong>Boys Result:</strong> ' . $item->boys_result . ' Place';
						endif;
						if ($item->boys_result && $item->girls_result) :
							echo '<br />';
						endif;
						if ($item->girls_result) :
							echo '<strong>Girls Result:</strong> ' . $item->girls_result . ' Place';
						endif;
						echo '</div>';
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php } ?>



<?php
//  Show Junior Varsity Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/swimming/schedule/' . $school_year . '/' . $team_name . '/2');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4 class="schedule-title"><?php echo $school_year; ?> Junior Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if ($item->tournament_host_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->tournament_host_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php }
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';
						echo '<div class="event-results">';
						if ($item->boys_result) :
							echo '<strong>Boys Result:</strong> ' . $item->boys_result . ' Place';
						endif;
						if ($item->boys_result && $item->girls_result) :
							echo '<br />';
						endif;
						if ($item->girls_result) :
							echo '<strong>Girls Result:</strong> ' . $item->girls_result . ' Place';
						endif;
						echo '</div>';
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php } ?>



<?php
//  Show Freshman Schedule

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/swimming/schedule/' . $school_year . '/' . $team_name . '/3');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<h4 class="schedule-title"><?php echo $school_year; ?> Freshman Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if ($item->tournament_host_logo) { ?>
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->tournament_host_logo; ?>" 
						alt="<?php echo $item->host_school; ?>" title="<?php echo $item->host_school; ?>">
					<?php }
					echo '</td>';
					echo '<td>';
						echo '<div class="the-game-details">';
							if ($item->tournament_title) :
								echo '<div class="tourney">';

									echo '<span class="tournament-title">';
									echo $item->tournament_title;
									echo '</span>';

								echo '</div>';
							endif;
							echo '<div>';
								$source = $item->date;
								$date = new DateTime($source);
								echo $date->format('l') . '  ' . $date->format('M j, Y'); // 31.07.2012
							echo '</div>';
							echo '<div>';
								echo $item->time;
							echo '</div>';
						echo '</div>';
					echo '</td>';
					echo '<td>';
						echo '<div class="event-results">';
						if ($item->boys_result) :
							echo '<strong>Boys Result:</strong> ' . $item->boys_result . ' Place';
						endif;
						if ($item->boys_result && $item->girls_result) :
							echo '<br />';
						endif;
						if ($item->girls_result) :
							echo '<strong>Girls Result:</strong> ' . $item->girls_result . ' Place';
						endif;
						echo '</div>';
					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php } ?>