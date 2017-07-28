<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<div class="col-lg-8 col-lg-offset-2">

			<div class="hof-post">

				<?php
				while ( have_posts() ) : the_post(); ?>

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<?php

					// Check the Team repeater
					if( have_rows('team') ):

					 	// Loop through the Team Repeater
					    while ( have_rows('team') ) : the_row();

							echo '<div class="hof-team">';

					        $image = get_sub_field('team_logo');
					        if( !empty($image) ): 

								// vars
								$url = $image['url'];
								$title = $image['title'];
								$alt = $image['alt'];

								// thumbnail
								$size = 'thumbnail';
								$thumb = $image['sizes'][ $size ]; ?>

								<img class="hof-logo" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

							<?php
							endif;

							echo '<div class="hof-content">';

							// Display the team name
							echo '<h3>';
							the_sub_field('team_name');
							echo '</h3>';

								// Check The Sport Repeater
								if( have_rows('sport') ):

								 	// Loop through through the Sport Repeater
								    while ( have_rows('sport') ) : the_row();

								        // Display the sport name
										echo '<h4 class="hof-sport-name">';
								        the_sub_field('sport_name');
								        echo '</h4>';

								        if (get_sub_field('coached_by')) {
									        echo '<p><small><strong>Coached By: ';
									        the_sub_field('coached_by');
									        echo '</strong></small></p>';
									    } else {
									    	echo '<p></p>';
									    }

								        	// Check The Accomplishments Repeater
											if( have_rows('accomplishments') ):

												echo '<ul>';

											 	// Loop through through the Sport Repeater
											    while ( have_rows('accomplishments') ) : the_row();

											    	echo '<li>';

											        // Display the Accomplishment
											        the_sub_field('item');
											        echo '<br />';

											        	// Check Sub Accomplishments
														if( have_rows('sub_accomplishments') ):

															echo '<ul class="sub-accomplishments">';

														 	// Loop through sub accomplishments
														    while ( have_rows('sub_accomplishments') ) : the_row();

														        // Display the sub accomplishments
																echo '<li>';
														        the_sub_field('sub_accomplishment');
														        echo '</li>';

														    endwhile;  //  Have Sub-Accomplishments

														    echo '</ul>';

														endif;  //  If Sub-Accomplishments

													echo '</li>';

											    endwhile;  //  Have Accomplishments

											    echo '</ul>';

											endif;  //  If Accompishments

								    endwhile;  //  Have Rows - Sport

								endif;  //  If Sport

								echo '</div>';

							echo '<div class="clearfix"></div>';

							echo '</div>';  //  Close HOF-Team

					    endwhile;  //  Have Rows - Team

					else :

					    echo '<p>No Teams Listed</p>';

					endif;  //  If Team

					?>

				<?php
				endwhile; // End of the loop.
				?>

				<?php
				get_sidebar();
				?>

			</div><!--  HOF Post  -->

		</div><!--  Col  -->

	</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
