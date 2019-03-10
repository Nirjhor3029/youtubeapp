<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
      protected $table = 'contactus';

      //protected $fillable = ['name','email','phone','message'];

      protected $data = ['created_at','updated_at'];

      public function user(){
        return $this->belongsTo('App\user');
      }
}
