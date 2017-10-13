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

					<h1>88</h1>

					<h4>KHSAA District Championships</h4>

				</div>

				<div class="records-total-box">

					<h1>68</h1>

					<h4>NKAC Conference Championships</h4>

				</div>

			</div><!--  Records Total  -->

				
				<div class="individual-sport-records">

                <h4>BASEBALL</h4>

                <ul>

                                                  <li>
                    <h4>1</h4></h1>
                    <h5>KHSAA STATE RUNNER-UPS</h5>                    <ul class="year">
                      <li>2016</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>6</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1971</li><li>1972</li><li>1984</li><li>1986</li><li>1989</li><li>2016</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>24</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1962</li><li>1967</li><li>1970</li><li>1971</li><li>1972</li><li>1974</li><li>1978</li><li>1981</li><li>1983</li><li>1984</li><li>1985</li><li>1990</li><li>1991</li><li>1992</li><li>1998</li><li>2001</li><li>2003</li><li>2004</li><li>2005</li><li>2008</li><li>2011</li><li>2013</li><li>2016</li><li>2017</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>9</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1962</li><li>1971</li><li>1972</li><li>1983</li><li>1993</li><li>1995</li><li>1998</li><li>2002</li><li>2003</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>BASKETBALL (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>5</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1946</li><li>1960</li><li>2001</li><li>2014</li><li>2015</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>12</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1970</li><li>1985</li><li>1988</li><li>1995</li><li>1996</li><li>2001</li><li>2002</li><li>2012</li><li>2014</li><li>2015</li><li>2016</li><li>2017</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>3</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1985</li><li>1988</li><li>2000</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>BASKETBALL (GIRLS)</h4>

                <ul>

                                                                  <li>
                    <h4>4</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1977</li><li>1979</li><li>2003</li><li>2016</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>19</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1975</li><li>1976</li><li>1977</li><li>1978</li><li>1979</li><li>1980</li><li>1983</li><li>1990</li><li>1991</li><li>2003</li><li>2004</li><li>2008</li><li>2009</li><li>2011</li><li>2012</li><li>2013</li><li>2015</li><li>2016</li><li>2017</li>                    </ul>
                  </li>
                                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>BOWLING (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>3</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2013</li><li>2014</li><li>2017</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>2</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>2012</li><li>2017</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>BOWLING (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>3</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2012</li><li>2013</li><li>2014</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>1</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>2012</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>CROSS COUNTRY (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>6</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1984</li><li>1985</li><li>1994</li><li>1995</li><li>2004</li><li>2007</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>5</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1984</li><li>1994</li><li>1995</li><li>2001</li><li>2007</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>CROSS COUNTRY (GIRLS)</h4>

                <ul>

                                                  <li>
                    <h4>1</h4></h1>
                    <h5>KHSAA STATE RUNNER-UPS</h5>                    <ul class="year">
                      <li>1995</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>2</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1994</li><li>1995</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>4</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1993</li><li>1995</li><li>2002</li><li>2003</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>FOOTBALL</h4>

                <ul>

                                                                                  <li>
                    <h4>5</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1970</li><li>1973</li><li>1980</li><li>2011</li><li>2012</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>1</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1973</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>GOLF (BOYS)</h4>

                <ul>

                                                                                                  <li>
                    <h4>4</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1996</li><li>1998</li><li>1999</li><li>2000</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
          
            
            
              <div class="individual-sport-records">

                <h4>SOCCER (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>1</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2016</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>3</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1998</li><li>2016</li><li>2017</li>                   </ul>
                  </li>
                                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>SOCCER (GIRLS)</h4>

                <ul>

                                                                  <li>
                    <h4>1</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2014</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>2</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>2014</li><li>2015</li>                    </ul>
                  </li>
                                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>SOFTBALL (FAST PITCH)</h4>

                <ul>

                                                                  <li>
                    <h4>1</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2004</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>1</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>2017</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>1</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1994</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>SOFTBALL (SLOW PITCH)</h4>

                <ul>

                                  <li>
                    <h4>1</h4>                    <h5>KHSAA STATE TITLES</h5>                    <ul class="year">
                      <li>2004</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>2</h4></h1>
                    <h5>KHSAA STATE RUNNER-UPS</h5>                    <ul class="year">
                      <li>2002</li><li>2003</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>4</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1989</li><li>1991</li><li>1995</li><li>2006</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>3</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>2002</li><li>2003</li><li>2004</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
          
            
            
          
            
            
              <div class="individual-sport-records">

                <h4>TENNIS (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>2</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1991</li><li>2017</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>1</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1991</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
          
            
            
              <div class="individual-sport-records">

                <h4>TRACK & FIELD (BOYS)</h4>

                <ul>

                                                                  <li>
                    <h4>5</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1993</li><li>1994</li><li>1995</li><li>2009</li><li>2010</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>1</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1993</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>TRACK & FIELD (GIRLS)</h4>

                <ul>

                                  <li>
                    <h4>1</h4>                    <h5>KHSAA STATE TITLES</h5>                    <ul class="year">
                      <li>2010</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>1</h4></h1>
                    <h5>KHSAA STATE RUNNER-UPS</h5>                    <ul class="year">
                      <li>2009</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>4</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>2009</li><li>2010</li><li>2011</li><li>2012</li>                    </ul>
                  </li>
                                                                  <li>
                    <h4>3</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>2009</li><li>2010</li><li>2012</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>VOLLEYBALL</h4>

                <ul>

                                                                  <li>
                    <h4>8</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1991</li><li>1998</li><li>1999</li><li>2000</li><li>2001</li><li>2006</li><li>2012</li><li>2013</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>10</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>2000</li><li>2001</li><li>2004</li><li>2005</li><li>2006</li><li>2007</li><li>2008</li><li>2009</li><li>2011</li><li>2012</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>3</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1979</li><li>1981</li><li>1982</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->

            
          
            
            
              <div class="individual-sport-records">

                <h4>WRESTLING</h4>

                <ul>

                                  <li>
                    <h4>4</h4>                    <h5>KHSAA STATE TITLES</h5>                    <ul class="year">
                      <li>1990</li><li>1991</li><li>2004</li><li>2012</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>5</h4></h1>
                    <h5>KHSAA STATE RUNNER-UPS</h5>                    <ul class="year">
                      <li>1983</li><li>2002</li><li>2003</li><li>2013</li><li>2014</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>19</h4>                    <h5>KHSAA REGIONAL TITLES</h5>                    <ul class="year">
                      <li>1972</li><li>1983</li><li>1990</li><li>1991</li><li>1992</li><li>1994</li><li>1995</li><li>1999</li><li>2000</li><li>2001</li><li>2002</li><li>2003</li><li>2004</li><li>2005</li><li>2012</li><li>2013</li><li>2014</li><li>2015</li><li>2016</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>12</h4></h1>
                    <h5>KHSAA DISTRICT TITLES</h5>                    <ul class="year">
                      <li>1989</li><li>1990</li><li>1991</li><li>1993</li><li>1994</li><li>1995</li><li>1996</li><li>1999</li><li>2000</li><li>2001</li><li>2002</li><li>2003</li>                    </ul>
                  </li>
                                                  <li>
                    <h4>27</h4>                    <h5>NKAC TITLES</h5>                    <ul class="year">
                      <li>1972</li><li>1973</li><li>1975</li><li>1976</li><li>1989</li><li>1990</li><li>1991</li><li>1992</li><li>1994</li><li>1995</li><li>1998</li><li>1999</li><li>2000</li><li>2002</li><li>2003</li><li>2004</li><li>2005</li><li>2006</li><li>2008</li><li>2009</li><li>2010</li><li>2011</li><li>2012</li><li>2013</li><li>2014</li><li>2015</li><li>2016</li>                    </ul>
                  </li>
                
                </ul>

              </div><!--  Records Section  -->



				

			</div><!--  Sport Record  -->

		</div><!--  Col  -->

	</div><!--  Row  -->

</div><!--  Container  -->

<?php
get_footer();
