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

	<h4 class="schedule-title"><?php echo $school_year; ?> Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if ($item->tournament_host_logo) :
						echo '<img src="https://6thmansports.com/images/team-logos/' . $item->tournament_host_logo . '">';
					endif;
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

						if ($item->result) :
							echo $item->result . ' Place';
						endif;

					echo '</td>';
				echo '</tr>';
			
			}
			?>

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

	<h4 class="schedule-title"><?php echo $school_year; ?> Junior Varsity Schedule</h4>

	<table class="schedule-table">
		<tbody>

			<?php
			foreach( $data as $item ) {

				echo '<tr>';
					echo '<td class="logo-cell">';
					if ($item->tournament_host_logo) :
						echo '<img src="https://6thmansports.com/images/team-logos/' . $item->tournament_host_logo . '">';
					endif;
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

						if ($item->result) :
							echo $item->result . ' Place';
						endif;

					echo '</td>';
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php }