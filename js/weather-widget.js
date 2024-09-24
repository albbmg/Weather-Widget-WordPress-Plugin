const weatherTranslations = {
    "Clouds": "Nublado",
    "Clear": "Despejado",
    "Rain": "Lluvia",
    "Drizzle": "Llovizna",
    "Mist": "Niebla",
    "Snow": "Nieve"
};

const pluginUrl = document.querySelector('.content').getAttribute('data-plugin-url');

async function fetchWeather(element) {
    const location = element.getAttribute('data-location');
    const widgetSize = element.getAttribute('data-size');
    const apiKey = "2e0d103e9c542f9e66a7ea5cd4e40829";
    const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=" + encodeURIComponent(location) + "&appid=" + apiKey;

    try {
        const response = await fetch(apiUrl);

        if (!response.ok) {
            throw new Error('Error fetching weather data');
        }

        const data = await response.json();

        element.querySelector(".temperature").innerHTML = Math.round(data.main.temp) + "ºC";
        
        if (widgetSize === 'large') {
            element.querySelector(".location").innerHTML = data.name;
            element.querySelector(".humidity").innerHTML = data.main.humidity + "%";
            element.querySelector(".wind").innerHTML = data.wind.speed + "km/h";
        }

        const weatherCondition = data.weather[0].main;
        let weatherImage;

        switch (weatherCondition) {
            case "Clouds":
                weatherImage = pluginUrl + "images/clouds.png";
                break;
            case "Clear":
                weatherImage = pluginUrl + "images/clear.png";
                break;
            case "Rain":
                weatherImage = pluginUrl + "images/rain.png";
                break;
            case "Drizzle":
                weatherImage = pluginUrl + "images/drizzle.png";
                break;
            case "Mist":
                weatherImage = pluginUrl + "images/mist.png";
                break;
            case "Snow":
                weatherImage = pluginUrl + "images/snow.png";
                break;
            default:
                weatherImage = "";
        }

        element.querySelector(".weather-img").src = weatherImage;
        element.querySelector(".weather-img").alt = weatherTranslations[weatherCondition] || weatherCondition;
        element.style.display = "block";
        element.querySelector(".error").style.display = "none";
    } catch (error) {
        console.error(error);
        element.querySelector(".error").style.display = "block";
        element.style.display = "none";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.weather').forEach((element) => {
        fetchWeather(element);
    });
});
