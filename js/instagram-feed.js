jQuery(document).ready(function() {
  
	var link  =  "https://api.instagram.com/v1/users/self/media/recent/?access_token=458384297.e6b56fb.44b50c36a20a45288117f0c0196098eb"

		jQuery.ajax({
			url: link,
				dataType: "json",
				cache: false,
				success: function(response) {
          
          
          for (i = 0; i < 4; i++) {
            jQuery('.instagram-feed ul').append(
              '<li><a href="' + response.data[i].link + '"><img src="' + response.data[i].images.low_resolution.url + '"></a></li>'
            );
          }
          
		}             
	});              

});