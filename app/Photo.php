<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'product_id',
        'photo_path'
    ];

    public function products(){
        return  $this->belongsTo('App\Product');
     }
}
