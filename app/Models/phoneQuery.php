<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phoneQuery extends Model
{
  protected $table = 'phone_query';

  protected $fillable = ['name','vendor_id','products_id','is_followup'];

  public function product(){
    return $this->belongsTo('App\Models\Products','products_id');
  }

  public function vendor(){
    return $this->belongsTo('App\Models\vendors','vendor_id ');
  }
}
