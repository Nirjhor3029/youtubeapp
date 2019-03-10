<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table = 'product_image';

    protected $fillable = ['products_id','img_location'];

    public function product(){
      return $this->belongsTo('App\Models\products','products_id');
    }
}
