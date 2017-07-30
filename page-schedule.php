<?php
/**
 * Template Name: Schedule Page
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

	<h3 class="page-title"><?php the_title(); ?></h3>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 
			$term 					= get_field('select_sport');
			$cat					= strtolower($term->name);
			$scheduleCategory 		= str_replace(' ', '-', $cat);

			?>

			<?php
					
			//  Query the schedule
			get_template_part( 'schedules/schedule', $scheduleCategory ); 

			?>

			<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						the_content();

					endwhile;

				endif; 
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div>

<?php
get_footer();
