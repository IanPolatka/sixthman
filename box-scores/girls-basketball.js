jQuery(document).ready(function() {

	var number = id;

	function eventStatus(){
		jQuery.ajax({
			url: "https://6thmansports.com/api/girls-basketball/game/" + number,
				dataType: "json",
				cache: false,
				success: function(data) {

					if ((data[0].game_status === null) || (data[0].game_status < 1)) {
						jQuery('#away_team_final_score').text('-');
					} else if ((data[0].game_status > 1) && (data[0].away_team_final_score != null) && (data[0].home_team_final_score != null)) {
						jQuery('#away_team_final_score').html(data[0].away_team_final_score);
						console.log("hello world");
					} else if ((data[0].away_team_final_score == null) && (data[0].home_team_final_score == null)) {
						var score = data[0].away_team_first_qrt_score +
									data[0].away_team_second_qrt_score +
									data[0].away_team_third_qrt_score +
									data[0].away_team_fourth_qrt_score +
									data[0].away_team_overtime_score;
						jQuery('#away_team_final_score').text(score);
						console.log(score);
					}

					jQuery("#away_team").html(data[0].away_team_abbreviated_name);
					jQuery('#away_team_image').attr("src", "https://6thmansports.com/images/team-logos/" + data[0].away_team_logo);
					jQuery("#away_team_city").html(data[0].away_team_city);
					jQuery("#away_team_state").html(data[0].away_team_state);
					jQuery("#away_team_mascot").html(data[0].away_team_mascot)
									                
					if ((data[0].game_status === null) || (data[0].game_status < 1)) {
						jQuery('#home_team_final_score').text('-');
					} else if ((data[0].game_status > 1) && (data[0].home_team_final_score != null) && (data[0].home_team_final_score != null)) {
						jQuery('#home_team_final_score').html(data[0].home_team_final_score);
						console.log("hello world");
					} else if ((data[0].home_team_final_score == null) && (data[0].home_team_final_score == null)) {
						var score = data[0].home_team_first_qrt_score +
									data[0].home_team_second_qrt_score +
									data[0].home_team_third_qrt_score +
									data[0].home_team_fourth_qrt_score +
									data[0].home_team_overtime_score;
						jQuery('#home_team_final_score').text(score);
						console.log(score);
					}

					jQuery('#home_team_image').attr("src", "https://6thmansports.com/images/team-logos/" + data[0].home_team_logo);
					jQuery("#home_team").html(data[0].home_team_abbreviated_name);
					jQuery("#home_team_city").html(data[0].home_team_city);
					jQuery("#home_team_state").html(data[0].home_team_state);
					jQuery("#home_team_mascot").html(data[0].home_team_mascot)
									                
					if (data[0].minutes_remaining) {
						 jQuery("#minutes").html(data[0].minutes_remaining);
					} else {
						jQuery("#minutes").text("");
					}
					if (data[0].seconds_remaining) {
						jQuery("#seconds").html(":"+data[0].seconds_remaining);
					} else {
						jQuery("#seconds").text("");
					}
									              
					if (data[0].tournament_title) {
						jQuery("#tournament-title").html(data[0].tournament_title);
					} else {
						jQuery("#tournament-title").hide();
					}
									                



					// $('#city').html(data[0].home_team_city);
					// $('#state').html(data[0].home_team_state);
					if (data[0].game_status < 1) {
						jQuery('#status').html(data[0].time);
					} else {
						if (data[0].game_status === 1) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">1st Qrt</span></strong>');
						} else if (data[0].game_status === 2) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">2nd Qrt</span></strong>');
						} else if (data[0].game_status === 3) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">Half</span></strong>');
						} else if (data[0].game_status === 4) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">3rd Qrt</span></strong>');
						} else if (data[0].game_status === 5) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">4th Qrt</span></strong>');
						} else if (data[0].game_status === 6) {
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong><span class="game-live">Overtime</span></strong>');
						} else {
							jQuery('#minutes').html("");
							jQuery('#seconds').html("");
							jQuery('#status').html(data[0].game_status);
							jQuery('#status').html('<strong>Final</strong>');
						}
					}

				}             
			});              
		}
		eventStatus();
		setInterval(eventStatus, 3000);

});