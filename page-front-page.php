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

					<div class="featured-image"><img src="https://www.dav.org/wp-content/uploads/MembershipHub_LAB_JoinDAV.jpg"></div>

					<div class="category"><a href="">Category Name</a></div>

					<h2>This is a post title</h2>

					<div class="box-score">

						<div class="teams">

							<div class="away-team">

								<div class="team-details">

									<div class="logo">
										<img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png">
									</div>

									<div class="school-name">

										<h4>ABC</h4>
										<h5>Camels</h5>

									</div><!--  School Name  -->

								</div><!--  Team Details  -->

								<div class="score">

									-

								</div><!--  Score  -->

							</div><!--  Away Team  -->

							<div class="home-team">

								<div class="score">

									-

								</div><!--  Score  -->

								<div class="team-details">

									<div class="logo">
										<img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png">
									</div>

									<div class="school-name">

										<h4>ABC</h4>
										<h5>Bluebirds</h5>

									</div><!--  School Name  -->

								</div><!--  Team Details  -->

							</div><!--  Away Team  -->

						</div><!--  Teams  -->

					</div><!--  Box Score  -->

					<div class="game-status">4:00pm</div><!--  Game Status  -->

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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
