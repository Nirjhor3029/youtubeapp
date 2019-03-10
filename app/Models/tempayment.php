<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempayment extends Model
{
      protected $table = 'tempayments';
      protected $fillable = ['order_id','user_id','vendor_id','product_id'];

      public function order(){
        return $this->belongsTo('App\Models\order','order_id');
      }
      public function vendor(){
        return $this->belongsTo('App\Models\vendors','vendor_id');
      }
      public function product(){
        return $this->belongsTo('App\Models\products','product_id');
      }
}
