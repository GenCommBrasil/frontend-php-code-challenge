    var x = document.getElementById("result");
    var country = document.getElementById('country');
    var state = document.getElementById('state');
    var city = document.getElementById('city');
    var temp = document.getElementById('temp');
    var errorbox = document.getElementById('errorbox');

    function callback(data) {
        country.innerHTML = data.country_name;
        state.innerHTML = data.state;
        city.innerHTML = data.city;
    }

    window.onload = function(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Seu browser não suporta Geolocalização.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
            lat = position.coords.latitude;
            long = position.coords.longitude;
             getWeather(lat, long);
    }

    function showError(error) {
        lat = -23.6815303; 
        long = -46.8761724;
        getWeather(lat, long);
        x.innerHTML = "Latitude: " + lat +
            "<br>Longitude: " + long +
            "<p>Não detectamos sua localização, usando localização padrão São Paulo, BRA</p>";

            switch(error.code) {
                case error.PERMISSION_DENIED:
                  errorbox.innerHTML="Ambiente Sem HTTPS"
                  break;
                case error.POSITION_UNAVAILABLE:
                  errorbox.innerHTML="Localização indisponível."
                  break;
                case error.TIMEOUT:
                  errorbox.innerHTML="A requisição expirou."
                  break;
                case error.UNKNOWN_ERROR:
                  errorbox.innerHTML="Algum erro desconhecido aconteceu."
                  break;
            }    
    }
    function getWeather(lat, long) {
        var ajax = new XMLHttpRequest();
        var json;
        var apiKey = "570f0890767fafeae66141ccc2b7ef15";
        var url = "http://api.openweathermap.org/data/2.5/weather?lat="+ lat + "&lon="+ long +"&appid=" + apiKey +"&units=metric";
        ajax.open("GET", url, true);
        ajax.send();
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                json = JSON.parse(ajax.responseText);
                if (json != undefined) {
                    var weather = json.weather[0].main;
                    var temperatura = Math.round(json.main.temp) + "°C";
                    temp.innerHTML = temperatura;
                } else {
                    description = "Ops, não consegui encontrar as informações do tempo ='( " + location;
                    document.getElementById("description").innerHTML = description;
                }
            }
        }
    }