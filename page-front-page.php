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

<div class="container">

	<div id="primary" class="content-area">

			<div class="hero-unit">

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

									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else {
										echo '<img src="https://securea.mlb.com/assets/images/2/3/8/240055238/cuts/adleman2610_niiguymu_fnbjv9lu.jpg">';
									}

									?>
										
								</div>

								<div class="category"><?php echo get_the_category_list(); ?></div>
							    
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

								<?php if( get_field('box_score') ): ?>

									<?php 
										$term = get_field('category');
										$cat		= $term->name;
										$category 	= str_replace(' ', '-', $cat);
									?>

									<?php if ($term) : ?>

										<?php get_template_part( 'box-scores/score', $category  ); ?>

									<?php endif; ?>

								<?php endif; ?>

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

				$data = file_get_contents('https://6thmansports.com/api/football/schedule/2017-2018/' . $team_name);
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
