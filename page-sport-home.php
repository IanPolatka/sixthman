<?php
/**
 * Template Name: Sport Home Page
 *
 * @package sixthman
 */

get_header(); ?>

<?php 
$term = get_field('select_sport');
$category = $term->name;
?>

<div class="secondary-menu">

	<?php 
     
    	$parent = $post->post_parent;
     
    ?>

    <?php $parentLink = get_permalink($post->post_parent); ?>

	    <a href="<?php echo $parentLink; ?>">
	     
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

	<h3><?php the_title(); ?></h3>

	<div class="row">

		<div class="col-lg-3">

			<?php
			
			//  Query the schedule
			get_template_part( 'schedules/schedule', $category  ); 

			?>

		</div>

		<div class="col-lg-9">


				<?php
				$args = array(
					'posts_per_page' => 5,
					'category_name'  => $category
				);
				?>

				<?php
				// The Query
				query_posts( $args );
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

		</div><!--  Col  -->

	</div><!--  Row  -->

<?php
get_sidebar();
get_footer();
