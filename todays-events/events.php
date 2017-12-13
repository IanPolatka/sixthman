

<?php

$team_name		= strtolower(get_field('school_name', 'option'));

//  Check Football
$fball_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/football/todays-events/' . $team_name);
$fball_body 	= wp_remote_retrieve_body( $fball_request );
$fball_data 	= json_decode( $fball_body );

//  Check Boys Soccer
$bsocc_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/soccer-boys/todays-events/' . $team_name);
$bsocc_body 	= wp_remote_retrieve_body( $bsocc_request );
$bsocc_data 	= json_decode( $bsocc_body );

//  Check Girls Soccer
$gsocc_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/soccer-girls/todays-events/' . $team_name);
$gsocc_body 	= wp_remote_retrieve_body( $gsocc_request );
$gsocc_data 	= json_decode( $gsocc_body );

//  Check Volleyball
$vball_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/volleyball/schedule-summary/' . $school_year . '/' . $team_name);
$vball_body 	= wp_remote_retrieve_body( $vball_request );
$vball_data 	= json_decode( $vball_body ); 

//  Check Cross Country
$cc_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/cross-country/todays-events/' . $team_name);
$cc_body 		= wp_remote_retrieve_body( $cc_request );
$cc_data 		= json_decode( $cc_body );

//  Check Boys Golf
$bg_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/golf-boys/todays-events/' . $team_name);
$bg_body 		= wp_remote_retrieve_body( $bg_request );
$bg_data 		= json_decode( $bg_body );

//  Check Girls Golf
$gg_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/golf-girls/todays-events/' . $team_name);
$gg_body 		= wp_remote_retrieve_body( $gg_request );
$gg_data 		= json_decode( $gg_body );

//  Check Boys Basketball
$bball_request 	= wp_safe_remote_get( 'http://6thmansports.com/api/boys-basketball/todays-events/' . $team_name);
$bball_body 	= wp_remote_retrieve_body( $bball_request );
$bball_data 	= json_decode( $bball_body );

//  Check Girls Basketball
$gball_request 	= wp_safe_remote_get( 'http://6thmansports.com/api/girls-basketball/todays-events/' . $team_name);
$gball_body 	= wp_remote_retrieve_body( $gball_request );
$gball_data 	= json_decode( $gball_body );

//  Check Swimming
$swim_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/swimming/todays-events/' . $team_name);
$swim_body 	= wp_remote_retrieve_body( $swim_request );
$swim_data 	= json_decode( $swim_body );

//  Check Wrestling
$wrestle_request 	= wp_safe_remote_get( 'https://6thmansports.com/api/swimming/todays-events/' . $team_name);
$wrestle_body 	= wp_remote_retrieve_body( $wrestle_request );
$wrestle_data 	= json_decode( $wrestle_body );

if ( 
	empty($fball_data) &&
	empty($bsocc_data) &&
	empty($gsocc_data) &&
	empty($vball_data) &&
	empty($cc_data) &&
	empty($bg_data) &&
	empty($gg_data) &&
	empty($bball_data) &&
	empty($gball_data) &&
	empty($swim_data) &&
	empty($wrestling)
   ) {

	echo '<li class="no-events"><span class="tagline">No Events Scheduled</span></li>';
}

?>

<?php					
//  Query Daily Sports Events

//  Football
get_template_part( 'todays-events/sports/football'); 

//  Boys Soccer
get_template_part( 'todays-events/sports/boys-soccer');

//  Girls Soccer
get_template_part( 'todays-events/sports/girls-soccer');

//  Volleyball
get_template_part( 'todays-events/sports/volleyball');

//  Cross Country
get_template_part( 'todays-events/sports/cross-country');

//  Boys Golf
get_template_part( 'todays-events/sports/boys-golf');

//  Girls Golf
get_template_part( 'todays-events/sports/girls-golf');

//  Boys Basketball
get_template_part( 'todays-events/sports/boys-basketball'); 

//  Girls Basketball
get_template_part( 'todays-events/sports/girls-basketball'); 

//  Swimming
get_template_part( 'todays-events/sports/swimming-and-diving');

//  Wrestling
get_template_part( 'todays-events/sports/wrestling');  

?>

