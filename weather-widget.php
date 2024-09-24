<?php
/*
Plugin Name: Weather Widget for Elementor
Description: This Weather Widget plugin for WordPress allows users to display current weather conditions for a specific location using data from the OpenWeatherMap API. The widget is fully customizable through the Elementor page builder and can adapt its size, typography, and appearance based on the user's preferences.
Version: 1.0
Author: Alba Muñoz García
*/

function weather_widget_shortcode() {
    ob_start();
    ?>
    <div class="content" data-plugin-url="<?php echo plugin_dir_url(__FILE__); ?>">
        <div class="weather" style="display: none;" data-location="Olmillos de Sasamón" data-size="large">
            <img class="weather-img" alt="weather icon">
            <h1 class="temperature">22ºC</h1>
            <h2 class="location">Olmillos de Sasamón</h2>
            <div class="info">
                <div class="col">
                    <img src="<?php echo plugin_dir_url(__FILE__); ?>images/humidity.png" alt="humidity icon">
                    <div>
                        <p class="humidity">50%</p>
                        <p>Humedad</p>
                    </div>
                </div>
                <div class="col">
                    <img src="<?php echo plugin_dir_url(__FILE__); ?>images/wind.png" alt="wind icon">
                    <div>
                        <p class="wind">15 km/h</p>
                        <p>Velocidad del Viento</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('weather_widget', 'weather_widget_shortcode');

function weather_widget_scripts() {
    wp_enqueue_script('weather-widget-js', plugin_dir_url(__FILE__) . 'js/weather-widget.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'weather_widget_scripts');

function weather_widget_styles() {
    wp_enqueue_style('weather-widget-css', plugin_dir_url(__FILE__) . 'css/styles.css');
}
add_action('wp_enqueue_scripts', 'weather_widget_styles');
?>
