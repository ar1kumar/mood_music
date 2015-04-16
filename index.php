<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.simpleWeather.js"></script>
	
	<script type="text/javascript">

		/* Does your browser support geolocation? */
		if ("geolocation" in navigator) {
		  $('.js-geolocation').show(); 
		} else {
		  $('.js-geolocation').hide();
		}

		/* Where in the world are you? */
		//$('.js-geolocation').on('click', function() {
		function geo(){
		  navigator.geolocation.getCurrentPosition(function(position) {
			loadWeather(position.coords.latitude+','+position.coords.longitude); //load weather using your lat/lng coordinates
		  });
		}  
		//});


		$(document).ready(function() {
		  loadWeather('Mumbai',''); 							//@params location, woeid -- defualt location is Mumbai
		  //var bg = [1,2,3,4,5,6,7,8,9,10];   					//Random bg on each load
		  //$('.wrapper').css({'background': 'url(images/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});

		});


		function loadWeather(location, woeid) {
		  $.simpleWeather({
			location: location,
			woeid: woeid,
			unit: 'c',
			success: function(weather) {
			  html = '<h2><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
			  html += '<ul><li>'+weather.city+', '+weather.region+'</li>';
			  html += '<li class="currently">'+weather.currently+'</li>';
			  html += '<li>'+weather.alt.temp+'&deg;F</li></ul>';  
			  html += '<p>humidity: '+weather.humidity+'</p>';
			 // html += '<p>pressure: '+weather.pressure+'</p>';
			  html += '<p>visbility: '+weather.visibility+'</p>';
			  html += '<p>sunrise: '+weather.sunrise+'</p>';
			  html += '<p>sunset: '+weather.sunset+'</p>';

			  html += '<p>wind.chill: '+weather.wind.chill+'</p>';
			  html += '<p>wind.direction: '+weather.wind.direction+'</p>';
			  html += '<p>wind.speed: '+weather.wind.speed+'</p>';
			  
			  $("#weather").html(html);
			  get_vid(weather.code,weather.currently,weather.humidity,weather.wind.chill);	//send the weather details to this function to get the appropriate video
			},
			error: function(error) {
			  $("#weather").html('<p>'+error+'</p>');
			}
		  });
		}

	</script>
		
	<script type="text/javascript" src="js/video.js"></script>
	
</head>
<body>
	<div class="wrapper">
		<!-- <div class="title"><h2></h2></div> -->
			<div class="weather_info">
				<div id="weather"></div>
				<button class="js-geolocation" id="location" onclick="geo()"></button>
			</div>
			
			<div class="song">
				<iframe width="572" height="320" src="" id="video" frameborder="0" allowfullscreen></iframe>
			</div>
	</div>
</body>
</html>