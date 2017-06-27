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
		<main id="main" class="site-main" role="main">

			<div class="hero-unit">

				<div class="featured-post">

					<div class="featured-image"></div>

					<div class="category"><a href="">Category Name</a></div>

					<h2>This is a post title</h2>

					<div class="box-score">

						<div class="teams">

							<div class="away-team">

								<div class="school-name">

									<h4>ABC</h4>
									<h5>thorobreds</h5>

								</div><!--  School Name  -->

								<div class="logo">
									<img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png">
								</div>

								<div class="score">

									28

								</div><!--  Score  -->

							</div><!--  Away Team  -->

							<div class="home-team">

								<div class="score">

									32

								</div><!--  Score  -->

								<div class="logo">
									<img src="https://www.dav.org/wp-content/themes/dav-theme-5-0-0-7/assets/img/davseal.png">
								</div>

								<div class="school-name">

									<h4>XYZ</h4>
									<h5>camels</h5>

								</div><!--  School Name  -->

							</div><!--  Away Team  -->

						</div><!--  Teams  -->

					</div><!--  Box Score  -->

					<div class="game-status">4:00pm</div><!--  Game Status  -->

					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>

				</div><!--  Featured Post  -->

				<div class="posts">

					<div class="posts-inner">
					
						<h4>Important Dates</h4>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

					</div>

				</div>

			</div><!--  Hero  -->

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

			<?php /*
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			*/ ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
