<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_name',
        'product_id',
        'customer_fname',
        'customer_lname',
        'customer_phone',
        'product_quantity',
        'order_number',
        'is_sold',
    ];

    public function admin(){
        return $this->belongsTo(User::class);
    }
}
