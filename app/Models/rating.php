<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = ['vendor_id','user_id','rating','review'];

    public function vendor(){
      return $this->belongsTo('App\Models\vendors','vendor_id');
    }
    public function user(){
      return $this->belongsTo('App\User','user_id');
    }
}
