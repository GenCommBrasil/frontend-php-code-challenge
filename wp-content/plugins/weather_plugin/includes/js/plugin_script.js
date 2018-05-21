
navigator.geolocation.getCurrentPosition(successFunction, errorFunction);


function successFunction(position) {
    var data = {
			action: 'get_weather_information',
			lat: position.coords.latitude,
			lng: position.coords.longitude,
			useDefaultInfo: 0,
		};
    getWeatherInformation(data);
}

function errorFunction(){
	var data = {
			action: 'get_weather_information',
			useDefaultInfo: 1,
		};
    getWeatherInformation(data);
}


function getWeatherInformation(data){
	jQuery.ajax({
		url: ajaxinfo.ajaxurl,
		type: 'post',
		data: data,
		success: function(weather_text) {
            jQuery('#weather_plugin_information').text(weather_text);
        }
	});
}