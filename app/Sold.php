<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    protected $fillable = [
        'product_id',
        'sold_product'
    ];

    public function products(){
        return  $this->belongsTo('App\Product');
     }
}
