    var x = document.getElementById("result");
    var country = document.getElementById('country');
    var state = document.getElementById('state');
    var city = document.getElementById('city');
    var temp = document.getElementById('temp');

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

