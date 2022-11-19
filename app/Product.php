<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'discount',
        'quantity',
        'priority',
        'description',
    ];

    public function photos(){
        return  $this->hasMany('App\Photo');
     }
     public function solds(){
        return  $this->hasOne('App\Sold');
     }

     public function catagories(){
        return  $this->belongsToMany(Catagory::class);
     }

     public function hasCatagory($catagoryId){
      return  in_array($catagoryId, $this->catagories->pluck('id')->toArray());
     }
    //  public function deleteImage(){
    //     $img = explode(",", $this->photos()->photo_path);
    //         unlink(public_path('img/products/').$img);
      
    // }

    public function scopeSearched($query){
        $search = request()->query('search');

        if (!$search) {
            return $query;
        }else{

           return $query->where('name', 'LIKE', "%{$search}%");
        }
     }

     public function admin(){
      return $this->belongsTo(User::class);
  }
}
