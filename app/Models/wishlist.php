<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $table = 'wishlist';

      // protected $fillable = ['user_id','catagory_id','vendors_id','products_id'];

    public function catagory(){
      return $this->belongsTo('App\Models\catagory');
    }

    public function user(){
      return $this->belongsTo('App\user','user_id');
    }

    public function vendor(){
      return $this->belongsTo('App\Models\vendors','vendors_id');
    }

    public function product(){
      return $this->belongsTo('App\Models\products','products_id');
    }

}
