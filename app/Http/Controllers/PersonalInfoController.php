<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\address;
use Auth;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function test_get_method(){

        $pattern ="/.com/";
        echo $server_name = $_SERVER['SERVER_NAME'];
        if(preg_match($pattern,$server_name)){
            $path = base_path();
        }else{
            $path = public_path();
        }

        echo "<be> path after condition: ".$path;

    }
    public function test_post_method(){

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        //$address = address::where('user_id',$id)->pluck('addressName','id');
      //$mines = address::where('id',$users->address_id)->get();
        //dd($mines);
        return view('user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user -> fname = request('fname');
        $user -> lname = request('lname');
        $user -> email = request('email');
        $user -> contact = request('contact');
        $user -> address = request('address');
        if (is_null(request('password'))) {
          $user->update();
        }else{
        $user -> password = bcrypt(request('password'));
        $user->update();
        }
        return redirect()->route('my-account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
