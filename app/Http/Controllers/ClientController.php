<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\address;
use Auth;
use Session;

class ClientController extends Controller
{
  public function show(Request $request)
  {
    $datas = user::all();
    return view('admin.client', compact('datas'));
    //dd($datas);
  }
  public function showsingle($id)
  {
    $data = user::where('id',$id)->firstOrFail();
    $addresses = address::where('user_id',$id)->get();
    return view('admin.client-single', compact('data','addresses'));
    //dd($data,$addresses);
  }
}
