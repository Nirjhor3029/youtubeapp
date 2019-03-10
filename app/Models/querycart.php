<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class querycart extends Model
{
      protected $table = 'query_cart';

      protected $fillable = ['user_id','catagory_id','vendors_id','products_id','date','maindate','advance','total','time','package_id','mess'];

      public function vendors(){
          return $this->belongsTo('App\Models\vendors','vendors_id');
      }
      public function catagory(){
          return $this->belongsTo('App\Models\catagory');
      }
      public function package(){
          return $this->belongsTo('App\Models\packages');
      }
      public function product(){
          return $this->belongsTo('App\Models\products','products_id');
      }

      public function user(){
        return $this->belongsTo('App\User');
      }
}
