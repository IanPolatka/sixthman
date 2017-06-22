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

	<small><strong>Posted On</strong></small>
	<div class="post-date"><?php the_date(); ?></div>

	<small><strong>Posted In</strong></small>

	<div class="cat-list"><?php echo get_the_category_list(); ?></div>

	<div class="entry-content">
		<?php

			
			// the_content();

			/*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sixthman' ),
				'after'  => '</div>',
			) );
			*/
		?>
	</div><!-- .entry-content -->

	<!-- <?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'sixthman' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

</div><!--  Archive  -->
