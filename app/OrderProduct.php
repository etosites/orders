<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';


    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
    public function order() {
        return $this->belongsTo('App\Order');
    }

    
}
