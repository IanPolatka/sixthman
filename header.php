<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sixthman
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php
header('Access-Control-Allow-Origin: *');
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'sixthman' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<!-- <div class="header-team-logo">
			<?php the_field('logo', 'option') ?>
		</div><!--  header-team-logo  -->

<!-- 			<div class="site-branding">
				<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

	    	<nav class="navbar navbar-default" role="navigation">
	    			<!-- Brand and toggle get grouped for better mobile display -->
	    			<div class="navbar-header">
	      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <i class="fa fa-bars" aria-hidden="true"></i>
	      				</button>
	      				<?php the_field('logo', 'option') ?>
	     				<a class="navbar-brand" href="<?php echo home_url(); ?>">
	                		<h2 class="site-title"><?php bloginfo('name'); ?></h2>
	                		<div class="site-description"><?php bloginfo('description'); ?></div>
	            		</a>
	    			</div>

			        <?php
			            wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 2,
			                'container'         => 'div',
			                'container_class'   => 'collapse navbar-collapse',
			                'container_id'      => 'bs-example-navbar-collapse-1',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			                'walker'            => new WP_Bootstrap_Navwalker())
			            );
			        ?>

			</nav>

	</header>

	<div id="content" class="site-content">

	<?php if( get_field('breaking_news_box', 'option') ): ?>

		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="alert alert-breaking">
						<div class="box-title">Breaking News</div>
						<div class="box-content">
							<?php the_field('breaking_news_alert', 'option') ?>
						</div>
					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<?php if( get_field('information_news_box', 'option') ): ?>

		<div class="container">

			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="alert alert-info">
						<div class="box-title"><span>Information</span></div>
						<div class="box-content">
							<?php the_field('information_news_alert', 'option') ?>
						</div><!--  Box Content  -->
					</div><!--  Alert  -->

				</div><!--  Col  -->

			</div><!--  Row  -->

		</div><!--  Container  -->

	<?php endif; ?>
