<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inboxchat extends Model
{
    protected $table = 'inboxchat';

    protected $fillable = ['inbox_id', 'msg', 'msg_type'];

    
}
