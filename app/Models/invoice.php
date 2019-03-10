<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
  protected $table = 'invoice';

  protected $fillable = ['bkash_id','wire_id'];

  public function bkash(){
    return $this->belongsTo('App\Models\bkash_payment','bkash_id');
  }
}
