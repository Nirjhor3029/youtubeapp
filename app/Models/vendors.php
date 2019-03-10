<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendors extends Model
{
  protected $table = 'vendors';

  public function packages()
  {
    return $this->hasMany('App\Models\packages','vendors_id','id');
  }

  public function images()
  {
    return $this->hasMany('App\Models\vendor_image','vendors_id','id');
  }

  public function features()
  {
    return $this->belongsTo('App\Models\vendor_features');
  }

  public function wishlist(){
    return $this->hasMany('App\Models\wishlist','vendors_id');
  }

  public function rating(){
    return $this->hasMany('App\Models\rating');
  }

  public function custom_order(){
    return $this->hasMany('App\Models\custom_order','vendor_id');
  }

  public function catagory(){
    return $this->belongsTo('App\Models\catagory','catagory_id');
  }
}
