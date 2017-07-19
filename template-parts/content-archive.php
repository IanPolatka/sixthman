<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixthman
 */

?>

<div class="archive-single">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header post-list-title">
			<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
		</header><!-- .entry-header -->

		
		<div class="post-date"><?php sixthman_posted_on_archive(); ?></div>

		<div class="entry-content">
			<?php

				
				the_excerpt();

				/*
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sixthman' ),
					'after'  => '</div>',
				) );
				*/
			?>
		</div><!-- .entry-content -->

		<div class="cat-list"><?php echo get_the_category_list(); ?></div>

	</article><!-- #post-<?php the_ID(); ?> -->

</div><!--  Archive  -->
