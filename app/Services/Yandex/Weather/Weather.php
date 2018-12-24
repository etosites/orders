<?php 
namespace App\Services\Yandex\Weather;

class Weather
{
    private $point;
    private $authKey;
    public $link;

    public function __construct(Point $point, Link $link, $authKey)
    {
        $this->point = $link;
        $this->authKey = $authKey;
        $this->link = $link->link.$this->getLinkForYandexApi($point);
    }

    public function getLinkForYandexApi(Point $point)
    {

        return $this->link."?lat={$point->lat->coor}&lon={$point->lon->coor}";

    }

    public function getJsonWeather()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Yandex-API-Key:$this->authKey"]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        curl_close($ch);   
        return $output ;
    }


    
}