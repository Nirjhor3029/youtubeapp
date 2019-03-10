<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Mail;
use App\Models\order;
use App\Models\querycart;
use App\Models\contactus;
use View;

class MailController extends Controller
{
  // contact mail from event coordinator page
  public function postContact(Request $request){
    $this->validate($request, [
      'email' => 'required|email',
      'message' => 'min:5',
      'phone' => 'min:10']);

    $email = $request->email;
    $data = array(
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'bodyMessage' => $request->mess
    );

      /*
       *  Mail::send('emails.contact', $data, function($mess) use ($data){
          $mess->from('admin@ayojok.com','Ayojok.com');
          $mess->to($data['email']);
          $mess->subject("Contact Us | Ayojok");
      });

      */

    $contact = new contactus;
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->messbody = $request->mess;
    $contact->save();

      /*Mail::send('emails.order', array('orders'=>$datas), function($mess) use ($datas){
          $mess->from('booking@ayojok.com','Ayojok.com');
          //$mess->bcc(Auth::user()->email);
          $mess->to(Auth::user()->email,Auth::user()->name);
          $mess->subject("Ayojok | Order");
      });*/

      Mail::send('emails.contact', $data, function($mess) use ($data){
          $mess->from('admin@ayojok.com','Ayojok.com');
          $mess->to($data['email']);
          $mess->subject("Contact Us | Ayojok");
      });
  }

  // mail for order placement
  public function orderMail(){
    $setId = session('set');
    $user = Auth::user()->id;
    $datas = order::where("order_set",$setId)
                  ->where("user_id",$user)
                  ->with('product')
                  ->with('senderaddress')
                  ->with('receiveraddress')
                  ->get();
    //$orders= array($datas);
  //  dd($user);
    //dd($datas);
    // $data = array(
    //   'name' => $request->name,
    //   'email' => $request->email,
    //   'phone' => $request->phone,
    //   'bodyMessage' => $request->message
    // );


    Mail::send('emails.order', array('orders'=>$datas), function($mess) use ($datas){
      $mess->from('booking@ayojok.com','Ayojok.com');
      //$mess->bcc(Auth::user()->email);
      $mess->to(Auth::user()->email,Auth::user()->name);
      $mess->subject("Ayojok | Order");
    });

  //Session::flush();
  //dd($datas);
  $payment = $datas->first()->payment_type;
  return View::make('checkout.check4',['payment'=>$payment]);
  }

  public function queryMail(Request $r){
    $user = $r->id;
    $vendor = $r->item;
    $datas = querycart::where("user_id","=",$user)
                      ->where("vendors_id","=",$vendor)
                      ->where("is_available","=",0)
                      ->with('product')
                      ->with('vendors')
                      ->with('package')
                      ->with('catagory')
                      ->with('user')
                      ->get();
    $querys = array($datas);
    //dd($querys);

  // Active when on live server
    Mail::send('emails.query', array('querys'=>$datas), function($mess) use ($datas){
      $mess->from('booking@ayojok.com','Ayojok.com');
      $mess->to(Auth::user()->email,Auth::user()->name);
      $mess->subject("Ayojok | Query");
    });

    return back();
  }

  public function Notify(Request $r){
    $user = Auth::user();
    //$query_set = $r->query_set;
    $datas = querycart::where("user_id","=",$user->id)
                      ->where("status","=",1)
                      ->where("is_available","=",1)
                      ->with('product')
                      ->with('vendors')
                      ->with('package')
                      ->with('catagory')
                      ->with('user')
                      ->get();
    $querys = array($datas);

    // Active when on live server
      Mail::send('emails.query', array('querys'=>$datas), function($mess) use ($datas){
        $mess->from('booking@ayojok.com','Ayojok.com');
        $mess->to(Auth::user()->email,Auth::user()->name);
        $mess->subject("Ayojok | Query Update");
      });
      return redirect()->back();
  }
}
