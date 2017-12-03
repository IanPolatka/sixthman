<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sixthman
 */

?>

	</div><!-- #content -->




	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-inside">

			<div class="footer-menus">

				<?php if ( ! function_exists( 'footer-1' )) {
			            dynamic_sidebar( 'footer-1' ); 
			        }
			    ?>
			    <?php if ( ! function_exists( 'footer-2' )) {
			            dynamic_sidebar( 'footer-2' ); 
			        }
			    ?>
			    <?php if ( ! function_exists( 'footer-3' )) {
			        dynamic_sidebar( 'footer-3' ); 
			    	}
			    ?>
			    <?php if ( ! function_exists( 'footer-4' )) {
			            dynamic_sidebar( 'footer-4' ); 
			        }
			    ?>

			    <section>

			    	<h2 class="widget-title">Connect</h2>

				    <p class="social-media">
				    	<a href="https://facebook.com/camelpride"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				    	<a href="https://twitter.com/camelpride"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				    	<a href="https://instagram.com/camelpride"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				    	<a href="mailto:info@camelpride.com"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
				    </p>

				    <h2 class="widget-title">Newsletter Signup</h2>

				    <p class="newsletter-copy">Stay up to date on all camel sports information</p>

				    <form action="https://camelpride.createsend.com/t/i/s/byuklj/" method="post" id="subForm">
					  <div class="form-group">
					    <label class="sr-only" for="fieldName">Name</label>
					    <input id="fieldName" name="cm-name" type="text" class="form-control" placeholder="Name" required />
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="fieldEmail">Email</label>
					    <input name="cm-byuklj-byuklj" type="email" class="form-control" placeholder="Email Address" required />
					  </div>
					  
					  <button type="submit" class="btn btn-primary btn-block">Submit</button>
					</form>

			    </section>

		    </div><!--  Footer Menu  -->

		</div><!--  Footer Inside  -->

		<div class="sixthman-network">

			<div class="footer-inside">

				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 328.8 45" style="enable-background:new 0 0 328.8 45;" xml:space="preserve">
				  		<g>
							<g>
							<path class="st0" d="M53.3,16.1l-3.9,18.3h-6.1l3.9-18.3h-5l1.1-5.2h16.1l-1.1,5.2H53.3z"/>
							<path class="st0" d="M66.3,20h8.8l1.9-9h6.1l-5,23.4H72l2.1-9.7h-8.8l-2.1,9.7h-6.1l5-23.4h6.1L66.3,20z"/>
							<path class="st0" d="M92.5,34.4l9-23.4h6l2,12.5l7.3-12.5h6l-1,23.4h-6.1l0.8-13.5l-8.4,13.5h-2.4l-2.4-13.5l-4.9,13.5H92.5z"/>
							<path class="st0" d="M141,30.3h-8.7l-2.3,4.1h-6.5L137.4,11h6.7l3.9,23.4h-6.5L141,30.3z M140.4,25.7l-1.1-7.8l-4.4,7.8H140.4z"/>
							<path class="st0" d="M150.7,34.4l5-23.4h6.1l8.2,14.3l3-14.3h6.1l-5,23.4H168l-8.2-14.3l-3,14.3H150.7z"/>
							<path class="st0" d="M206.1,17c-0.5-0.5-1.1-0.9-1.7-1.2c-0.6-0.3-1.2-0.4-1.8-0.4c-0.8,0-1.5,0.2-2,0.6c-0.6,0.4-0.9,0.9-1.1,1.5
								c-0.1,0.4,0,0.8,0.2,1c0.2,0.3,0.5,0.5,0.8,0.7c0.4,0.2,0.8,0.4,1.3,0.5c0.5,0.1,0.9,0.3,1.4,0.5c1.8,0.7,3.1,1.5,3.8,2.7
								c0.7,1.1,0.8,2.6,0.5,4.3c-0.3,1.2-0.7,2.3-1.3,3.3c-0.6,1-1.4,1.8-2.3,2.5c-0.9,0.7-2,1.2-3.2,1.6c-1.2,0.4-2.5,0.6-4,0.6
								c-3,0-5.5-0.9-7.7-2.6l3.7-4.9c0.7,0.8,1.5,1.4,2.3,1.8c0.8,0.4,1.6,0.6,2.5,0.6c1,0,1.8-0.2,2.4-0.7c0.6-0.5,0.9-1,1.1-1.6
								c0.1-0.4,0.1-0.7,0-0.9c-0.1-0.3-0.2-0.5-0.5-0.7s-0.6-0.4-1-0.6c-0.4-0.2-0.9-0.4-1.6-0.6c-0.7-0.2-1.4-0.5-2.1-0.8
								c-0.7-0.3-1.3-0.7-1.8-1.2c-0.5-0.5-0.8-1.1-1-1.9c-0.2-0.8-0.2-1.7,0.1-2.9c0.2-1.2,0.7-2.2,1.2-3.2c0.6-0.9,1.3-1.8,2.1-2.4
								c0.8-0.7,1.8-1.2,2.9-1.6c1.1-0.4,2.2-0.6,3.5-0.6c1.2,0,2.3,0.2,3.5,0.5c1.2,0.3,2.3,0.8,3.3,1.4L206.1,17z"/>
							<path class="st0" d="M215.7,34.4h-6.1l5-23.4h9.7c2.6,0,4.5,0.7,5.6,2.1c1.1,1.4,1.4,3.3,0.9,5.8c-0.5,2.5-1.6,4.4-3.3,5.8
								c-1.7,1.4-3.9,2.1-6.5,2.1h-3.6L215.7,34.4z M218.4,21.7h2c2.2,0,3.6-1,4-2.9c0.4-1.9-0.5-2.9-2.7-2.9h-2L218.4,21.7z"/>
							<path class="st0" d="M232.2,22.7c0.4-1.7,1-3.4,2-4.9c1-1.5,2.1-2.8,3.5-3.9c1.4-1.1,2.9-2,4.6-2.6s3.5-0.9,5.4-0.9
								c1.9,0,3.6,0.3,5,0.9c1.5,0.6,2.6,1.5,3.6,2.6c0.9,1.1,1.5,2.4,1.9,3.9c0.3,1.5,0.3,3.1-0.1,4.9c-0.4,1.7-1,3.4-2,4.9
								c-1,1.5-2.1,2.8-3.5,3.9c-1.4,1.1-2.9,2-4.7,2.6c-1.7,0.6-3.5,0.9-5.4,0.9c-1.9,0-3.6-0.3-5-0.9c-1.5-0.6-2.6-1.5-3.5-2.6
								c-0.9-1.1-1.5-2.4-1.8-3.9C231.8,26,231.8,24.4,232.2,22.7z M238.5,22.7c-0.2,0.9-0.2,1.8,0,2.6c0.2,0.8,0.5,1.5,1,2.1
								c0.5,0.6,1.1,1,1.8,1.4c0.7,0.3,1.5,0.5,2.4,0.5c0.9,0,1.8-0.2,2.6-0.5c0.9-0.3,1.7-0.8,2.4-1.4c0.7-0.6,1.4-1.3,1.9-2.1
								c0.5-0.8,0.9-1.6,1.1-2.6s0.2-1.8,0-2.6c-0.2-0.8-0.5-1.5-1-2.1c-0.5-0.6-1.1-1-1.8-1.4c-0.7-0.3-1.5-0.5-2.4-0.5
								c-0.9,0-1.8,0.2-2.6,0.5c-0.9,0.3-1.7,0.8-2.4,1.4c-0.7,0.6-1.3,1.3-1.9,2.1C239.1,20.9,238.7,21.7,238.5,22.7z"/>
							<path class="st0" d="M279,34.4h-7.6l-3.9-9l-1.9,9h-6.1l5-23.4h9.5c1.3,0,2.4,0.2,3.3,0.6c0.9,0.4,1.6,0.9,2.1,1.6
								c0.5,0.7,0.8,1.4,0.9,2.3c0.1,0.9,0.1,1.8-0.1,2.8c-0.4,1.8-1.1,3.2-2.2,4.3c-1.1,1.1-2.5,1.9-4.3,2.3L279,34.4z M268.3,21.4h1.2
								c1.2,0,2.2-0.2,2.9-0.7c0.7-0.5,1.2-1.2,1.4-2.1c0.2-0.9,0-1.6-0.5-2.1c-0.5-0.5-1.4-0.7-2.6-0.7h-1.2L268.3,21.4z"/>
							<path class="st0" d="M294.3,16.1l-3.9,18.3h-6.1l3.9-18.3h-5l1.1-5.2h16.1l-1.1,5.2H294.3z"/>
							<path class="st0" d="M314.7,17c-0.5-0.5-1.1-0.9-1.7-1.2c-0.6-0.3-1.2-0.4-1.8-0.4c-0.8,0-1.5,0.2-2,0.6c-0.6,0.4-0.9,0.9-1.1,1.5
								c-0.1,0.4,0,0.8,0.2,1c0.2,0.3,0.5,0.5,0.8,0.7c0.4,0.2,0.8,0.4,1.3,0.5c0.5,0.1,0.9,0.3,1.4,0.5c1.8,0.7,3.1,1.5,3.8,2.7
								c0.7,1.1,0.8,2.6,0.5,4.3c-0.3,1.2-0.7,2.3-1.3,3.3c-0.6,1-1.4,1.8-2.3,2.5c-0.9,0.7-2,1.2-3.2,1.6c-1.2,0.4-2.5,0.6-4,0.6
								c-3,0-5.5-0.9-7.7-2.6l3.7-4.9c0.7,0.8,1.5,1.4,2.3,1.8c0.8,0.4,1.6,0.6,2.5,0.6c1,0,1.8-0.2,2.4-0.7c0.6-0.5,0.9-1,1.1-1.6
								c0.1-0.4,0.1-0.7,0-0.9c-0.1-0.3-0.2-0.5-0.5-0.7c-0.2-0.2-0.6-0.4-1-0.6c-0.4-0.2-0.9-0.4-1.6-0.6c-0.7-0.2-1.4-0.5-2.1-0.8
								c-0.7-0.3-1.3-0.7-1.8-1.2c-0.5-0.5-0.8-1.1-1-1.9c-0.2-0.8-0.2-1.7,0.1-2.9c0.2-1.2,0.7-2.2,1.2-3.2c0.6-0.9,1.3-1.8,2.1-2.4
								c0.8-0.7,1.8-1.2,2.9-1.6c1.1-0.4,2.2-0.6,3.5-0.6c1.2,0,2.3,0.2,3.5,0.5c1.2,0.3,2.3,0.8,3.3,1.4L314.7,17z"/>
							</g>
							<g>
							<path class="st0" d="M36.6,0.2L21.1,14.5h0.2c1.2-0.7,2.2-1.1,2.9-1.2c0.7-0.1,1.4-0.2,1.9-0.2c2.1,0,4,0.4,5.6,1.2
								c1.6,0.8,2.9,1.9,3.9,3.3c1,1.4,1.7,3.1,2,5c0.3,1.9,0.3,3.9-0.2,6.1c-0.5,2.3-1.4,4.5-2.7,6.5c-1.3,2-2.9,3.7-4.8,5.2
								c-1.9,1.5-4.1,2.7-6.6,3.5c-2.5,0.9-5.1,1.3-8,1.3c-2.9,0-5.4-0.4-7.5-1.3c-2.1-0.9-3.8-2-5.1-3.5c-1.3-1.5-2.2-3.2-2.6-5.1
								c-0.4-2-0.4-4,0-6.2c0.5-2.5,1.6-5.2,3.4-8c1.7-2.9,4-5.7,6.9-8.5L23.4,0.2H36.6z M11.7,28.9c-0.2,1-0.2,1.9,0,2.8
								c0.2,0.9,0.6,1.6,1.1,2.3c0.5,0.7,1.2,1.2,2,1.6c0.8,0.4,1.7,0.6,2.7,0.6c1,0,2-0.2,2.9-0.6c1-0.4,1.8-0.9,2.6-1.6
								c0.8-0.7,1.5-1.4,2.1-2.3c0.6-0.9,1-1.8,1.2-2.8c0.2-1,0.2-1.9,0-2.8c-0.2-0.9-0.6-1.6-1.1-2.3c-0.5-0.7-1.2-1.2-2-1.6
								c-0.8-0.4-1.7-0.6-2.7-0.6c-1,0-2,0.2-2.9,0.6c-1,0.4-1.8,0.9-2.6,1.6c-0.8,0.7-1.5,1.4-2.1,2.3C12.3,27,11.9,27.9,11.7,28.9z"/>
							</g>
						</g>
					</svg>

				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> is part of the Sixthman Sports Network</p>

			</div><!--  Footer Inside  -->

		</div><!--  Sixthman Network  -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php the_field('analytics_code', 'option'); ?>

</body>
</html>
