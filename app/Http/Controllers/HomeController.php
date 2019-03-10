<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\User;
use Auth;
use App\Models\budgetcost;
use App\Models\budgetpaid;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function postContact(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'message' => 'min:5',
        'phone' => 'min:10']);

      $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'bodyMessage' => $request->message
      );
      Mail::send('emails.contact', $data, function($mess) use ($data){
        $mess->from($data['email']);
        $mess->to('ns.shamit@gmail.com');
        $mess->subject("Contact Us | Ayojok");
      });
    }

    public function addBudget(Request $r){
      $add = User::find($r->userid);
      $add->mybudget = $r->totalBudget;
      $add->save();
      return redirect()->back();
    }

    public function show(Request $r){
      $userid = Auth::user()->id;
      //echo $userid;
      $cost = budgetcost::where('user_id',$userid)->first();
      $paid = budgetpaid::where('user_id',$userid)->first();
      return view('user.my-budget',compact('cost','paid'));
    }

    public function updateBudget(Request $r){
      $cost = budgetcost::updateOrCreate([
        'user_id' => $r->id,
      ],[
        'venue' => $r->venue_c,
        'decoration' => $r->decoration_c,
        'outfit' => $r->outfit_c,
        'jewelery' => $r->jewelery_c,
        'makeup' => $r->makeup_c,
        'photo' => $r->photo_c,
        'music' => $r->music_c,
        'catering' => $r->catering_c,
        'bakeries' => $r->bakeries_c,
        'invitation' => $r->invitation_c,
        'legal' => $r->legal_c,
        'transportation' => $r->transportation_c,
        'honeymoon' => $r->honeymoon_c,
        'other' => $r->other_c
      ]);

      $paid = budgetpaid::updateOrCreate([
        'user_id' => $r->id,
      ],[
      'venue' => $r->venue_p,
      'decoration' => $r->decoration_p,
      'outfit' => $r->outfit_p,
      'jewelery' => $r->jewelery_p,
      'makeup' => $r->makeup_p,
      'photo' => $r->photo_p,
      'music' => $r->music_p,
      'catering' => $r->catering_p,
      'bakeries' => $r->bakeries_p,
      'invitation' => $r->invitation_p,
      'legal' => $r->legal_p,
      'transportation' => $r->transportation_p,
      'honeymoon' => $r->honeymoon_p,
      'other' => $r->other_p
      ]);
      return redirect()->back();
      // $all = $r->all();
      // dd($all);
    }

  
}
