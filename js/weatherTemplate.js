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

    $('#icon').prepend('<img src=' + urlIcon + ' width="80" height="80">');
    $('#currentLocation').html(currentLocation);
    $('#temp').html(Math.round(temp) + '°C');
    $('#minTemp').html('<span>Mínima</span>' + minTemp + '°C');
    $('#maxTemp').html('<span>Máxima</span>' + maxTemp + '°C');
    $('#pressure').html('<span>Pressão</span>' + pressure + 'hPa');
    $('#humidity').html('<span>Humidade</span>' + humidity + '%');
}