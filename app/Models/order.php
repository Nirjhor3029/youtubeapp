<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'confirmorder';

    protected $fillable = ['order_date','user_id','catagory_id','products_id','date','time','payment_type','mess','is_paid','is_delivered'];

    public function catagory(){
      return $this->belongsTo('App\Models\catagory');
    }

    public function product(){
      return $this->belongsTo('App\Models\products','products_id');
    }

    public function vendor(){
      return $this->belongsTo('App\Models\vendors','vendors_id');
    }

    // public function senderaddress(){
    //   return $this->belongsTo('App\Models\address','address_id');
    // }
    //
    // public function receiveraddress(){
    //   return $this->belongsTo('App\Models\address','shipping_id');
    // }

    public function user(){
      return $this->belongsTo('App\User', 'user_id');
    }
}
