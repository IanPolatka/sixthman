<ul>

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

if ( 
	empty($fball_data) &&
	empty($bsocc_data) &&
	empty($gsocc_data) &&
	empty($vball_data) &&
	empty($cc_data) &&
	empty($bg_data) &&
	empty($gg_data)
   ) {

	echo 'No Events Today';
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

?>

<ul>