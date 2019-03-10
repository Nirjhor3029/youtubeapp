<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custom_order extends Model
{
  protected $table = 'custom_order';

  protected $fillable = ['user_id','vendor_id','products_id','time', 'date','advance','total'];

  public function product(){
    return $this->belongsTo('App\Models\Products','products_id');
  }

  public function vendor(){
    return $this->belongsTo('App\Models\vendors','vendor_id');
  }

  public function offline_user(){
    return $this->belongsTo('App\Models\offline_user','user_id');
  }

}
