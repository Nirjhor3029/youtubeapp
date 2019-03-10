<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\order;
use DB;
use App\Models\address;
use App\User;
use App\Models\querycart;
use App\Models\tempayment;
use App\Models\invoice;
use App\Models\bkash_payment;
use App\Models\my_vendors;

class OrderController extends Controller
{
    public function show(Request $request)
    {
        // $datas = order::groupBy('order_set')
        //           ->groupBy('user_id')
        //           ->selectRaw('sum(total) as totals')
        //           ->selectRaw('sum(is_delivered) as delivered')
        //           ->selectRaw('user_id as user')
        //           ->selectraw('order_set as orderset')
        //           ->selectRaw('order_date as order_date')
        //           ->selectRaw('sum(is_open) as is_open')
        //           ->get();
        $datas = order::groupBy('user_id')->orderBy('created_at', 'asc')->get();

        return view('admin.order', compact('datas'));
        //dd($datas);
    }

    public function showsingle($userid)
    {
        $opens = order::where('user_id', $userid)->get();
        foreach ($opens as $open) {
            $open->is_open = 1;
            $open->save();
        }
        $datas = order::where('user_id', $userid)->with('product')->with('vendor')->where('payment_type', '>', 0)->orderBy('id', 'desc')->get();
        //dd($datas);

        // $usershipping = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->shipping_id;
        // $useraddress = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->address_id;
        // $userid = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->user_id;
        // $payment = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->payment_type;
        // $paid = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->is_paid;
        // $delivery = order::where('order_set',$orderid)->where('user_id',$userid)->firstOrFail()->is_delivered;
        //
        // $shipping = address::find($usershipping);
        // $address = address::find($useraddress);
        $user = user::find($userid);

        //dd($datas,$user);
        return view('admin.order-single', compact('datas', 'user'));
        //dd($datas,$address,$shipping,$paid,$delivery);
    }

    public function UpdatePayment($id, $user)
    {
        $updates = order::where('order_set', $id)->where('user_id', $user)->where('is_paid', 0)->get();
        foreach ($updates as $update) {
            $update->is_paid = 1;
            $update->save();
        }
        return redirect()->back();
    }

    public function UpdateStatus($id, $user)
    {
        $updates = order::where('order_set', $id)->where('user_id', $user)->where('is_delivered', 0)->get();
        foreach ($updates as $update) {
            $update->is_delivered = 1;
            $update->save();
        }
        return redirect()->back();
    }

    public function ClientOrder($user)
    {
        $datas = order::where('user_id', $user)
            ->with('product')
            ->with('vendor')
            ->get();
        //return $datas;
        //dd($datas);
        return view('pages.order', compact('datas'));
    }

    public function payment()
    {
        $datas = order::where('user_id', Auth::user()->id)->with('vendor')->with('catagory')->where('payment_type', '=', 0)->with('product')->get();
        //dd($datas);
        // $temporders = tempayment::where('user_id', Auth::user()->id)->with('order')->with('vendor')->with('product')->get();
        $temporders = order::where('user_id', Auth::user()->id)->where('temp_add', '=', 1)->where('payment_type', '=', 0)->with('vendor')->with('catagory')->with('product')->get();
        //dd($temporders);
        return view('user.payment', compact('datas', 'temporders'));
    }

    public function payonline($id)
    {
        //dd($id);
        $datas = order::where('id', "=", $id)->with('vendor')->with('catagory')->with('product')->get();
        order::where('id', "=", $id)->update(['temp_add' => 1]);
        //dd($datas);
        //dd($datas[0]->vendors_id);
        //$add = tempayment::create(['user_id'=>$datas[0]->user_id,'order_id'=>$id,'vendor_id'=>$datas[0]->vendors_id,'product_id'=>$datas[0]->products_id]);
        return redirect()->back();
    }

    public function tempDel($id)
    {
        order::where('id', "=", $id)->update(['temp_add' => 0]);
        return redirect()->back();
    }

    public function paymentDel($id)
    {
        $pay = order::find($id);
        $pay->delete();
        return redirect()->back();
    }

    public function manualPayment($id)
    {
        $pay = order::find($id);
        $pay->update(['is_paid' => 1]);
        return redirect()->back();
    }

    public function invoice($id)
    {
        $datas = order::where('invoice_id', $id)->with('vendor')->with('catagory')->with('product')->get();
        $invoice = invoice::find($id);
        $bkash = bkash_payment::find($invoice->bkash_id)->first();
        //$bkash = bkash_payment::where('id',$datas)
        return view('admin.invoice', compact('datas', 'invoice', 'bkash'));
        //dd($bkash);
    }

    public function myvendors(Request $r)
    {
        $datas = my_vendors::where('user_id', $r->id)->get();
        //dd($datas);
        return view('user.my-vendors', compact('datas'));
    }

    public function createMyvendor(Request $r)
    {
        //dd($r->all());
        $user = Auth::user();
        $createMyVendor = new my_vendors;
        $createMyVendor->user_id = $user->id;
        $createMyVendor->vendors_name = $r->vendor_name;
        $createMyVendor->catagory = $r->catagory;
        $createMyVendor->contact_details = $r->contact_detail;
        $createMyVendor->service_time = $r->service_time;
        $createMyVendor->service_date = $r->service_date;
        $createMyVendor->total_payment = $r->total;
        $createMyVendor->advance_payment = $r->advance;
        $createMyVendor->due_payment = $r->due;
        $createMyVendor->save();
        return redirect()->back();
    }

    public function updateMyVendors(Request $r)
    {
        //dd($r->all());
        $updateVen = my_vendors::find($r->venid);
        $updateVen->update([
            'vendors_name' => $r->vendor_name,
            'catagory' => $r->catagory,
            'contact_details' => $r->contact_detail,
            'service_time' => $r->service_time,
            'service_date' => $r->service_date,
            'total_payment' => $r->total,
            'advance_payment' => $r->advance,
            'due_payment' => $r->due,
        ]);
        return redirect()->back();
    }

    public function deleteMyVendor($id)
    {
        $del = my_vendors::find($id);
        $del->delete();
        return redirect()->back();
    }

    public function deleteall($id)
    {
        $user = Auth::user();
        $del = my_vendors::where('user_id', $id);
        $del->delete();
        return redirect()->back();
    }

    /** Confirm list in admin section  **/
    public function confirmList()
    {
        $datas = order::where('payment_type', 0)->groupBy('user_id')->with('user')->get();
        //dd($datas);
        return view('admin.confirm', compact('datas'));
    }

    /** Confirm list single in admin section  **/
    public function confirmSingle($id)
    {
        $datas = order::where('payment_type', 0)->where('user_id', $id)->with('user')->get();

        // return $datas[0]->user;
        $vendors = order::where('payment_type', 0)->where('user_id', $id)->where('vendors_id', '!=', 0)->with('vendor')->with('catagory')->get();
        $products = order::where('payment_type', 0)->where('user_id', $id)->where('products_id', '!=', 0)->with('product')->with('catagory')->get();
//dd($vendors);
        return view('admin.confirm-single', compact('datas', 'vendors', 'products'));
    }


    public function paySuccess()
    {
        return view('user.success');
    }

    public function payFail()
    {

    }

    public function payCancel()
    {

    }

}
