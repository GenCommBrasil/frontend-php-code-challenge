<?php
/*
Plugin Name: Openweathermap
Plugin URI: https://github.com/rigote/frontend-php-code-challenge
Description: Plugin with the aim of displaying the current weather to any place on Earth using geolocation
Version: 1.0
Author: Matheus Souza Rigote
Author URI: http://www.rigotedesign.com.br
License: GPLv2
*/

class Openweathermap {
    private static $instance;

    public static function getInstance(){
        if(self::$instance == NULL){
            self::$instance = new self();
        }
    }

    private function __construct(){
        add_action( 'wp_enqueue_scripts', 'registerPluginScripts' );
        add_shortcode( 'weathermap', 'showWeathermap' );
    }
}

function registerPluginScripts(){
    wp_register_style('openweathermap', plugin_dir_url(__FILE__).'/css/style.css');
    wp_register_script( 'openweathermap', plugins_url( '/js/openweathermap.js', __FILE__ ), 'jquery', 1.0, true);
    wp_enqueue_style('openweathermap');
    wp_enqueue_script( 'openweathermap' );
}

function showWeathermap() {
    $dir = plugin_dir_url( __FILE__ );
    echo '<div id="weather">';
    echo '   <div id="currentLocation"></div>';
    echo '   <div id="icon"><img src="'.$dir.'images/01d.png" width="100%" height="100%" style="display:none;">';
    echo '      <div id="temp"></div>';
    echo '   </div>';
    echo '   <div class="prevent">';
    echo '      <div id="minTemp"></div>';
    echo '      <div id="maxTemp"></div>';
    echo '      <div id="humidity"></div>';
    echo '   </div>';
    echo '</div>';
  }

Openweathermap::getInstance();