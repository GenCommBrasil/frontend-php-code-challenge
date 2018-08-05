<?php

/**
 * Class TemperatureHelper
 */
final class TemperatureHelper
{
    const SUBTRACT_KELVIN = 273.15;

    /**
     * @param $kelvin
     * @return mixed
     */
    public static function convertKelvinToCelsius($kelvin)
    {
        try {
            $kelvin = (float) $kelvin;

            return $kelvin - self::SUBTRACT_KELVIN;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}