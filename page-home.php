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

								<?php if( get_field('box_score') ): ?>

									<?php 
										$term = get_field('category');
										$cat		= strtolower($term->name);
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

<?php
get_footer();
