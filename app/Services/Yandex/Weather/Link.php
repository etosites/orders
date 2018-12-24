<?php
namespace App\Services\Yandex\Weather;

class Link
{
    public $link;

    public function __construct($link)
    {
        if($this-> isLink($link)) {$this->link = $link; } else { throw new \InvalidArgumentException('this not link');}
    }

    private function isLink($link)
    {
        return preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',$link);
    }



}


