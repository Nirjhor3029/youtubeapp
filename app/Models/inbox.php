<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    protected $table = 'inboxes';

    protected $fillable = ['user_id', 'catagory_id', 'vendors_id','product_id','query_id'];

    public function catagory(){
      return $this->belongsTo('App\Models\catagory');
    }

    public function product(){
      return $this->belongsTo('App\Models\products','product_id');
    }

    public function user(){
      return $this->belongsTo('App\user', 'id');
    }

    public function vendors(){
        return $this->belongsTo('App\Models\vendors','vendors_id');
    }

    public function querys(){
        return $this->belongsTo('App\Models\querycart','query_id');
    }
}
