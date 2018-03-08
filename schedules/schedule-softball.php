<?php

$school_year	= get_field('school_year');
$team_name	 	= strtolower(get_field('school_name', 'option'));

?>



<div class="row">


<div class="col-lg-12">


<?php
//  Show Schedule Summary

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/softball/record/'  . $school_year . '/' . $team_name);
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body = wp_remote_retrieve_body( $request );
$data = json_decode( $body );
if( ! empty( $data ) ) { ?>

	<ul class="schedule-summary">
		<li>
			<div class="item">Overall Record</div>
			<?php echo $data[0]->Wins; ?>-<?php echo $data[0]->Losses; ?>
		</li>
		<li>
			<div class="item">District Record</div>
			<?php echo $data[0]->DistrictWins; ?>-<?php echo $data[0]->DistrictLoses; ?>
		</li>
		<li>
			<div class="item">Points For</div>
			<?php echo $data[0]->F; ?>
		</li>
		<li>
			<div class="item">Points Against</div>
			<?php echo $data[0]->A; ?>
		</li>
	</ul>

<?php
}



//  Parse out schedules

$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/softball/record/' . $school_year . '/' . $team_name . '/1');
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
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
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
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
								if (($item->away_team_softball_district) === ($item->home_team_softball_district)) :

									echo ' <em>(District Matchup)</em>';

								endif;
							echo '</div>';
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
					
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/softball/record/' . $school_year . '/' . $team_name . '/2');
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
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
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
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
								if (($item->away_team_softball_district) === ($item->home_team_softball_district)) :

									echo ' <em>(District Matchup)</em>';

								endif;
							echo '</div>';
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
					
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}



$request 		= wp_safe_remote_get( 'https://6thmansports.com/api/softball/schedule/' . $school_year . '/' . $team_name . '/3');
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
					if (strtolower($item->away_team) == strtolower($team_name)) :
						if ($item->home_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->home_team_logo . '">';
						endif;
					else :
						if ($item->away_team_logo) :
							echo '<img src="https://6thmansports.com/images/team-logos/' . $item->away_team_logo . '">';
						endif;
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
								if (strtolower($item->away_team) == strtolower($team_name)) :
									echo 'at ' . '<strong>' . $item->home_team . '</strong>';
								else :
									echo 'vs ' . '<strong>' . $item->away_team . '</strong>';
								endif;
								if (($item->away_team_softball_district) === ($item->home_team_softball_district)) :

									echo ' <em>(District Matchup)</em>';

								endif;
							echo '</div>';
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
					
				echo '</tr>';
			
			}
			?>

		</tbody>
	</table>

<?php
}
?>



</div><!--  Col  -->

</div><!--  Row  -->



