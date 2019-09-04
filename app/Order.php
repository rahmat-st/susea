<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'no_order', 'product_id', 'supplier', 'buyer', 'buyer_name', 'buyer_contact', 'buyer_address', 'total', 'total_price', 'order_status'
    ];
}
