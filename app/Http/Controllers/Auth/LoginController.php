<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


use App\User;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  //protected $redirectTo = '/';




  public function __construct()
  {
    $this->redirectTo = url()->previous();
    $this->middleware('guest')->except('logout');
  }


  public function redirectToProvider_all($service){
    //$this->check = $loginid;
    //dd($service);
    return Socialite::driver($service)->redirect();
  }



  public function handleProviderCallback_all($service){
    //dd($service);
    $user = Socialite::driver($service)->stateless()->user();

    //dd($user) ;
    $access_token = $user->token;
    if($user->name != "")
    {
      $name = $user->name;
    }else{
      $name = explode('@',$user->email)[0];
    }

    //return $name;
    $email = $user->email;
    $pass = $user->id;
    if($this->isRegistered($email)){

      $user_array = array();
      $user_array['email'] = $email;
      $user_array['password'] = $pass;

      //echo "this email is registered.";
      //return $user_array;
      /*For Login */
      if(Auth::attempt($user_array)){
        return Redirect::to('/');
      }else{
        return Redirect::to('/')->with("reg_msg","1");
      }
    }else{

      $full_name =  $name;
      $first_name ="";
      $last_name ="";

      $name_array = explode(' ',$full_name);
      $count = count($name_array);

      for($i=0;$i<$count-1;$i++){
        $first_name = $first_name." ".$name_array[$i];
      }
      $last_name = $name_array[$i];

      if($first_name == null){
        $first_name = "Not set";
      }elseif($last_name == null){
        $last_name = "Not set";
      }

      User::create([
          'name' => $name,
          'email' => $email,
          'fname' => $first_name,
          'lname' => $last_name,
          'password' => Hash::make($pass),
      ]);

      /*For Registration and login */

      $user_array = array();
      $user_array['email'] = $email;
      $user_array['password'] = $pass;

      //return $user_array;

      if(Auth::attempt($user_array)){
        return Redirect::to('/');
      }else{
        echo "Register but pass incorrect";
      }
    }
  }
  public function isRegistered($mail){

    $user = User::where('email', $mail)->first();
    if ($user) {
      return true;
    } else {
      return false;
    }
  }
}
