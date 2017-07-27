<?php
/**
 * Template Name: Contact Us
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
			if( have_rows('contact_us_section') ): ?>

				<?php
					// loop through the rows of data
					while ( have_rows('contact_us_section') ) : the_row(); ?>

						<div class="contact-us-section">

						<h4><?php the_sub_field('section_title'); ?></h4>

							<?php

							// check if the repeater field has rows of data
							if( have_rows('contact') ): ?>

								<div class="contacts">

									<?php
									// loop through the rows of data
									while ( have_rows('contact') ) : the_row(); ?>

										<div class="contact">

											<p><strong><?php the_sub_field('name'); ?></strong></p>
											<?php if (get_sub_field('title')) { ?>
												<p><em><?php the_sub_field('title'); ?></em></p>
											<?php } ?>
											<?php if (get_sub_field('phone')) { ?>
												<p><?php the_sub_field('phone'); ?></p>
											<?php } ?>
											<?php if (get_sub_field('email')) { ?>
												<p><a href="mailto:<?php the_sub_field('email'); ?>">Email</a></p>
											<?php } ?>
											<?php if (get_sub_field('fax')) { ?>
												<p><?php the_sub_field('fax'); ?></p>
											<?php } ?>

										</div>

									<?php
									endwhile; ?>

								</div><!--  Contacts  -->

							<?php
							endif; ?>

						</div><!--  Contact Us Section  -->

				<?php
					endwhile; ?>

			<?php
			endif; ?>

		</div><!--  Col  -->

	</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
