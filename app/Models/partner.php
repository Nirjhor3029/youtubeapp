<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
  protected $table = 'partners';

  protected $fillable = ['name','company','business_type','contact_addres','office_address','email','phone','experience','mess'];
}
