<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sixthman
 */

?>

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

	<div class="clearfix"></div>

</div><!--  Secondary Menu  -->






<div class="container">

<?php 
	$term 		= get_field('category');
	$cat		= $term->name;
	$category 	= str_replace(' ', '-', $cat);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<div class="col-lg-3 col-md-3 col-sm-3 entry-meta-desktop">

			<div class="entry-meta">
				<span class="gravatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></span>
				<span class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
				<span class="author-description"><?php the_author_meta('description'); ?></span>
				<?php sixthman_posted_date(); ?>
				<div class="posted-in">
					<strong>Posted In</strong>
					<div class="cat-list"><?php echo get_the_category_list(); ?></div>
				</div>
				<strong>Share This</strong>
				<ul class="social-media-share-icons">
					<li>
						<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook.">
							<span class="sr-only">Share on Facebook</span>
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<a class="twitter" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!">
							<span class="sr-only">Share on Twitter</span>
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div><!-- .entry-meta -->

		</div><!--  Col  -->

		<div class="col-lg-9 col-md-9 col-sm-9">

			<div class="entry-header">

				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;?>

				<div class="entry-meta entry-meta-mobile">
					<?php sixthman_posted_date(); ?>
					<span class="gravatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></span>
					<span class="author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
				</div><!-- .entry-meta -->

			</div><!-- .entry-header -->

			<div class="entry-content">

				<?php if ($term) : ?>

					<?php get_template_part( 'box-scores/score', $category  ); ?>

				<?php endif; ?>

				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sixthman' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sixthman' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php sixthman_entry_footer(); ?>
			</footer><!-- .entry-footer -->

			<div class="single-post-navigation">
				<?php sixthman_post_navigation(); ?>
			</div><!--  Single Post Navigation  -->

			<?php get_sidebar(); ?>

		</div><!--  Col  -->

</article><!-- #post-<?php the_ID(); ?> -->

</div><!--  Row  -->

</div><!--  Container  -->
