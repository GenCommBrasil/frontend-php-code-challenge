<?php

/*
    Plugin Name: Teste Rakuten
    Plugin uri: www.teste.teste
    Description: Exibição da cidade e temperatura no header usando uma API - OpenWeatherMap para mais informações: https://github.com/RakutenBrasil/frontend-php-code-challenge
    Version: 1.0
    Author: Alex Silva
    Author uri: https://github.com/alexsantossilva
    License: GPLv2 ou later
 */

function loadResources()
{
    wp_register_style('top-header.css', plugin_dir_url(__FILE__) . 'resources/css/header.css');
    wp_register_script('location.js', plugins_url('resources/js/location.js', __FILE__), 'jquery', 1.0, true);

    wp_enqueue_style('top-header.css');
    wp_enqueue_script('location.js');
}
