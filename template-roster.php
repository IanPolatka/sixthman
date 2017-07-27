<?php
/**
 * Template Name: Roster
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

	<div class="row">

		<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

			<h2 class="page-title"><?php the_title(); ?></h2>

			<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>

			<?php

			// check if the repeater field has rows of data
			if( have_rows('team_roster') ): ?>

				<table class="roster-table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Number</th>
							<th>Position</th>
							<th>Grade Level</th>
						</tr>
					</thead>
					<tbody>
			 	
						<?php
						// loop through the rows of data
						while ( have_rows('team_roster') ) : the_row(); ?>

						    <tr>

						    	<td>
						    		<div class="roster-heading">Name</div>
						    		<?php the_sub_field('name'); ?>
						  		</td>
						    	<td>
						    		<div class="roster-heading">Number</div>
						    		<?php the_sub_field('number'); ?>
						    	</td>
						    	<td>
						    	<div class="roster-heading">Position</div>
						    		<?php the_sub_field('position'); ?>
						    	</td>
						    	<td>
						    	<div class="roster-heading">Grade</div>
						    		<?php the_sub_field('grade'); ?>
						    	</td>

							</tr>

						<?php
						endwhile; ?>

					</tbody>
				</table>

			<?php
			endif;

			?>

		</div><!--  Col  -->

	</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
