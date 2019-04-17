<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';

    protected $fillable = ['user_id','fname','lname','company','line1','line2','city','contact','address_id','extraInfo','addressName'];

    protected $data = ['created_at','updated_at'];



    public function user(){
      return $this->belongsTo('App\user');
    }

}
