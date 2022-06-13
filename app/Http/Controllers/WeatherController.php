<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\WeatherServices;

class WeatherController extends Controller
{
    protected $service;

    public function __construct(WeatherServices $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getWeather();
    }

    public function weather()
    {
        return view('weather');
    }
}
