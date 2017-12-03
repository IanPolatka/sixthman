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


<div class="todays-events">

  <?php
    // Set the date to EST
    $date = new DateTime("now", new DateTimeZone('America/New_York') );
  ?>
  
  <ul>
    <li class="date"><span class="tagline"><?php echo $date->format("l"); ?>'s Events</span></li>

    <?php
          
      //  Query the schedule
      get_template_part( 'todays-events/events'); 

    ?>

    <?php /*

    <li class="date"><span class="tagline"><?php echo ($date)->modify('+1 day')->format('l'); ?>'s Events</span></li>

    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">FOOTBALL</div>
          <!--  <div class="time">4:30pm</div>  -->
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <strong><div class="team-name">CCHS</div></strong>
          <div class="score"><strong>48</strong></div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/ryle-raider.jpg"></div>
          <div class="team-name">Merc Co</div>
          <div class="score">21</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Soccer</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/mason-county-royals.jpg"></div>
          <div class="team-name">Mason Co</div>
          <div class="score">2</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>4</strong></div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Cross Country</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">CCHS</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/sk.jpg"></div>
          <div class="team-name">TRIMBLE COUNTY BACKWOODS INVITATIONAL</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Golf</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/lexington-christian-academy-eagles.jpg"></div>
          <div class="team-name">LCA</div>
          <div class="score">258</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>243</strong></div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Volleyball</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/fredrick-douglas-stallions.jpg"></div>
          <div class="team-name">Fred Doug</div>
          <div class="score">2</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>3</strong></div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Basketball</div>
          <div class="time red-text">1st QRT</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/scott-eagles.jpg"></div>
          <div class="team-name">Scott</div>
          <div class="score">32</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>68</strong></div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Wrestling</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">CCHS</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/ryle-raider.jpg"></div>
          <div class="team-name">Ryle Raider Rumble</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Bowling</div>
          <div class="time red-text">6:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">CCHS</div>
          <div class="score">248</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/highlands.jpg"></div>
          <div class="team-name"><strong>High</strong></div>
          <div class="score"><strong>268</strong></div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Swim & Dive</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">CCHS</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/holy-cross-covington-indians.jpg"></div>
          <div class="team-name">Holy Cross Invitational</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Baseball</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>8</strong></div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/highlands.jpg"></div>
          <div class="team-name">High</div>
          <div class="score">2</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Track & Field</div>
          <div class="time">4:30pm</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">CCHS</div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name">Donnie Carnes Memorial Meet</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Tennis</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>3</strong></div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/pendleton-county-wildcats.jpg"></div>
          <div class="team-name">Pend Co</div>
          <div class="score">2</div>
        </div>
      </a>
    </li>
    <li>
      <a href="">
        <div class="category">
          <div class="cat-name">Softball</div>
        </div>
        <div class="away-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/campbell-county-camels.jpg"></div>
          <div class="team-name"><strong>CCHS</strong></div>
          <div class="score"><strong>3</strong></div>
        </div>
        <div class="home-team">
          <div class="logo"><img src="https://6thmansports.com/images/team-logos/pendleton-county-wildcats.jpg"></div>
          <div class="team-name">Pend Co</div>
          <div class="score">2</div>
        </div>
      </a>
    </li>
    */ ?>
  </ul>
  
</div>





<div class="hp-container">

	<div class="news">

    	<div class="main-stories">

    	<?php
			// WP_Query arguments
			$args = array(
				'posts_per_page' => 1,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
			);

			// The Query
			query_posts( $args );

			if ( have_posts() ) {
						 
			// The Loop
			while ( have_posts() ) : the_post(); ?>

				<div class="featured-post">
        
		        <div class="featured-image">
		          	<a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) {
                    the_post_thumbnail('featured-post-full');
                  } else { ?>
						        <img src="https://camelpride.com/wp-content/uploads/2017/07/backdrop-1.jpg">
                  <?php } ?>
					     </a>
		        </div>
		        
		        <div class="featured-post-content">

                <?php if( get_field('box_score') ): ?>

                  <?php 
                    $term     = get_field('category');
                    $cat    = strtolower($term->name);
                    $category   = str_replace(' ', '-', $cat);

                  ?>

                  <?php if (($category === 'football') || ($category === 'boys-basketball') || ($category === 'girls-basketball'))  {

                    $id    = get_field('event_id'); ?>

                    <script type="text/javascript">var id = "<?= $id ?>";</script>

                    <?php
                    wp_enqueue_script( $category, get_template_directory_uri() . '/box-scores/' . $category . '.js', array(), '20151215', true );

                  } ?>

                  <?php if ($term) : ?>

                    <?php get_template_part( 'box-scores/score', $category  ); ?>

                  <?php endif; ?>

                <?php endif; ?>
		        
		          <small><?php echo get_the_category_list(); ?></small>

		          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		          
		          <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>

		          <?php

		          endwhile;

  					wp_reset_postdata();

  				  } else {
  								
  					echo '<h2>No Featured Posts To Display.</h2>';
  									
  				  }
  									
  				  ?>
		        
		        </div><!--  Featured Post Content  -->
		        
		      </div><!--  Featured Post  -->
      
      
      <div class="recent-news">
        
        <div class="stories">

       	  <?php
			// WP_Query arguments
			$args = array(
				'posts_per_page' => 3,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1,
				'offset' => 1
			);

		    // The Query
			query_posts( $args );

			if ( have_posts() ) {
						 
			// The Loop
			while ( have_posts() ) : the_post(); ?>

          <div class="recent-news-story">

	        	<div class="recent-news-story-image">
              <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) {
                  the_post_thumbnail('recent-news-post-image');
                } else { ?>
                  <img src="https://camelpride.com/wp-content/uploads/2017/12/recent-news-backup-background.jpg">
                <?php } ?>
              </a>
	        	</div>

	          	<h4><?php echo get_the_category_list(); ?>
                <small><?php sixthman_simplified_posted_date(); ?></small>
	          		<a href="<?php the_permalink(); ?>">
	          			<?php the_title(); ?>
	          		</a>
	          	</h4>

	       	</div><!--  Recent New Story  -->

	     	<?php

		        endwhile;

				wp_reset_postdata();

			} else {
								
					echo '<h2>No Featured Posts To Display.</h2>';
									
				}
									
			?>
          
        </div><!--  Stories  -->
        
      </div><!--  Recent News  -->

      
    </div><!--  Main Stories  -->



    
    <ul class="more-stories">

    	<?php
			// WP_Query arguments
			$args = array(
				'posts_per_page' => 10,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1,
				'offset' => 4
			);

		    // The Query
			query_posts( $args );

			if ( have_posts() ) {
						 
			// The Loop
			while ( have_posts() ) : the_post(); ?>
      
	      <li>
	        <div class="content">
	        <small><?php sixthman_simplified_posted_date(); ?></small>
	        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	        </div>
	      </li>
      
      	  <?php

		        endwhile;

				wp_reset_postdata();

			} else {
								
					echo '<h2>No Featured Posts To Display.</h2>';
									
				}
									
			?>
      
    </ul>
    
  </div><!--  news  -->
  
</div><!--  Container  -->









<div class="records-summary">

    <div class="hp-container">


          <h2 class="heading">Team Records</h2>

          <p>Campbell County has accumulated a number of trophies over the years. Visit the records page to see a breakdown of each sport.</p>

          <p><a href="/records" class="btn btn-primary">Visit The Records page</a></p>

          <div class="record-boxes">

            <div class="record-box">

              <h1>6</h1>

              <h5>KHSAA State Titles</h5>

            </div><!--  Record Box  -->

            <div class="record-box">

              <h1>10</h1>

              <h5>KHSAA State Runner-Ups</h5>

            </div><!--  Record Box  -->

            <div class="record-box">

              <h1>75</h1>

              <h5>KHSAA Regional Titles</h5>

            </div><!--  Record Box  -->

            <div class="record-box">

              <h1>88</h1>

              <h5>KHSAA District Titles</h5>

            </div><!--  Record Box  -->

            <div class="record-box">

              <h1>68</h1>

              <h5>NKAC Conference Titles</h5>

            </div><!--  Record Box  -->

          </div><!--  Record Boxes  -->

    </div><!--  Container  -->

  </div><!--  Record Summary  -->

	

	<div class="hp-container content-block">

    <div class="hp-blocks">

      <div class="block">

  			<h4><i class="fa fa-map-marker light-icon" aria-hidden="true"></i> Directions</h4>

  			<p>Headed to an away game? Don't get lost, visit the directions page.</p>

  			<p><a href="/directions" class="btn btn-primary btn-small">Visit The Directions Page</a></p>

      </div>

      <div class="block">

  			<h4><i class="fa fa-university light-icon" aria-hidden="true"></i> Hall Of Fame</h4>

  			<p>Take a look at everyone who has been voted into the Campbell County High School Athletic Hall of Fame.</p>

  			<p><a href="/hall-of-fame" class="btn btn-primary btn-small">Visit Hall of Fame</a></p>

      </div><!--  Block  -->

      <div class="block">

  			<h4><i class="fa fa-comments light-icon" aria-hidden="true"></i> Contact Us</h4>

  			<p>See contact information for all athletic department members as well as coaches.</p>

  			<p><a href="/contact-us" class="btn btn-primary btn-small">Contact Us</a></p>

      </div><!--  Block  -->

    </div><!--  hp blocks  -->

	</div><!--  Container  -->




<div class="social-media-section">

<div class="hp-container">

<div class="instagram-feed">
  
  <h1><em><span class="normal-font">#CAMEL</span>PRIDE</em></h1>
  
  <h3><i class="fa fa-instagram" aria-hidden="true"></i> Instagram Feed</h3>
  
  <ul>
    
  </ul>
  
</div><!--  Instagram Feed  -->

<div class="lower-social-media-section">
  
  <div class="section">
    
    <h3><i class="fa fa-twitter" aria-hidden="true"></i> Twitter Feed</h3>

    <div class="twitter-feed">

      <?php echo do_shortcode("[custom-twitter-feed]"); ?>

    </div><!--  Twitter Feed  -->
    
  </div><!--  Social Media Section  -->


  <div class="section">
  
    <h3><i class="fa fa-facebook" aria-hidden="true"></i> Facebook Feed</h3>
    
    <div class="facebook-feed">

      <?php echo do_shortcode("[custom-facebook-feed]"); ?>

    </div><!--  Facebook Feed  -->
    
  </div><!--  Social Media Section  -->
  
</div><!--  Lower Social Media Section  -->
  
</div><!--  Container  -->
  
</div><!--  Social Media Section  -->



<?php
get_footer();
