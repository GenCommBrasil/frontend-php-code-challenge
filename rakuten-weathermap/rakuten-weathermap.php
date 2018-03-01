<?php
    /*
    Plugin Name: Rakuten WeatherMap Plugin
    Plugin URI: www.rakuten.com.br
    Description: Um plugin para wordpress para exibir informações climáticas com base da sua geolocalização, usando a API OpenWeatherMap.
    Version: 1.0
    Author: igor Marcondes
    Author URI: http://www.rakuten.com.br
    License: GPLv2
    */

    /*  Copyright 2018 
        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as 
        published by the Free Software Foundation.
    */

    function CustomHead() {
        include_once('headcontent.php');
    }
    /**
     * Include CSS file for MyPlugin.
     */
    function rakuten_scripts() {
        wp_register_style( 'foo-styles',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
        wp_enqueue_script('geoip', '//geoip-db.com/json/geoip.php?jsonp=callback', array(), '3', true);
        wp_register_script( 'custom-script', plugins_url( '/js/custom.js', __FILE__ ) );
        wp_enqueue_style( 'foo-styles' );
        wp_enqueue_script( 'custom-script' );
        wp_enqueue_script( 'geoip' );
    }
    add_action( 'wp_enqueue_scripts', 'rakuten_scripts' );
    add_action('wp_head','CustomHead',1,1);

?>