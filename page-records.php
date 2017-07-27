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

<div class="container page-content">

<div class="row">

<h2 class="page-title"><?php the_title(); ?></h2>

</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
