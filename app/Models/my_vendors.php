<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class my_vendors extends Model
{
  protected $table = 'my_vendors';

  protected $fillable = ['user_id','vendor_name','catagory','contact_details','service_time','service_date','total_payment','advance_payment','due_payment'];

}
