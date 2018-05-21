<?php

add_action("wp_head", "wp_add_plugin_interface");

//register get_weather_information() to receive AJAX calls 
wp_register_script('weather_plugin_js', "/wp-content/plugins/weather_plugin/includes/js/plugin_script.js", array('jquery'));
wp_localize_script('weather_plugin_js', 'ajaxinfo', array('ajaxurl' => admin_url('admin-ajax.php')));
wp_enqueue_script('weather_plugin_js');

add_action( 'wp_ajax_nopriv_get_weather_information', 'get_weather_information');
add_action( 'wp_ajax_get_weather_information', 'get_weather_information');

 
function wp_add_plugin_interface()
{
  echo file_get_contents(plugin_dir_path(__FILE__) . 'view/weather_plugin.html');
  echo file_get_contents(plugin_dir_path(__FILE__) . 'view/style/weather_plugin.css');
}

function get_weather_information()
{
	if($_POST["useDefaultInfo"]){		
		$sp_city_id = 3448439; //information that can be obtained at http://bulk.openweathermap.org/sample/
		$api_response = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=" . $sp_city_id . "&units=metric&appid=2e1bb27d71f74a52f0698ac93a3c87dd");
	}else{
		$lat = $_POST["lat"];
		$lng = $_POST["lng"];

		$api_response = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=". $lat . "&lon=" . $lng . "&units=metric&appid=2e1bb27d71f74a52f0698ac93a3c87dd");
	}
	if($api_response){
		$decoded_api_response = json_decode($api_response);
		echo $decoded_api_response->name . ", ". $decoded_api_response->main->temp . "°C";
	}else{
		echo "Previsão do tempo indisponvel";
	}
	exit;
}