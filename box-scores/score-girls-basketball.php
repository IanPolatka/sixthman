<style>

.text-white {
	color: #fff;
}

@media screen and (max-width: 650px) {

	#away_team_mascot, #home_team_mascot {
		display: none;
	}

	.scoreboard {
		display: flex;
		flex-direction: row;
		padding: 10px 0;
		border-bottom: 1px solid #dddddd;
		align-items: center;
	}

	.team-logo {
		height: 35px;
		width: 35px;
		order: 1;
		margin-bottom: 5px;
	}

	.a-team {
		flex: 1;
		display: flex;
		margin-left: 10px;
	}

	.a-team .score {
		text-align: right;
		justify-content: flex-end;
		margin-bottom: 0;
	}

	.a-team .team-information {
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    flex: 2;
	}

	.h-team {
		flex: 1;
		display: flex;
		margin-right: 10px;
	}

	.h-team .team-information {
	    display: flex;
	    flex-direction: column;
	    align-items: center;
	    flex: 2;
	}

	.details {
		flex: 1;
		text-align: center;
		font-size: .8em;
	}

	.team-details {
		flex-direction: row;
		order: 2;
	}

	.team-details h4 {
		font-size: .7em;
		margin: 0;
	}

	.team-information {
		display: flex;
		flex-direction: column;
		align-items: center;
		flex: 2;
	}

	.scoreboard .score {
		border: none !important;
		padding: 0 !important;
		flex: 2 !important;
		font-size: 1.6em !important;
		align-self: center;
		margin-bottom: 0;
	}

	.possession {
		flex: 1;
		font-size: .6em;
		align-self: center;
		text-align: center;
	}

	#tournament-title {
		display: block;
		min-width: 100%;
		text-align: center;
		padding: 10px 0;
		color: #000000;
		font-size: .75em;
		background: #f9f9f9;
		margin: -15px -15px 15px -15px;
	}

}



@media screen and (min-width: 651px) and (max-width: 767px) {

	.scoreboard {
		display: flex !important;
		align-items: center;
		text-transform: uppercase;
		padding: 15px 0;
		border-bottom: 1px solid #dddddd;
	}

	#tournament-title {
		display: block;
		min-width: 100%;
		text-align: center;
		padding: 10px 0;
		color: #000000;
		font-size: .75em;
		background: #f9f9f9;
		margin: -15px -15px 15px -15px;
	}

	.team-information {
		display: flex;
		flex-direction: row;
		align-items: center;
		flex: 2;
	}

	.a-team .team-information {
		justify-content: flex-end;
	}

	.scoreboard .team-logo {
		height: 35px;
		width: 35px;
		margin: 0 10px;
	}

	.scoreboard h4 {
		margin: 0px;
		line-height: 1;
		padding: 0;
	}

	.scoreboad small {
		line-height: 1;
		margin: 0;
	}

	.a-team {
		flex: 2;
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: flex-end;
		margin-left: 10px;
	}

	.a-team .team-details {
		text-align: right;
		flex-direction: column !important;
		justify-content: flex-end !important;
	}

	.a-team > .score {
		margin: 0 10px;
		border: none;
	}

	.details {
		flex: 1;
		text-align: center;
		font-size: .8em;
	}

	.details div {
		margin: 0;
	}

	.h-team {
		flex: 2;
		display: flex !important;
		flex-direction: row;
		align-items: center;
		justify-content: flex-start;
		margin-right: 10px;
	}

	.h-team .team-details {
		text-align: left;
		flex-direction: column !important;
	}

	.h-team > .score {
		margin: 0 10px;
		border: none;
	}

	.featured-description {
		padding: 20px;
	}

	.possession {
		font-size: .5em;
	}

}



@media screen and (min-width: 768px) and (max-width: 899px) {

	#away_team_mascot, #home_team_mascot {
		display: none;
	}

	.scoreboard {
		display: flex;
		flex-direction: row;
		padding: 10px 0;
		border-bottom: 1px solid #dddddd;
		align-items: center;
	}

	.team-logo {
		height: 35px;
		width: 35px;
		order: 1;
		margin-bottom: 5px;
	}

	.a-team {
		flex: 2;
		display: flex;
		margin-left: 10px;
	}

	.a-team .score {
		text-align: center;
		margin-bottom: 0;
		align-self: center;
	}

	.h-team {
		flex: 2;
		display: flex;
		margin-right: 10px;
	}

	.h-team .score {
		text-align: center;
		margin-bottom: 0;
		align-self: center;
	}

	.h-team .team-information {
		justify-content: flex-start !important;
	}

	.details {
		flex: 1;
		text-align: center;
		font-size: .8em;
	}

	.team-details {
		flex-direction: row;
		order: 2;
	}

	.team-details h4 {
		font-size: .7em;
		margin: 0;
	}

	.team-information {
		display: flex;
		flex-direction: column;
		align-items: center;
		flex: 2;
	}

	.scoreboard .score {
		border: none !important;
		padding: 0 !important;
		flex: 1 !important;
		font-size: 1.6em !important;
	}

	.possession {
		flex: 1;
		font-size: .6em;
		align-self: center;
		text-align: center;
	}

	#tournament-title {
		display: block;
		min-width: 100%;
		text-align: center;
		padding: 10px 0;
		color: #000000;
		font-size: .75em;
		background: #f9f9f9;
		margin: -15px -15px 15px -15px;
	}

}



@media screen and (min-width: 900px) {

	.scoreboard {
		display: flex !important;
		align-items: center;
		text-transform: uppercase;
		padding: 15px 0;
		border-bottom: 1px solid #dddddd;
	}

	#tournament-title {
		display: block;
		min-width: 100%;
		text-align: center;
		padding: 10px 0;
		color: #000000;
		font-size: .75em;
		background: #f9f9f9;
		margin: -15px -15px 15px -15px;
	}

	.team-information {
		display: flex;
		flex-direction: row;
		align-items: center;
		flex: 2;
	}

	.a-team .team-information {
		justify-content: flex-end;
	}

	.scoreboard .team-logo {
		height: 35px;
		width: 35px;
		margin: 0 40px;
	}

	.scoreboard h4 {
		margin: 0px;
		line-height: 1;
		padding: 0;
	}

	.scoreboad small {
		line-height: 1;
		margin: 0;
	}

	.a-team {
		flex: 2;
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: flex-end;
		margin-left: 10px;
	}

	.a-team .team-details {
		text-align: center;
		flex-direction: column !important;
		justify-content: center !important;
	}

	.a-team > .score {
		margin: 0 10px;
		border: none;
	}



	.details {
		flex: 1;
		text-align: center;
		font-size: .8em;
	}

	.details div {
		margin: 0;
	}

	.h-team {
		flex: 2;
		display: flex !important;
		flex-direction: row;
		align-items: center;
		justify-content: flex-start;
		margin-right: 10px;
	}

	.h-team .team-details {
		text-align: center;
		flex-direction: column !important;
	}

	.h-team > .score {
		margin: 0 10px;
		border: none;
	}

	.h-team .team-information {
		justify-content: flex-start !important;
	}

	.featured-description {
		padding: 20px;
	}

	.possession {
		font-size: .5em;
	}

}



</style>

<?php

$id		 = get_field('event_id');

$request = wp_safe_remote_get( 'https://6thmansports.com/api/girls-basketball/game/' . $id );
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body 	= wp_remote_retrieve_body( $request );
$data 	= json_decode( $body );
if( ! empty( $data ) ) {
		
foreach( $data as $item ) { ?>

<?php 
//  Insert data into box score on the home page
if ( is_home() ) {

	wp_enqueue_script( 'girls-basketball', get_template_directory_uri() . '/box-scores/score-girls-basketball.js', array(), '20151215', true );

	?>
  
		<div id="tournament-title"></div>

			<div class="scoreboard">
								  
				<div class="a-team">

					<div class="team-information">
								    
						<div class="team-details">

							<h4 id="away_team"></h4>
							<small id="away_team_mascot"></small>
									      
						</div>
									    
						<div class="team-logo">
									      
							<img id="away_team_image" />
									      
						</div>

					</div><!--  Team Information  -->

					<h1 id="away_team_final_score" class="score"></h1>
								    
				</div><!--  away-team  -->
								  
				<div class="details">

					<div id="status"></div>
						
					<div><span id="minutes"></span><span id="seconds"></span></div>
								    
				</div><!--  Details  -->
								  
				<div class="h-team">
								    
					<h1 id="home_team_final_score" class="score"></h1>

					<div class="team-information">
								    
						<div class="team-logo">
									      
							<img id="home_team_image" />
									      
						</div>
									    
						<div class="team-details">

							<h4 id="home_team"></h4>
							<small id="home_team_mascot"></small>
									      
						</div>

					</div>
								    
				</div><!--  home-team  -->
								  
			</div><!--  Scoreboard  -->

<?php

//  Close is Home Page check
} else { ?>

	<table class="individual-box-score">
		<thead>
			<tr>
				<th width="43%">
					<?php
						if ($item->game_status <= 0) {
							echo $item->time;
						}
						if ($item->game_status == 1) {
							echo '<span class="game-live">1st Quarter</span>';
						}
						if ($item->game_status == 2) {
							echo '<span class="game-live">2nd Quarter</span>';
						}
						if ($item->game_status == 3) {
							echo '<span class="game-live">Halftime</span>';
						}
						if ($item->game_status == 4) {
							echo '<span class="game-live">3rd Quarter</span>';
						}
						if ($item->game_status == 5) {
							echo '<span class="game-live">4th Quarter</span>';
						}
						if ($item->game_status == 6) {
							echo '<span class="game-live">Overtime</span>';
						}
						if ($item->game_status == 7) {
							echo 'Final';
						}
					?>
				</th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
				<th>OT</th>
				<?php } ?>
				<th>
					<?php if ($item->game_status > 6) {
						echo 'F';
					} else {
						echo 'T';
					} ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="$item->away_team_school_name">
					<strong><?php echo $item->away_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->away_team_first_qrt_score)) { ?>
						<?php echo $item->away_team_first_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->away_team_second_qrt_score)) { ?>
						<?php echo $item->away_team_second_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->away_team_third_qrt_score)) { ?>
						<?php echo $item->away_team_third_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>	
				</td>
				<td>
					<?php if (isset($item->away_team_fourth_qrt_score)) { ?>
						<?php echo $item->away_team_fourth_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
					<td>
						<?php if (isset($item->away_team_overtime_score)) { ?>
							<?php echo $item->away_team_overtime_score; ?>
						<?php } else { ?>
							-
						<?php } ?>
					</td>
				<?php } ?>
				<td>
					<?php
						if ($item->game_status > 0) {
							if (isset($item->away_team_final_score)) {
								echo '<strong>' . $item->away_team_final_score . '</strong>';
							} else {
								if ($item->away_team_first_qrt_score) {
									$fqs = $item->away_team_first_qrt_score;
								} else {
									$fqs = 0;
								}
								if ($item->away_team_second_qrt_score) {
									$sqs = $item->away_team_second_qrt_score;
								} else {
									$sqs = 0;
								}
								if ($item->away_team_third_qrt_score) {
									$tqs = $item->away_team_third_qrt_score;
								} else {
									$tqs = 0;
								}
								if ($item->away_team_fourth_qrt_score) {
									$ftqs = $item->away_team_fourth_qrt_score;
								} else {
									$ftqs = 0;
								}
								if ($item->away_team_overtime_score) {
									$os = $item->away_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fqs + $sqs + $tqs + $ftqs + $os;
							}
						} else {
							echo '-';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>" alt="$item->home_team_school_name">
					<strong><?php echo $item->home_team_abbreviated_name; ?></strong>
				</td>
				<td>
					<?php if (isset($item->home_team_first_qrt_score)) { ?>
						<?php echo $item->home_team_first_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->home_team_second_qrt_score)) { ?>
						<?php echo $item->home_team_second_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<td>
					<?php if (isset($item->home_team_third_qrt_score)) { ?>
						<?php echo $item->home_team_third_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>	
				</td>
				<td>
					<?php if (isset($item->home_team_fourth_qrt_score)) { ?>
						<?php echo $item->home_team_fourth_qrt_score; ?>
					<?php } else { ?>
						-
					<?php } ?>
				</td>
				<?php if (isset($item->away_team_overtime_score) || isset($item->home_team_overtime_score)) { ?>
					<td>
						<?php if (isset($item->home_team_overtime_score)) { ?>
							<?php echo $item->home_team_overtime_score; ?>
						<?php } else { ?>
							-
						<?php } ?>
					</td>
				<?php } ?>
				<td>
					<?php
						if ($item->game_status > 0) {
							if (isset($item->home_team_final_score)) {
								echo '<strong>' . $item->home_team_final_score . '</strong>';
							} else {
								if ($item->home_team_first_qrt_score) {
									$fqs = $item->home_team_first_qrt_score;
								} else {
									$fqs = 0;
								}
								if ($item->home_team_second_qrt_score) {
									$sqs = $item->home_team_second_qrt_score;
								} else {
									$sqs = 0;
								}
								if ($item->home_team_third_qrt_score) {
									$tqs = $item->home_team_third_qrt_score;
								} else {
									$tqs = 0;
								}
								if ($item->home_team_fourth_qrt_score) {
									$ftqs = $item->home_team_fourth_qrt_score;
								} else {
									$ftqs = 0;
								}
								if ($item->home_team_overtime_score) {
									$os = $item->home_team_overtime_score;
								} else {
									$os = 0;
								}

								echo $fqs + $sqs + $tqs + $ftqs + $os;
							}
						} else {
							echo '-';
						}
					?>
				</td>
			</tr>
			</tr>
		</tbody>
	</table>

<?php } ?>

		<?php
		//  Close Foreach Loop

		}

	} else {
		echo 'No game to display';
	}

?>