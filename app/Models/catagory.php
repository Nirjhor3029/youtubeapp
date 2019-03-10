<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    protected $table = 'catagories';

    // protected $fillable = ['category'];

    public function products(){
      return $this->hasMany('App\Models\Products','catagory_id');
    }

    public function packages(){
      return $this->hasMany('App\Models\packages','catagory_id');
    }

    public function querycart(){
      return $this->hasMany('App\Models\querycart');
    }

    public function wishlist(){
      return $this->hasMany('App\Models\wishlist','catagory_id');
    }

    public function cart(){
      return $this->belongsTo('App\Models\cart','catagory_id');
    }
}
