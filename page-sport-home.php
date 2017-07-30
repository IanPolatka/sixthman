<?php
/**
 * Template Name: Sport Home Page
 *
 * @package sixthman
 */

get_header(); ?>

<div class="secondary-menu">

	<?php 
     
    	$parent = $post->post_parent;
     
    ?>

    <?php $parentLink = get_permalink($post->post_parent); ?>

	    <a class="parent-link" href="<?php echo $parentLink; ?>">
	     
	    <?php 
	    if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {
	    	echo get_the_title($grandparent); 
	    }else { 
	    	echo get_the_title($parent); 
	    } 
   	?>

   	</a>
 
 	<?php
	    if ($post->post_parent) {
	        $page = $post->post_parent;
	    } else {
	        $page = $post->ID;
	    }

	    $children = wp_list_pages(array(
	        'child_of' => $page,
	        'echo' => '0',
	        'title_li' => ''
	    ));

	    if ($children) {
	        echo "<ul>\n".$children."</ul>\n";
	    } 
	?>

</div><!--  Secondary Menu  -->

<div class="container page-content">

	<h2 class="page-title"><?php the_title(); ?></h2>

	<div class="sport-home-container">

		<div class="sport-home-main">

			<?php 
			$term 					= get_field('select_sport');
			$category 				= $term->name;
			$cat					= strtolower($term->name);
			$scheduleCategory 		= str_replace(' ', '-', $cat);
			
			?>

			<?php
					
			//  Query the schedule
			get_template_part( 'schedules/summary/schedule-summary', $scheduleCategory ); 

			?>

			<h3>Recent <?php echo $category; ?> Post's</h3>

			<?php

				// WP_Query arguments
				$args = array(
					'posts_per_page' => 5,
					'category_name'  => $cat
				);

				// The Query
				query_posts( $args );

				if ( have_posts() ) {
							 
					// The Loop
					while ( have_posts() ) : the_post(); ?>
								    
						<div class="archive-single">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="entry-header post-list-title">
									<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
								</header><!-- .entry-header -->

		
								<div class="post-date"><?php sixthman_posted_on_archive(); ?></div>

								<div class="entry-content">
									<?php
									the_excerpt();?>
								</div><!-- .entry-content -->

							</article><!-- #post-<?php the_ID(); ?> -->

						</div><!--  Archive  -->

					<?php
					endwhile;

					wp_reset_postdata();

				} else {
					echo '<h2>No Featured Posts To Display.</h2>';
				}
							
			?>

			<p>
				<a href="/category/<?php echo $scheduleCategory; ?>" class="btn btn-primary btn-block">
					View More <?php echo $category; ?> Posts
				</a>
			</p>

		</div><!--  Sport Home Main  -->


		<div class="sport-home-aside">

			<form action="https://camelpride.createsend.com/t/i/s/byuklj/" method="post" id="subForm">
			    <p>
			        <label for="fieldName">Name</label><br />
			        <input id="fieldName" name="cm-name" type="text" class="form-control"/>
			    </p>
			    <p>
			        <label for="fieldEmail">Email</label><br />
			        <input id="fieldEmail" name="cm-byuklj-byuklj" type="email" required />
			    </p>
			    <p>
			        <button class="btn btn-primary btn-block" type="submit">Subscribe</button>
			    </p>
			</form>

			<?php get_sidebar(); ?>

		</div><!--  Sport Home Aside  -->

	</div><!--  Sport Home Container  -->

</div><!--  Container  -->

<?php
get_footer();
