<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendor_features extends Model
{
      protected $table = 'vendor_featurs';

      public function catagory(){
        return $this->belongsTo('App\Models\catagory');
      }
}
