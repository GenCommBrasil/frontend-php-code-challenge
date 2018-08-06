<?php

include_once(__DIR__ . "/../config/Parameters.php");
include_once(__DIR__ . "/../helper/TemperatureHelper.php");
include_once("Location.php");

/**
 * Class OpenWeatherMap
 */
class OpenWeatherMap implements Location
{
    /**
     * @var mixed
     */
    private $latitude;

    /**
     * @var mixed
     */
    private $longitude;

    /**
     * OpenWeatherMap constructor.
     * @param $latitude
     * @param $longitude
     */
    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return array
     */
    public function getLocation()
    {
        try {
            $queryString = [
                'lat' => $this->latitude,
                'lon' => $this->longitude,
                'appid' => Parameters::API_KEY,
            ];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, Parameters::URL . http_build_query($queryString));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($curl);
            curl_close($curl);

            if (false === $data) {
                return [
                    'response' => false,
                    'message' => 'Erro no retorno de dados.',
                ];
            }
            $data = json_decode($data, true);

            return [
                'response' => true,
                'temperature' => $this->getTempCelsius($data['main']),
                'city' => $data['name'],
            ];
        } catch (\Exception $e) {
            return [
                'response' => false,
                'message' => $e->getMessage(),
            ];
        }

    }

    /**
     * @param array $data
     * @return string
     */
    private function getTempCelsius(array $data)
    {
        $degreeCelsius = TemperatureHelper::convertKelvinToCelsius($data['temp']);

        return  number_format($degreeCelsius, 2, ',','.');
    }
}