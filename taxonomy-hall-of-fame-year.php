<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixthman
 */

get_header(); ?>

<div class="container">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">

				<?php
				if ( have_posts() ) : ?>

					<header>
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							// the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div class="archives">

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); ?>

							<div class="archive-single">

								<?php the_title( '<h4 class="entry-title hof-year-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>

							</div><!--  Archive Single  -->

						<?
						endwhile; ?>

					</div><!--  Archives  -->
					
					<?php
					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				<?php get_sidebar(); ?>

				</div><!--  Col  -->

			</div><!--  Row  -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!--  Container  -->

<?php
get_footer();
