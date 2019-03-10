<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budgetcost extends Model
{
  protected $table = 'budgetcost';

  protected $fillable = ['user_id','venue','decoration','outfit','photo','jewelery','makeup','music','catering','bakeries','invitation','legal','transportation','honeymoon','other'];

  public function user(){
    return $this->belongsTo('App\User', 'user_id');
  }
}
