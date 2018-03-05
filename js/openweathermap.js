(function(){
    var apiKey = 'bf6c435b393365c41783818f1e966892';

    function onPositionReceived(position){
        var lat = position.coords.latitude;
        var long = position.coords.longitude;

        $.getJSON('http://api.openweathermap.org/data/2.5/weather?lat='+ lat +'&lon='+ long +'&APPID='+ apiKey +'&units=metric', function(result){
            console.log(result);
            weatherTemplate(result);
        });
    }

    function locationNotReceived(positionError){
        $.getJSON('http://api.openweathermap.org/data/2.5/weather?q=Sao Paulo,BR&APPID='+ apiKey +'&units=metric', function(result){
            console.log(result);
            weatherTemplate(result);
        });
    }

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(onPositionReceived, locationNotReceived);
    }

}());