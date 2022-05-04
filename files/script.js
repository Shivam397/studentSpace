const desc = (des) => {
    switch (des) {
        case 'clear':
            return `<i class="fas fa-sun"></i>`;
        case 'Clouds':
            return `<i class="fas fa-cloud"></i>`;
        case 'Thunderstorm':
            return `<i class="fas fa-poo-storm"></i>`;
        case 'Drizzle':
            return `<i class="fas fa-cloud-sun"></i>`;
        case 'Rain':
            return `<i class="fas fa-cloud-showers-heavy"></i>`;
        case 'snow':
            return `<i class="fas fa-snowflake"></i>`;
        case 'Mist':
            return `<i class="fab fa-cloudsmith"></i>`;
        case 'Haze':
            return `<i class="fas fa-smog"></i>`;
        default:
            return `<i class="fas fa-sun"></i>`;
    }
}

const WeatherApi = fetch('http://api.openweathermap.org/data/2.5/weather?lat=26.4417&lon=75.8751&appid=3553a0b46fdd790764f7067ebb4cf1b7&units=metric');
WeatherApi.then((data) => {
    return data.json();
}).then((apiData) => {
    console.log(apiData);
    const p = document.getElementById('temp');
    const des = apiData.weather[0].main;
    p.innerHTML += `${desc(des)} &nbsp;`;
    p.innerHTML += `${apiData.main.temp} &deg C &nbsp;`;
    p.innerHTML += des;
})