<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';

    protected $fillable = ['user_id','catagory_id','products_id','date','time','quantity','mess','status'];

    public function catagory(){
      return $this->belongsTo('App\Models\catagory');
    }

    public function product(){
      return $this->belongsTo('App\Models\products','products_id');
    }

    public function user(){
      return $this->hasMany('App\user');
    }
}
