<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    // protected $fillable = [
    //     'image'
    //     'title'
    //     'price'
    // ];


    public function catagory(){
      return $this->belongsTo('App\Models\catagory','catagory_id');
    }

    public function querycart(){
      return $this->hasMany('App\Models\querycart');
    }

    public function wishlist(){
      return $this->hasMany('App\Models\wishlist');
    }

    public function images(){
      return $this->hasMany('App\Models\product_image');
    }

    public function custom_order(){
      return $this->hasMany('App\Models\custom_order','products_id');
    }

}
