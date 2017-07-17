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

<div class="container">

	<h3 class="page-title"><?php the_title(); ?></h3>

	<div class="sport-home-container">

		<div class="sport-home-main">

			<?php 
			$term 					= get_field('select_sport');
			$cat					= strtolower($term->name);
			$scheduleCategory 		= str_replace(' ', '-', $cat);
			
			echo $scheduleCategory;
			?>

			<?php
					
			//  Query the schedule
			get_template_part( 'schedules/summary/schedule-summary', $scheduleCategory ); 

			?>
			
			<?php

				$term 	= get_field('category');
				$cat	= $term->name;

			?>

			<h3>Recent <?php echo $cat; ?> Post's</h3>

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
								    
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

						<?php the_excerpt(); ?>

						<hr>

					<?php
					endwhile;

					wp_reset_postdata();

				} else {
					echo '<h2>No Featured Posts To Display.</h2>';
				}
							
			?>

		</div><!--  Sport Home Main  -->


		<div class="sport-home-aside">

			<H3>HELLO WORLD</H3>

			<?php get_sidebar(); ?>

		</div><!--  Sport Home Aside  -->

	</div><!--  Sport Home Container  -->

</div><!--  Container  -->

<?php
get_footer();
