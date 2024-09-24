<?php
if (!defined('ABSPATH')) {
    exit;
}

class Elementor_Weather_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'weather_widget';
    }

    public function get_title() {
        return __('Weather Widget', 'weather-widget');
    }

    public function get_icon() {
        return 'eicon-weather';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'weather-widget'),
            ]
        );

        $this->add_control(
            'location',
            [
                'label' => __('Location', 'weather-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Olmillos de Sasamón',
            ]
        );

        $this->add_control(
            'widget_size',
            [
                'label' => __('Widget Size', 'weather-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'small',
                'options' => [
                    'small' => __('Small', 'weather-widget'),
                    'large' => __('Large', 'weather-widget'),
                ],
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => __('Image Size', 'weather-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .weather-img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'temperature_typography',
                'label' => __('Temperature Typography', 'weather-widget'),
                'selector' => '{{WRAPPER}} .temperature',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'location_typography',
                'label' => __('Location Typography', 'weather-widget'),
                'selector' => '{{WRAPPER}} .location',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'humidity_typography',
                'label' => __('Humidity Typography', 'weather-widget'),
                'selector' => '{{WRAPPER}} .humidity',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'wind_typography',
                'label' => __('Wind Typography', 'weather-widget'),
                'selector' => '{{WRAPPER}} .wind',
            ]
        );

        $this->add_control(
            'font_color',
            [
                'label' => __('Font Color', 'weather-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .temperature, {{WRAPPER}} .location, {{WRAPPER}} .humidity, {{WRAPPER}} .wind' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_class = $settings['widget_size'] === 'small' ? 'weather small-widget' : 'weather large-widget';

        echo '<div class="content" data-plugin-url="' . plugin_dir_url(__DIR__) . '">';
        echo '<div class="' . esc_attr($widget_class) . '" style="display: none;" data-location="' . esc_attr($settings['location']) . '" data-size="' . esc_attr($settings['widget_size']) . '">';
        echo '<img class="weather-img" alt="weather icon">';
        echo '<h1 class="temperature">22ºC</h1>';

        if ($settings['widget_size'] === 'large') {
            echo '<h2 class="location">' . esc_html($settings['location']) . '</h2>';
            echo '<div class="info">';
            echo '<div class="col">';
            echo '<img src="' . plugin_dir_url(__DIR__) . 'images/humidity.png" alt="humidity icon">';
            echo '<div>';
            echo '<p class="humidity">50%</p>';
            echo '<p>' . __('Humedad', 'weather-widget') . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col">';
            echo '<img src="' . plugin_dir_url(__DIR__) . 'images/wind.png" alt="wind icon">';
            echo '<div>';
            echo '<p class="wind">15 km/h</p>';
            echo '<p>' . __('Velocidad del Viento', 'weather-widget') . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
}
?>
