<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vendor_image extends Model
{
    protected $table = 'vendor_images';

    protected $fillable = ['catagory_id','vendors_id','image_locations'];

    public function vendors_img(){
      return $this->belongsTo('App\Models\vendors');
    }
}
