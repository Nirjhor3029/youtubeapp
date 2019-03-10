<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tempquery extends Model
{
  protected $table = 'query_cart';

  protected $fillable = ['user_id','query_set','catagory_id','vendors_id','products_id','date','time','package_id','mess'];
}
