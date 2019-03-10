<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mehedi_feature extends Model
{
  protected $table = 'mehedi_feature';

  protected $fillable = ['vendor_id','feature_1','feature_2','feature_3','feature_4','feature_5','feature_6','feature_7','feature_8'];
  
  public function vendor(){
    return $this->belongsTo('App\Models\vendors', 'vendor_id');
  }
}
