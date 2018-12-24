<?php 
namespace App\Services\Yandex\Weather;

class Coor
{
    public $coor;

    public function __construct(float $coor)
    {
        if($this-> isCoor($coor)) {$this->coor = $coor; } else { throw new \InvalidArgumentException('format coordinate is incorrect : 55.5555555');}
    }

    public function isCoor($coor)
    {
        return preg_match('/^[\d]{2}\.[\d]{6}+$/ism',$coor);
    }

}


