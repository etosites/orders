<?php 
namespace App\Services\Yandex\Weather;



class Point
{
    public $lat;
    public $lon;

    public function __construct(Coor $lat, Coor $lon)
    {
        $this->lat = $lat; 
        $this->lon = $lon; 
    }
}




