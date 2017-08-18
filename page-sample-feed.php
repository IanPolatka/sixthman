<?php
/**
 * Template Name: Sample Feed
 *
 * @package sixthman
 */

get_header(); ?>


<div class="container">

	<div id="primary" class="content-area">

		<?php if( get_field('alert_news_alert', 'option') || get_field('information_news_alert', 'option')): ?>

			<div class="hero-unit hero-unit-lite-padding">

		<?php else : ?>

			<div class="hero-unit">

		<?php endif; ?>

				<div class="featured-post">

					<?php
						// WP_Query arguments
						$args = array(
							'posts_per_page' => 1,
							'post__in'  => get_option( 'sticky_posts' ),
							'ignore_sticky_posts' => 1
						);

						// The Query
						query_posts( $args );

						if ( have_posts() ) {
						 
							// The Loop
							while ( have_posts() ) : the_post(); ?>

								<div class="featured-image">

									<?php 

									if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>">
											<img src="https://camelpride.com/wp-content/uploads/2017/07/backdrop-1.jpg">
										</a>
									<?php
									} ?>
										
								</div>

								<div class="category"><?php echo get_the_category_list(); ?></div>
							    
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<?php

$request = wp_safe_remote_get( 'https://www.6thmansports.com/api/football/game/47');
if( is_wp_error( $request ) ) {
	return false; // Bail early
}

$body 	= wp_remote_retrieve_body( $request );
$data 	= json_decode( $body );
if( ! empty( $data ) ) {
		
foreach( $data as $item ) { ?>

<?php 
//  Insert data into box score on the home page

	echo $item->game_status; ?>

	<div class="box-score">

		<div class="teams">

			<div class="away-team">

				<div class="team-details">

					<div class="logo">
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->away_team_logo; ?>" alt="$item->away_team_school_name">
					</div>

					<div class="school-name">

						<h4><?php echo $item->away_team_abbreviated_name; ?></h4>
						<h5><?php echo $item->away_team_mascot; ?></h5>

					</div><!--  School Name  -->

				</div><!--  Team Details  -->

				<div class="score">

					<?php
						if ($item->game_status > 0) {
							if (!$item->away_team_final_score) {
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

							} else {
								echo $item->away_team_final_score;
							}
						} else {
							echo '-';
						}
					?>

				</div><!--  Score  -->

			</div><!--  Away Team  -->

			<div class="home-team">

				<div class="score">

					<?php
						if ($item->game_status > 0) {
							if (!$item->home_team_final_score) {
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

								} else {
									echo $item->home_team_final_score;
								}
							} else {
								echo '-';
							}
						?>

					</div><!--  Score  -->

				<div class="team-details">

					<div class="logo">
						<img src="https://6thmansports.com/images/team-logos/<?php echo $item->home_team_logo; ?>">
					</div>

					<div class="school-name">

						<h4><?php echo $item->home_team_abbreviated_name; ?></h4>
						<h5><?php echo $item->home_team_mascot; ?></h5>

					</div><!--  School Name  -->

				</div><!--  Team Details  -->

			</div><!--  Home Team  -->

		</div><!--  Teams  -->

	</div><!--  Box Score  -->

	<div class="game-status">
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
	</div><!--  Game Status  -->

	<?php
	if (!empty($item->minutes_remaining) || !empty($item->seconds_remaining)) { ?>
		<div class="game-time">
			<?php
				if ($item->minutes_remaining) {
					echo $item->minutes_remaining;
				}
				if ($item->seconds_remaining) {
					echo ":" . $item->seconds_remaining;
				}
			?>
		</div><!--  Game Time  -->

	<?php 
	//  Close Minutes/Seconds Remaining
	}

//  Close is Home Page check?>

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


		<?php
		//  Close Foreach Loop

		}

	} else {
		echo 'No game to display';
	}

?>

								<div class="text-content">

									<?php the_excerpt(); ?>

								</div><!--  Text Content  -->

							<?php
							endwhile;

							wp_reset_postdata();

						} else {
							echo '<h2>No Featured Posts To Display.</h2>';
						}
						
					?>

				</div><!--  Featured Post  -->

				<div class="todays-events">

					<div class="events-inner">
					
						<h4>Today's Events</h4>

						<?php
					
						//  Query the schedule
						get_template_part( 'todays-events/events'); 

						?>

					</div>

				</div>

			</div><!--  Hero  -->

		</div>

	</div><!--  site-container  -->

	<div class="recent-posts content-block">

		<div class="container">

			<h2 class="heading">Recent Posts</h2>

			<div class="posts">

				<?php
					//  Display Most Recent Posts
					$query = 'posts_per_page=8&offset=0&ignore_sticky_posts=1';
					$queryObject = new WP_Query($query);

					// The Loop...
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();?>
							<div class="hp-post">
							<div class="cat-list"><?php echo get_the_category_list(); ?></div>
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
							<?php sixthman_simplified_posted_date(); ?>
							</div><!--  HP Post  -->
						<?php
						}
					} else {
						echo 'There are no posts.';
					}
				?>

				<p><a href="/posts" class="btn btn-primary">Read More Posts</a></p>

			</div><!--  Posts  -->

		</div><!--  Content Area  -->

	</div><!--  Featured Posts  -->

	<div class="container content-block">

		<h2 class="heading"><?php bloginfo( 'name' ); ?> Social Media Channels</h2>

		<div class="social-media-section">

			<div class="twitter-feed">
				<div class="title">
					<h4><i class="fa fa-twitter" aria-hidden="true"></i><span class="sr-only">Twitter Feed</span></h4>
				</div><!--  Title  -->
				<?php echo do_shortcode("[custom-twitter-feeds]"); ?>
			</div>


			<div class="instagram-feed">
		 		<div class="title">
					<h4><i class="fa fa-instagram" aria-hidden="true"></i><span class="sr-only">Instagram Feed</span></h4>
				</div><!--  Title  -->
				<?php echo do_shortcode("[instagram-feed]"); ?>
			</div>

			<div class="facebook-feed">
				<div class="title">
					<h4><i class="fa fa-facebook" aria-hidden="true"></i><span class="sr-only">Instagram Feed</span></h4>
				</div><!--  Title  -->
				<?php echo do_shortcode("[custom-facebook-feed]"); ?>
			</div>

		</div>

		</div>


	</div><!--  Container  -->

	<div class="records-summary">

		<div class="container">

			<div class="row">

				<div class="col-lg-12">

					<h2 class="heading">Team Records</h2>

					<p>Campbell County has accumulated a number of trophies over the years. Visit the records page to see a breakdown of each sport.</p>

					<p><a href="/records" class="btn btn-primary">Visit The Records page</a></p>

					<div class="record-boxes">

						<div class="record-box">

							<h1>6</h1>

							<h5>KHSAA State Titles</h5>

						</div><!--  Record Box  -->

						<div class="record-box">

							<h1>10</h1>

							<h5>KHSAA State Runner-Ups</h5>

						</div><!--  Record Box  -->

						<div class="record-box">

							<h1>74</h1>

							<h5>KHSAA Regional Titles</h5>

						</div><!--  Record Box  -->

						<div class="record-box">

							<h1>87</h1>

							<h5>KHSAA District Titles</h5>

						</div><!--  Record Box  -->

						<div class="record-box">

							<h1>68</h1>

							<h5>NKAC Conference Titles</h5>

						</div><!--  Record Box  -->

					</div><!--  Record Boxes  -->

				</div><!--  Col  -->

			</div><!--  Row  -->

		</div><!--  Container  -->

	</div><!--  Record Summary  -->

	<div class="container content-block">

	<div class="row">

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h4><i class="fa fa-map-marker light-icon" aria-hidden="true"></i> Directions</h4>

			<p>Headed to an away game? Don't get lost, visit the directions page.</p>

			<p><a href="/directions" class="btn btn-primary btn-small">Visit The Directions Page</a></p>

		</div><!--  Col  -->

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h4><i class="fa fa-university light-icon" aria-hidden="true"></i> Hall Of Fame</h4>

			<p>Take a look at everyone who has been voted into the Campbell County High School Athletic Hall of Fame.</p>

			<p><a href="/hall-of-fame" class="btn btn-primary btn-small">Visit Hall of Fame</a></p>

		</div><!--  Col  -->

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

			<h4><i class="fa fa-comments light-icon" aria-hidden="true"></i> Contact Us</h4>

			<p>See contact information for all athletic department members as well as coaches.</p>

			<p><a href="/contact-us" class="btn btn-primary btn-small">Contact Us</a></p>

		</div><!--  Col  -->

		</div>

	</div><!--  Container  -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>