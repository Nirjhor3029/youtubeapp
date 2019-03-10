<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bkash_payment extends Model
{
    protected $table = 'bkash_payment';

    protected $fillable = ['used_num','trxID','invoice_id','comment'];

    public function bkash(){
      return $this->belongsTo('App\Models\invoice','id');
    }

}
