<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/08/18
 * Time: 19:37
 */

include_once('services/OpenWeatherMap.php');
include_once('config/Parameters.php');

function getLocation()
{
    if (!empty($_POST['lat']) && !empty($_POST['lon'])) {
        $latitude = $_POST['lat'];
        $longitude = $_POST['lon'];

        $openWeather = getOpenWeather($latitude, $longitude);
    } else {
        $openWeather = getOpenWeather(Parameters::LATITUDE_DEFAULT, Parameters::LONGITUDE_DEFAULT);
    }

    echo json_encode($openWeather->getLocation());
    exit;
}

/**
 * @param $latitude
 * @param $longitude
 * @return OpenWeatherMap
 */
    function getOpenWeather($latitude, $longitude)
    {
        return new OpenWeatherMap($latitude, $longitude);
    }