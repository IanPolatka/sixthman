<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixthman
 */

get_header(); ?>

	<div id="primary" class="content-area">

			<div class="hero-unit">

				<div class="featured-post">

					<div class="featured-image"><img src="https://securea.mlb.com/assets/images/2/3/8/240055238/cuts/adleman2610_niiguymu_fnbjv9lu.jpg"></div>

					<div class="category"><a href="">Category Name</a></div>

					<h2>This is a post title</h2>

					<?php

					$data 		= file_get_contents('http://6thmansports.com/api/football/game/17');
					$json_data 	= json_decode($data, true);
					$game 		= $json_data[0];

					?>

					<div class="box-score">

						<div class="teams">

							<div class="away-team">

								<div class="team-details">

									<div class="logo">
										<img src="http://6thmansports.com/images/team-logos/<?php echo $game['away_team_logo']; ?>">
									</div>

									<div class="school-name">

										<h4><?php echo $game['away_team_abbreviated_name']; ?></h4>
										<h5><?php echo $game['away_team_mascot']; ?></h5>

									</div><!--  School Name  -->

								</div><!--  Team Details  -->

								<div class="score">

									<?php echo $game['away_team_first_qrt_score']; ?>

								</div><!--  Score  -->

							</div><!--  Away Team  -->

							<div class="home-team">

								<div class="score">

									<?php echo $game['home_team_first_qrt_score']; ?>

								</div><!--  Score  -->

								<div class="team-details">

									<div class="logo">
										<img src="http://6thmansports.com/images/team-logos/<?php echo $game['home_team_logo']; ?>">
									</div>

									<div class="school-name">

										<h4><?php echo $game['home_team_abbreviated_name']; ?></h4>
										<h5><?php echo $game['home_team_mascot']; ?></h5>

									</div><!--  School Name  -->

								</div><!--  Team Details  -->

							</div><!--  Away Team  -->

						</div><!--  Teams  -->

					</div><!--  Box Score  -->

					<div class="game-status"><?php echo $game['time']; ?></div><!--  Game Status  -->

					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>

				</div><!--  Featured Post  -->

				<div class="todays-events">

					<div class="events-inner">
					
						<h4>Today's Events</h4>

						<ul>
							<li>
								<a href="">
									<span class="sport-name">Volleyball</span>
									<div class="teams">
										<div class="team">
											<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
											<span class="team-name">NCC</span>
											<span class="score">1 <sup>(28, 14, 8)</sup></span>
										</div>
										<div class="team">
											<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
											<span class="team-name">CCHS</span>
											<span class="score">3 <sup>(30, 25, 15)</sup></span>
										</div>
										<div class="game-status">
											<span class="game-time live"><strong>4th Game</strong></span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<span class="sport-name">Boys Soccer</span>
								<div class="teams">
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">Ryle</span>
										<span class="score">1</span>
									</div>
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">CCHS</span>
										<span class="score">3</span>
									</div>
									<div class="game-status">
										<span class="game-time live"><strong>48'</strong></span>
									</div>
								</div>
							</li>
							<li>
								<span class="sport-name">Girls Soccer</span>
								<div class="teams">
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">CCHS</span>
										<span class="score">5</span>
									</div>
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">BCHS</span>
										<span class="score">2</span>
									</div>
									<div class="game-status">
										<span class="game-time live"><strong>79'</strong></span>
									</div>
								</div>
							</li>
							<li>
								<span class="sport-name">Cross Country</span>
								<div class="teams">
									<div class="tournament-title">
									Campbell County Championships @ AJ Jolly Park
									</div>
									<div class="game-status">
										<span class="game-time"><strong>4:00pm</strong></span>
									</div>
								</div>
							</li>
							<li>
								<span class="sport-name">Boys Golf</span>
								<div class="teams">
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">CCHS</span>
										<span class="score">276</span>
									</div>
									<div class="team">
										<span class="team-logo"><img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png"></span>
										<span class="team-name">BCHS</span>
										<span class="score">245</span>
									</div>
									<div class="game-status">
										<span class="game-time"><strong>Final</strong></span>
									</div>
								</div>
							</li>
						</ul>

					</div>

				</div>

			</div><!--  Hero  -->

		</div>

	</div><!--  site-container  -->

	<div class="recent-posts">

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

			</div><!--  Posts  -->

		</div><!--  Content Area  -->

	</div><!--  Featured Posts  -->

	<div class="container">

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


	</div><!--  Container  -->

	<div class="container">

		<div class="row">

			<div class="col-lg-12">

				<?php
				/*

				<h2><?php bloginfo( 'name' ); ?> Social Media Section</h2>

				<div class="social-media-section">

					<div class="twitter-feed">
						<h4>Twitter Feed</h4>
						<?php echo do_shortcode("[custom-twitter-feeds]"); ?>
					</div>

					<div class="instagram-feed">
						<h4>Instagram Feed</h4>
						<?php echo do_shortcode("[instagram-feed]"); ?>
					</div><!--  Instagram  -->

					<div class="facebook-feed">
						<h4>Facebook Feed</h4>
						<?php echo do_shortcode("[custom-facebook-feed]"); ?>
					</div><!--  Facebook  -->

				</div><!--  Social Media Section  -->

				*/
				?>

				<?php

				$school_name 	= strtolower(get_field('school_name', 'option')); 
				$team_name 		= str_replace(' ', '%20', $school_name);

				$data = file_get_contents('http://6thmansports.com/api/football/schedule/2017-2018/' . $team_name);
				$json_data = json_decode($data, true);

				?>

				<h3>Page Title</h3>

				<table class="schedule-table">
					<tbody>

						<?php
						foreach($json_data as $game) {

							echo '<tr>';
								echo '<td class="schedule-date">';
									$source = $game['date'];
									$date = new DateTime($source);
									echo '<div>' . $date->format('l') . '</div>'; // 31.07.2012
									echo '<div>' . $date->format('M j, Y') . '</div>'; // 31.07.2012
								echo '</td>';
								echo '<td class="opponent">';
									echo '<strong>';
									if (strtolower($game['home_team']) == $school_name) {
										echo 'vs <img src="http://6thmansports.com/images/team-logos/' . $game['away_team_logo'] . '">' . $game['away_team'];
									} else {
										echo '@ <img src="http://6thmansports.com/images/team-logos/' . $game['home_team_logo'] . '">' . $game['home_team'];
									}
									echo '</strong>';
								echo '</td>';
								echo '<td>';
									if (!empty($game['minutes_remaining'])) {
										if ($game['minutes_remaining']) {
											echo $game['minutes_remaining'];
										}
										if ($game['seconds_remaining']) {
											echo ":" . $game['seconds_remaining'];
										}
									} else {
										echo $game['time'];
									}
									echo $game['game_status'];
								echo '</td>';
							echo '</tr>';
						}
						?>

					</tbody>
				</table>

			</div><!--  Col  -->

		</div><!--  Row  -->

	</div><!--  Container  -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
