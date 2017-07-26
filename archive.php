<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixthman
 */

get_header(); ?>

<?php 

$categories = get_the_category();

$page = get_page_by_title( $categories[0]->name );

?>

<div class="secondary-menu">

	<a class="parent-link" href="<?php echo home_url(); ?>/<?php echo strtolower($categories[0]->name); ?>">
	     
		<?php echo $categories[0]->name; ?>

   	</a>
 
 	<?php

	    $children = wp_list_pages(array(
	        'child_of' => $page->ID,
	        'echo' => '0',
	        'title_li' => ''
	    ));

	    if ($children) {
	        echo "<ul>\n".$children."</ul>\n";
	    } 
	?>

</div><!--  Secondary Menu  -->

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
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive' );

						endwhile; ?>

					</div><!--  archives  -->
					
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
