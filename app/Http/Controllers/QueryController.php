<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// use App\Models\catagory;
use App\Models\querycart;
use App\User;
use Validator;
use App\Models\order;
class QueryController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $userid = Auth::user()->id;
    $querydatas = querycart::with('vendors')->with('catagory')->with('package')->with('product')->where('user_id', $userid)->where('status',0)->get();
    //dd($querydatas);
    return view('user.query-cart',compact('querydatas'));
  }

  public function show()
  {
    $userid = Auth::user()->id;
    //$confirmquerys = querycart::with('vendors')->with('catagory')->with('package')->with('product')->where('user_id', $userid)->where('status',0)->where('is_confirm', 1)->get();
    $querydatas = querycart::with('vendors')->with('catagory')->with('package')->with('product')->where('user_id', $userid)->where('is_confirm', 0)->get();
    //dd($querydatas);
    return view('user.account-query-cart',compact('querydatas'));
  }

  public function confirmOne($id)
  {
    //$userid = Auth::user()->id;
    $update = querycart::find($id);
    //dd($singledata);
    //$singledata->time;
    // $singledata->is_confirm = 1;
    // $singledata->save();
    // $update = querycart::find($id);

    $order = new order;
    $order->order_date = $update->maindate;
    $order->user_id = $update->user_id;
    $order->catagory_id = $update->catagory_id;
    $order->products_id = $update->products_id;
    $order->vendors_id = $update->vendors_id;
    $order->mess = $update->mess;
    $order->advance = $update->advance;
    $order->total = $update->total;
    $order->time = $update->time;
    $order->save();
    $update->delete();
    return redirect()->back()->with("modal_message", "Added to your payment list");;
    // return response()->json([
    //   'type' => 'sucess',
    //   'data' => $singledata,
    // ])->back();
  }

  public function deleteOne($id){
    $singledata = querycart::find($id);
    $singledata->delete();
    return redirect()->back();
  }

  public function deleteAll($id){
    $datas = querycart::where('user_id',$id)->delete();
    return redirect()->back();
  }

  public function destroy(Request $r)
  {
    $id = $r->input('id');
    $item = querycart::find($id);
    $item->delete();
    return response()->json(['id'=>$id]);
  }

  public function send(){
    $userid = Auth::user()->id;
    $querydatas = querycart::where('user_id', $userid)->where('status',0)->get();
    $set = $querydatas->first()->query_set;

    if($querydatas->isNotEmpty()){
      foreach ($querydatas as $querydata) {
        $value = array('status'=> 1);
        $sendreq = querycart::where('user_id', $userid)->where('status',0)->update($value);
      }
      return redirect()->route('query-send');
      // dd($querydata);
    }else{
      return back();
    }
  }

  public function adminlist(){
    // $datas = querycart::groupBy('user_id')->where('status',0)->with('user')->where('is_confirm', 0)->get();
    $datas = querycart::groupBy('user_id')->where('status',0)->with('user')->where('is_confirm', 0)->get();

    //$counts = querycart::groupBy('user_id')->groupBy('query_set')->where('status',1)->get(array('query_set', DB::raw('count(*) as total')))->get();
    //dd($datas);
    return view('admin.query',compact('datas'));
  }

  public function adminlistdetails($user){
    $opens = querycart::where('user_id',$user)->where('is_open',0)->get();
    foreach ($opens as $open) {
      $open->is_open = 1;
      $open->save();
    }
    $emails = querycart::where('user_id',$user)->get();

    $datas = User::find($user);
    $vendors = querycart::where('user_id',$user)->with('catagory')->with('vendors')->with('package')->where('vendors_id','!=',0)->where('status',0)->where('is_available',0)->get();
    $services = querycart::where('user_id',$user)->with('catagory')->where('products_id','!=',0)->with('product')->where('status',0)->where('is_available',0)->get();
    //dd($datas,$vendors,$services);
    return view('admin.query-single',compact('datas','vendors','services','emails'));
  }

  public function UpdateStatus(Request $request){

    $validator = Validator::make($request->all(), [
      'advance' => 'required',
      'total' => 'required',
      'maindate'=>'required',
      'time'=>'required'
    ]);

    $id = $request->id;
    $user = $request->user;
    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }else{

        // $update = querycart::find($id);
        // $order = new order;
        // $order->order_date = $update->date;
        // $order->user_id = $update->user_id;
        // $order->catagory_id = $update->catagory_id;
        // $order->products_id = $update->products_id;
        // $order->vendors_id = $update->vendors_id;
        // $order->mess = $update->mess;
        // $order->advance = $request->advance;
        // $order->total = $request->total;
        // $order->save();
        // $update->delete();

        $update = querycart::find($id);
        $update->advance = $request->advance;
        $update->total = $request->total;
        $update->time = $request->time;
        $update->maindate = $request->maindate;
        $update->status = 1;
        $update->is_available = 1;
        $update->save();

    }
    return redirect()->back();
  }

  public function NoStatus($id,$user){
    $updates = querycart::where('id',$id)->where('user_id',$user)->where('is_available',0)->get();
    foreach ($updates as $update) {
      $update->is_available = 2;
      $update->save();
    }
    // $updates = querycart::find($id);
    // $updates->delete();
    return redirect()->back();
  }

  public function confirmList(){
    $datas = querycart::groupBy('user_id')->where('is_confirm', 1)->where('status',1)->with('user')->get();
    return view('admin.confirm',compact('datas'));
  }


  public function confirmSingle($user){
    // $opens = querycart::where('user_id',$user)->where('query_set',$id)->where('is_open',0)->get();
    // foreach ($opens as $open) {
    //   $open->is_open = 1;
    //   $open->save();
    // }

    $datas = User::find($user);
    $vendors = querycart::where('user_id',$user)->with('catagory')->with('vendors')->with('package')->where('vendors_id','!=',0)->where('is_confirm', 1)->get();
    $services = querycart::where('user_id',$user)->with('catagory')->where('products_id','!=',0)->with('product')->where('is_confirm', 1)->get();
    //dd($datas,$vendors,$services);
    return view('admin.confirm-single',compact('datas','vendors','services'));
  }


  public function test_rough(){

    // $datas = querycart::groupBy('user_id')->where('status',0)->with('user')->where('is_confirm', 0)->get();

//    $datas = querycart::groupBy('user_id')->where('status',0)->with('user')->where('is_confirm', 0)->get();

    //$counts = querycart::groupBy('user_id')->groupBy('query_set')->where('status',1)->get(array('query_set', DB::raw('count(*) as total')))->get();
    //dd($datas);
    //return view('admin.query',compact('datas'));



    /*$datas_gruopBy_user_id['29']->count()*/

    //$datas_count_user_id = querycart::all();


    //$user = User::where('id',29)->first();

    //return $user->name;



    $datas_count_user_id = querycart::where('status',0)->groupBy('user_id')->orderBy('created_at','asc')->select('user_id','created_at', DB::raw('count(*) as total'))->get();
    //return $datas_count_user_id[0]->user_id ;
    //return $datas_count_user_id ;

    $datas_for_query_icon = array();


    for($i=0;$i<$datas_count_user_id->count();$i++){

      $user_id = $datas_count_user_id[$i]->user_id;
      $user = User::where('id',$user_id)->first();

      $datas_for_query_icon[$i] = [
        'user_id' => $user_id,
        'total_query_as_user_id' =>  $datas_count_user_id[$i]->total,
        'user_name' => $user->name,
        'created_at' => $datas_count_user_id[$i]->created_at,
      ];
    }

    return $datas_for_query_icon;


    //$datas = querycart::where('status',0)->groupBy('user_id')->select('*', DB::raw('count(*) as total'))->get();
    //return $datas;
    //dd($datas);

    /*foreach($datas as $data){

      //echo $data->user_id."<br>";
    }
     $datas_gruopBy_user_id = $datas->groupBy('user_id');

    return($datas_gruopBy_user_id) ;*/

  }


}
