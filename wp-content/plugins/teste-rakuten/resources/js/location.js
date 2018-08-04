$(document).ready(function(){
    var geolocation = navigator.geolocation;
    geolocation.getCurrentPosition(success, failure);
});

function failure() {
    loadLocation('', '');
}

function success(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    loadLocation(latitude, longitude);
}

function loadLocation(latitude, longitude) {
console.log('12');
    $.ajax({
        type:'POST',
        url:'Geolocation.php',
        data:'lat='+latitude+'&lon='+longitude,
        success:function(json){
            var data = $.parseJSON(json);
            if (data['response'] === true) {
                $("#location").html("Cidade: " + data.city);
                $("#temperature").html("Temperatura: " + data.temperature + " ºC");
            } else {
                $("#location").html('Previsão do tempo indisponível.');
            }
        }
    });
}