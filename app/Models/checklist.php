<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checklist extends Model
{
  protected $table = 'checklist';

  protected $fillable = ['user_id','section','details','status'];

}
