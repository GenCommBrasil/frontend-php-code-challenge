(function(){
    var apiKey = 'bf6c435b393365c41783818f1e966892';

    function weatherTemplate(res) {
        var currentLocation = res.name;
        var weatherNow = res.weather[0].main;
        var icon = res.weather[0].icon;
        var temp = res.main.temp;
        var minTemp = res.main.temp_min;
        var maxTemp = res.main.temp_max;
        var pressure = res.main.pressure;
        var humidity = res.main.humidity;
    
        var urlIcon = "../images/" + icon + ".png";
    
        jQuery('#icon').prepend('<img src=' + urlIcon + ' width="80" height="80">');
        jQuery('#currentLocation').html(currentLocation);
        jQuery('#temp').html(Math.round(temp) + '°C');
        jQuery('#minTemp').html('<span>Mínima</span>' + minTemp + '°C');
        jQuery('#maxTemp').html('<span>Máxima</span>' + maxTemp + '°C');
        jQuery('#pressure').html('<span>Pressão</span>' + pressure + 'hPa');
        jQuery('#humidity').html('<span>Humidade</span>' + humidity + '%');
    }

    function onPositionReceived(position){
        var lat = position.coords.latitude;
        var long = position.coords.longitude;

        jQuery.getJSON('http://api.openweathermap.org/data/2.5/weather?lat='+ lat +'&lon='+ long +'&APPID='+ apiKey +'&units=metric', function(result){
            console.log(result);
            weatherTemplate(result);
        });
    }

    function locationNotReceived(positionError){
        jQuery.getJSON('http://api.openweathermap.org/data/2.5/weather?q=Sao Paulo,BR&APPID='+ apiKey +'&units=metric', function(result){
            console.log(result);
            weatherTemplate(result);
        });
    }

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(onPositionReceived, locationNotReceived);
    }

}());