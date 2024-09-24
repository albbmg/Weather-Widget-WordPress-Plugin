# Weather Widget for WordPress

This **Weather Widget** plugin for WordPress allows users to display current weather conditions for a specific location using data from the OpenWeatherMap API. The widget is fully customizable through the Elementor page builder and can adapt its size, typography, and appearance based on the user's preferences.

## Features

- **Dynamic Weather Updates**: Displays weather conditions including:
  - Temperature
  - Humidity
  - Wind speed
  - A dynamic weather icon based on the current conditions (e.g., sunny, cloudy, rainy, etc.)
  
- **Customizable via Elementor**: 
  - Easily change the location, font styles, icon sizes, and colors directly within the Elementor editor.
  
- **Responsive Design**:
  - The widget adjusts its layout for both small and large versions. The small version shows only the temperature and weather icon, while the large version displays full details (location, temperature, humidity, and wind speed).

- **Static Icons**:
  - Features static icons for displaying humidity and wind speed.

- **Localization**: 
  - Weather descriptions and labels are localized in Spanish.

## Requirements

- WordPress 5.0 or higher.
- Elementor Page Builder.
- An OpenWeatherMap API key (you can obtain one from [OpenWeatherMap](https://openweathermap.org/)).

## Installation

1. Upload the `weather-widget` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Go to your Elementor editor, search for the "Weather Widget", and drag it into your page.
4. Customize the location, layout, and style as needed within Elementor.
5. Ensure you have an OpenWeatherMap API key, which is required for fetching weather data.

## Usage

1. **Add the Widget**: After activation, you can add the widget to your page using Elementor.
2. **Customize**: Select the location to fetch weather data from, change the widget size, adjust typography, and icon sizes directly in the Elementor interface.
3. **Display Options**: 
   - In small size, the widget shows only the temperature and weather icon.
   - In large size, the widget shows full weather details including location, temperature, humidity, and wind speed.

## API Integration

This plugin uses the OpenWeatherMap API to retrieve real-time weather data. Ensure you have a valid API key:

- Register at [OpenWeatherMap](https://openweathermap.org/) to get your API key.
- The API key is embedded in the JavaScript and handles all requests to fetch data.


## License

This project is licensed under the MIT License.
## Contributing

Contributions, issues, and feature requests are welcome! Feel free to check the [issues page](https://github.com/your-repo/issues](https://github.com/albbmg/Weather-Widget-WordPress-Plugin/issues).

---

**Author:**  
Alba Muñoz García 
[albbmg](https://github.com/albbmg)
