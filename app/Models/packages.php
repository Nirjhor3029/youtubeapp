<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
  protected $table = 'packages';

  protected $fillable = ['catagory_id','vendors_id','title','price','description','image'];

  public function catagory()
  {
      return $this->hasMany('App\Models\catagory');
  }

  public function vendors(){
    return $this->belongsTo('Vendors');
  }


  // public function querycart(){
  //   return $this->belongsTo('App\Models\querycart');
  // }

}
