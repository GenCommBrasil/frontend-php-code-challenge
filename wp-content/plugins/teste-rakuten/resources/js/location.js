navigator.geolocation.getCurrentPosition(success, failure);

function failure() {
    loadLocation('', '');
}

function success(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    loadLocation(latitude, longitude);
}

function loadLocation(latitude, longitude) {
    jQuery.ajax({
        url:'/wp-admin/admin-ajax.php',
        type:'POST',
        data: {
            action: 'getLocation',
            lat: latitude,
            lon: longitude
        },
        success:function(json) {
            var data = jQuery.parseJSON(json);
            if (data['response'] === true) {
                jQuery("#location").html("Cidade: " + data.city);
                jQuery("#temperature").html("Temperatura: " + data.temperature + " ºC");
            } else {
                jQuery("#location").html('Previsão do tempo indisponível.');
            }
        }
    });
}