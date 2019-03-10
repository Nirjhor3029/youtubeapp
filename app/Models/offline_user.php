<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offline_user extends Model
{
    protected $table = 'offline_user';

    protected $fillable = ['name','phone','email','address'];

    public function custom_order(){
      return $this->hasMany('App\Models\custom_order','user_id');
    }
}
