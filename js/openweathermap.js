(function(){
    var apiKey = 'bf6c435b393365c41783818f1e966892';

    function weatherTemplate(res) {
        var currentLocation = res.name;
        var weatherNow = res.weather[0].main;
        var icon = res.weather[0].icon;
        var temp = res.main.temp;
        var minTemp = res.main.temp_min;
        var maxTemp = res.main.temp_max;
        var humidity = res.main.humidity;

        var iconSRC = jQuery("#icon img").attr('src').replace("01d",icon);
        jQuery("#icon img").attr('src', iconSRC).show();
        jQuery('#currentLocation').html(currentLocation);
        jQuery('#temp').html(Math.round(temp) + '°C');
        jQuery('#minTemp').html('<span>Mínima</span> ' + Math.round(minTemp) + '°C');
        jQuery('#maxTemp').html('<span>Máxima</span> ' + Math.round(maxTemp) + '°C');
        jQuery('#humidity').html('<span>Humidade</span> ' + humidity + '%');
    }

    function onPositionReceived(position){
        
        jQuery.getJSON('https://ipinfo.io/json', function(position){
            var city = position.region;
            var country = position.country;
            
            jQuery.getJSON('http://api.openweathermap.org/data/2.5/weather?q='+ city + ',' + country + '&APPID='+ apiKey +'&units=metric', function(result){
                if(result != undefined || result != null){
                    weatherTemplate(result);
                }else{
                    jQuery("#error").html('<span>Previsão do tempo indisponível.</span>');
                }
            });
        })       
        
    }

    function locationNotReceived(positionError){
        jQuery.getJSON('http://api.openweathermap.org/data/2.5/weather?q=Tokio,JP&APPID='+ apiKey +'&units=metric', function(result){
            if(result != undefined || result != null){
                weatherTemplate(result);
            }else{
                jQuery("#error").html('<span>Previsão do tempo indisponível.</span>');
            } 
        });
    }

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(onPositionReceived, locationNotReceived);
    }

}());