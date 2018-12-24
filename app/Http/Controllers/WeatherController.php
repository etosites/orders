<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Yandex\Weather\Weather;
use App\Services\Yandex\Weather\Point;
use App\Services\Yandex\Weather\Link;
use App\Services\Yandex\Weather\Coor;
use App\Services\Yandex\Weather\Translate;

class WeatherController extends Controller
{

    public function index()
    {
        $authKey = 'fc8a65ee-268c-4bbc-b0d0-0d3d44fd5975';
        $lat = new Coor(53.243325);
        $lon = new Coor(34.363731);
        $point = new Point($lat,$lon);
        $link = new Link('https://api.weather.yandex.ru/v1/forecast');
        $weather= new Weather($point, $link, $authKey);
        $weather = json_decode($weather->getJsonWeather());
        $weather = Translate::translateThis($weather->fact);
        return view('weather.index', compact('weather'));
    }

    

}
