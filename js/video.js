//$(document).ready(function(){
function get_vid(weather,status,humidity,wind_chill){
	    //var feel = prompt("How are you feeling today?", "");
		console.log('weather is '+weather+','+status+',humidity '+humidity+',wind chill is '+wind_chill);
		
		//Getting mood from the weather
		if(weather == 9 && 10 && 11 && 12 && 40){					//rainy, light drizzle or showers
			var feel = 'soothing';
			var bg = [1,2,3];
			$('.wrapper').css({'background': 'url(images/rain/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});
			console.log("weather is "+status);
		}
		else if(weather == 26 || weather == 27 || weather == 28 || weather == 29 || weather == 30 || weather == 44){		//Cloudy
			var moods = ['beautiful','aromatic','soulful'];
			var feel = moods[Math.floor(Math.random()*moods.length)];
			console.log(feel);
			var bg = [1,2];
			$('.wrapper').css({'background': 'url(images/cloudy/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});
			console.log("weather is "+status);
		}
		else if(weather == 31 || weather == 32 || weather == 33 || weather == 34 || weather == 36){				//Sunny & clear
			var moods = ['peppy','energetic','happy'];
			var feel = moods[Math.floor(Math.random()*moods.length)];
			var bg = [1,2,3,4,5];
			$('.wrapper').css({'background': 'url(images/sunny/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});
		}  
		else if(weather == 21 || weather == 20 || weather == 19 || weather == 22 || weather == 23 || weather == 24){		//Haze, smoke, foggy
			var feel = 'moody';
			var bg = [1,2];
			$('.wrapper').css({'background': 'url(images/cloudy/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});
		}
		else{
			alert("OOPS SEEMS LIKE YOUR INTERNET DOESN'T WORK !!");
			var bg = [1,2,3,4,5,6,7,8,9,10];   					//Random bg on each load
		  $('.wrapper').css({'background': 'url(images/' + bg[Math.floor(Math.random()*bg.length)] + '.jpg)no-repeat'});
		}		
		//send the mood to search for songs
	if (feel != null) {
			$.ajax({
				type: "POST",
				url: "http://localhost/exp/mood_music/lib/get_vid.php",
				data: {
					mood : feel
				},
				success: function(response){
				//do some stuff
				console.log('returns '+response);
				$('#video').attr('src',"//www.youtube.com/embed/"+response+"?html5=1");
			}
		});
    }
}
//});