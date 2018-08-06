<?php

/**
 * @package teste-rakuten
 */
/*
    Plugin Name: Teste Rakuten
    Plugin uri: https://github.com/alexsantossilva/frontend-php-code-challenge
    Description: Exibição da cidade e temperatura no header usando uma API - OpenWeatherMap para mais informações: https://github.com/RakutenBrasil/frontend-php-code-challenge
    Version: 1.0
    Author: Alex Silva
    Author uri: https://github.com/alexsantossilva
    License: GPLv2 ou later
 */

include_once('location.php');

/**
 * Print HTML Entities for Show
 */
function loadHeader()
{
    include_once('views/header.php');
}

add_action('wp_head','loadHeader',1,1);

wp_register_style('header', plugin_dir_url(__FILE__) . 'resources/css/header.css');
wp_enqueue_style('header');


wp_register_script('ajax_location', plugins_url('resources/js/location.js', __FILE__), array('jquery'));
wp_enqueue_script('ajax_location');
wp_localize_script('ajax_location', 'ajax_location', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));

add_action( 'wp_ajax_getLocation', 'getLocation');
add_action( 'wp_ajax_nopriv_getLocation', 'getLocation');