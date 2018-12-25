<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
    * This is the model class for table "my".
    *
    * @property int $id
    * @property int $status
    * @property int $partner_id
    */
    
    protected $table = 'orders';

    /**
    * Получить запись с именем партнера.
    */

    
    public function orderProducts() 
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function partner()
    {   
        return $this->belongsTo('App\Partner');
    }

    static public function getOrders()
    {
        $orders = self::paginate(25);
        self::setPriceAndNameToOrders($orders);        
        return $orders;
    }

    static public function setPriceAndNameToOrders($orders)
    {
        
        foreach($orders as $order)
        {
            self::setPriceAndNameToOrder($order);
        }

    }

    static function setPriceAndNameToOrder($order)
    {
        $price = 0;
            foreach($order->orderProducts as $product)
            {   
                
                $price += $product->quantity*$product->price;
                $product->name = Product::find($product->product_id)->name;
            }
            $order->price= $price; 
            return $order;
    }
}
