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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'sixthman' ); ?></a>

	<header id="masthead" class="site-header" role="banner">


			<div class="site-branding">
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
					        Menu
	      				</button>
	     				<!-- <a class="navbar-brand" href="<?php echo home_url(); ?>">
	                		<?php bloginfo('name'); ?>
	            		</a> -->
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

	<div class="scores-container">

		<ul>
			<li>Today's Varsity vents</li>
			<li>
				<a href="">
					<span class="sport-name">Volleyball</span>
					<div class="teams">
						<div class="team">
							<span class="team-logo">H</span>
							<span class="team-name">Robert Co</span>
							<span class="score">1 <sup>(28, 14, 8)</sup></span>
						</div>
						<div class="team">
							<span class="team-logo">H</span>
							<span class="team-name">CCHS</span>
							<span class="score">3 <sup>(30, 25, 15)</span>
						</div>
						<div class="game-status">
							<span class="game-time live"><strong>4th Game</strong></span>
						</div>
					</div>
				</a>
			</li>
			<li>
				<span class="sport-name">Boys Soccer</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">Ryle</span>
						<span class="score">1</span>
					</div>
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">CCHS</span>
						<span class="score">3</span>
					</div>
					<div class="game-status">
						<span class="game-time live"><strong>48'</strong></span>
					</div>
				</div>
			</li>
			<li>
				<span class="sport-name">Girls Soccer</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">CCHS</span>
						<span class="score">5</span>
					</div>
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">BCHS</span>
						<span class="score">2</span>
					</div>
					<div class="game-status">
						<span class="game-time live"><strong>79'</strong></span>
					</div>
				</div>
			</li>
			<li>
				<span class="sport-name">Cross Country</span>
				<div class="teams">
					<div class="tournament-title">
					Campbell County Championships @ AJ Jolly Park
					</div>
					<div class="game-status">
						<span class="game-time"><strong>4:00pm</strong></span>
					</div>
				</div>
			</li>
			<li>
				<span class="sport-name">Boys Golf</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">CCHS</span>
						<span class="score">276</span>
					</div>
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">BCHS</span>
						<span class="score">245</span>
					</div>
					<div class="game-status">
						<span class="game-time live"><strong>Final</strong></span>
					</div>
				</div>
			</li>
			<li>
				<span class="sport-name">Girls Golf</span>
				<div class="teams">
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">Pend Co</span>
						<span class="score">306</span>
					</div>
					<div class="team">
						<span class="team-logo">H</span>
						<span class="team-name">CCHS</span>
						<span class="score">297</span>
					</div>
					<div class="game-status">
						<span class="game-time"><strong>Final</strong></span>
					</div>
				</div>
			</li>
		</ul>

	</div><!--  Scores Container  -->

	<div id="content" class="site-content">

		<div class="container">
