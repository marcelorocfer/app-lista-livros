<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class WeatherServices
{
    const BASE_URL = "https://api.hgbrasil.com/weather";

    public function getWeather()
    {
        $ip = file_get_contents('https://api.ipify.org');
        $ip_address['ip_address'] = geoip()->getLocation($ip)['ip'];

        $location = geoip()->getLocation($ip_address['ip_address']);
        $url = self::BASE_URL.'?key='.$_ENV['APP_KEY_API_WEATHER'].'&lat='.$location['lat'].'&lon='.$location['lon'].'&user_ip='.$location['ip'];

        $response = Http::get($url);
        $responseBody = $response->body();
        $responseCode = json_decode($responseBody, true);

        return $responseCode['results'];
    }
}
