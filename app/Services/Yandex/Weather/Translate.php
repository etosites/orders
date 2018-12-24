<?php 
namespace App\Services\Yandex\Weather;

Class Translate
{

public static $arrValue = [
    'clear' =>	'ясно',
    'partly-cloudy' =>	 'малооблачно',
    'cloudy' =>	 'облачно с прояснениями',
    'overcast' =>	 'пасмурно',
    'partly-cloudy-and-light-rain' =>	 'небольшой дождь',
    'partly-cloudy-and-rain' =>	 'дождь',
    'overcast-and-rain' =>	 'сильный дождь',
    'overcast-thunderstorms-with-rain' =>	 'сильный дождь, гроза',
    'cloudy-and-light-rain' =>	 'небольшой дождь',
    'overcast-and-light-rain' =>	 'небольшой дождь',
    'cloudy-and-rain' =>	 'дождь',
    'overcast-and-wet-snow' =>	 'дождь со снегом',
    'partly-cloudy-and-light-snow' =>	 'небольшой снег',
    'partly-cloudy-and-snow' =>	 'снег',
    'overcast-and-snow' =>	 'снегопад',
    'cloudy-and-light-snow' =>	 'небольшой снег',
    'overcast-and-light-snow' =>	 'небольшой снег',
    'cloudy-and-snow' =>	 'снег',
    'nw' =>	 'северо-западное',
    'n' =>	 'северное',
    'ne' =>	 'северо-восточное',
    'e' =>	 'восточное',
    'se' =>	 'юго-восточное',
    's' =>	 'южное',
    'sw' =>	 'юго-западное',
    'w' =>	 'западное',
    'с' =>	 'штиль',

    'd' =>	 'светлое время суток',
    'n' =>	 'темное время суток',

    'summer' =>	 'лето',
    'autumn' =>	 'осень',
    'winter' =>	 'зима',
    'spring' => 'весна',




];

public static $arrKey = [
'temp' =>	'Температура (°C)',
'feels_like' =>	'Ощущаемая температура (°C)',
'icon' =>	'Иконка погоды', // Иконка доступна по адресу https://yastatic,net/weather/i/icons/blueye/color/svg/<значение из поля icon>,svg,	Строка
'condition' => 	'Погодное описание',
'wind_speed'=>		'Скорость ветра (в м/с)',
'wind_gust'	=>	'Скорость ветра (в м/с)',	 
'wind_dir'	=>	'Направление ветра',
'pressure_mm'	=>	'Давлие (в мм рт, ст,)',
'pressure_pa'	=>	'Давление (в гектопаскалях)',	
'humidity'	=>	'Влажность воздуха (в процентах)',
'daytime'	=>	'Время суток',
'polar'	=>	'Признак полярного дня или ночи',
'season'	=>	'Время года', 
'obs_time'	=>	'Время замера'];

public static $newArr;
static function translateThis(Object $array)
{
    $array = self::translateValues (self::translateKeys($array));
    return $array;
}


static public function translateKeys($arr)
{

    foreach (self::$arrKey as $eng => $ru)
        {
            foreach ($arr as $key=> $value)
            {
                if($eng==$key){
                    $ruArr[$ru] = $value;
                    
            }
            
    
            };

        };
        return $ruArr;
    
}


static public function translateValues($arr)
{
foreach (self::$arrValue as $eng=> $ru)
            {              
                foreach ($arr as $key=> $value)
                {
                    
                    if($eng==$value){
                        $arr[$key] = $ru;
                }
                }

        };
        return $arr;
}



}