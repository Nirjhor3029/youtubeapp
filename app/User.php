<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password','fname','lname','contact','mybudget'
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function wishlist(){
    return $this->hasMany('App\Models\wishlist');
  }

  public function address(){
    return $this->hasMany('App\Models\address');
  }
  public function order(){
    return $this->hasMany('App\Models\order','user_id');
  }
  public function rating(){
    return $this->hasMany('App\Models\rating','user_id');
  }

  /*public function querycart(){
    return $this->belongsTo('App\Models\querycart','user_id');
  }*/


}
