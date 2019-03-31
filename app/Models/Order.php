<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['category','product_slug','product_size_id','product_name','product_price','qty',
                            'customer_name', 'customer_phone', 'customer_shipping_name', 'customer_shipping_phone',
                            'delivery_type','delivery_date','delivery_time','delivery_address','payment_method','add_info'];
}
