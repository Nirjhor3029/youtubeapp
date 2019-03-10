<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kazi_feature extends Model
{
  protected $table = 'kazi_features';

  protected $fillable = ['vendor_id','feature_1','feature_2','feature_3','feature_4','city_area'];

  public function vendor(){
    return $this->belongsTo('App\Models\vendors', 'vendor_id');
  }
}
