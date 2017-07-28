<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

			<div class="records-total">

				<div class="records-total-box">

					<h1>6</h1>

					<h4>KHSAA State Championships</h4>

				</div><!--  Record Box  -->

				<div class="records-total-box">

					<h1>10</h1>

					<h4>KHSAA State Runner-Ups</h4>

				</div>

				<div class="records-total-box">

					<h1>74</h1>

					<h4>KHSAA Regional Championships</h4>

				</div>

				<div class="records-total-box">

					<h1>87</h1>

					<h4>KHSAA District Championships</h4>

				</div>

				<div class="records-total-box">

					<h1>68</h1>

					<h4>NKAC Conference Championships</h4>

				</div>

			</div><!--  Records Total  -->

			<h3>Baseball</h3>

			<div class="sport-records">

				<div class="sport-record-section">

					<h5>5</h5>
					<p><strong>KHSAA State Championships</strong></p>

					<ul>
						<li>2010, 2011, 2016</li>
					</ul>

				</div><!--  Sport Record Section  -->

				<div class="sport-record-section">

					<h5>10</h5>
					<p><strong>KHSAA State Runner-Ups</strong></p>

					<ul>
						<li>2010, 2011, 2016</li>
					</ul>

				</div><!--  Sport Record Section  -->

				<div class="sport-record-section">

					<h5>14</h5>
					<p><strong>KHSAA Regional Championships</strong></p>

					<ul>
						<li>2010, 2011, 2016, 1999, 2000, 2001, 2002</li>
					</ul>

				</div><!--  Sport Record Section  -->

				<div class="sport-record-section">

					<h5>19</h5>
					<p><strong>KHSAA District Championships</strong></p>

					<ul>
						<li>2010, 2011, 2016, 2001, 2002</li>
					</ul>

				</div><!--  Sport Record Section  -->

				<div class="sport-record-section">

					<h5>4</h5>
					<p><strong>NKAC Conference Championships</strong></p>

					<ul>
						<li>2010, 2016, 2001, 2002</li>
					</ul>

				</div><!--  Sport Record Section  -->

			</div><!--  Sport Record  -->

		</div><!--  Col  -->

	</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
