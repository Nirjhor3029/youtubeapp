<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
use App\Models\order;
use App\Models\cart;
use App\Models\Products;
use App\Models\invoice;
use App\Models\bkash_payment;
use App\Models\my_vendors;
use Auth;
use Session;
use Carbon\Carbon;

class CheckoutController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show(Request $request)
  {
    $user = Auth::user();
    $datas = address::where("user_id", "=", $user->id)->get();
    return view('checkout.check1', compact('datas'));
    //dd($datas);
  }

  public function address(Request $request){
    //dd($request->all());
    if($request->addressSelect == 0){
      $newaddress = Address::create($request->all());
      Session::put('addressId',$newaddress->id);
      return redirect()->route('shipping');
    }else{
      Session::put('addressId',$request->addressSelect);
      return redirect()->route('shipping');
    }
  }

  public function shippingShow(Request $request)
  {
    $user = Auth::user();
    $datas = address::where("user_id", "=", $user->id)->get();
    return view('checkout.check2', compact('datas'));
    //dd($datas);
  }

  public function shippingAdd(Request $request){
    if($request->addressSelect == 0){
      $newaddress = Address::create($request->all());
      Session::put('shippingId',$newaddress->id);
      return redirect()->route('payment');
    }else{
      Session::put('shippingId',$request->addressSelect);
      return redirect()->route('payment');
    }
  }

  public function paymentShow(Request $request)
  {
    $total = $request->total;
    $user = Auth::user();
    return view('checkout.check3', compact('total','user'));
  }

  public function paidOnline(Request $request)
  {
    $pay = $request->payment;
    $user = Auth::user();
    return view('checkout.check4', compact('pay','user'));
  }


  public function paymentAdd(Request $request)
  {
    //dd($request->all());

    $user = Auth::user();
    //$datas = cart::where("user_id", "=", $user->id)->get();
    $datas = order::where("user_id", "=", $user->id)->where('temp_add','=',1)->where('payment_type',0)->where('online_paid',0)->with('catagory')->with('vendor')->with('product')->get();
    $orders = order::where("user_id", "=", $user->id)->where('temp_add','=',1)->where('payment_type',0)->where('online_paid',0)->pluck('id')->implode(',');

    //$orderitem = implode(",", $orders);

    // Add Bkash data to bkash table
    $bkash = new bkash_payment;
    $bkash->used_num = $request->used_num;
    $bkash->trxID = $request->trxid;
    $bkash->comment = $request->comments;
    $bkash->save();
    // get the latest inserted row id fro bkash table
    $bkash_id = $bkash->id;

    // Add Invoice with bkash Id and order Id
    $newinvoice = new invoice;
    $newinvoice->bkash_id = $bkash_id;
    $newinvoice->orders_id = $orders;
    $newinvoice->save();
    // get the latest inserted row id from invoice table
    $order_invoice = $newinvoice->id;

    // Update the order table
    foreach ($datas as $data) {
      $neworder = order::find($data->id);
      $neworder->payment_type = $request->paymentCheck;
      $neworder->online_paid = 1;
      $neworder->temp_add = 2;
      $neworder->invoice_id = $order_invoice;
      $neworder->save();

      $addmyvendor = new my_vendors;
      $addmyvendor->user_id = $user->id;
      if (count($data->vendor) > 0) {
        $addmyvendor->vendors_name = $data->vendor->title;
        $addmyvendor->contact_details = $data->vendor->contact;
      }
      elseif(count($data->product) > 0){
        $addmyvendor->vendors_name = $data->product->title;
        $addmyvendor->vendors_name = $data->product->contact;
      }
      $addmyvendor->catagory = $data->catagory->name;
      $addmyvendor->service_time = $data->time;
      $addmyvendor->service_date = $data->order_date;
      $addmyvendor->total_payment = $data->total;
      $addmyvendor->advance_payment = $data->advance;
      $addmyvendor->due_payment = $data->total - $data->advance;
      $addmyvendor->save();
    }

    //return redirect()->route('payment');
    return redirect()->route('checkout',['payment'=>1]);

    // $orders = Session::all();
    // dd($orders);
  }
}
