<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
// use App\Models\CatProducts;
use App\Models\catagory;
use App\Models\products;
use App\Models\querycart;
use App\Models\cart;
use App\Models\inbox;

class OurServices extends Controller
{

  // public function show()
  // {
  //   $vehiclehotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',1)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $lighthotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',2)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $snackshotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',3)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $dalashotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',4)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $holudhotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',5)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $weddinghotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',6)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $crafthotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',7)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   $flowershotproducts = DB::table('hotoffers')
  //   ->join('catagories', 'hotoffers.catagory_id', '=', 'catagories.id')
  //   ->join('products', 'hotoffers.product_id', '=', 'products.id')
  //   ->where('hotoffers.catagory_id','=',8)
  //   ->select('hotoffers.catagory_id','products.image','products.title','products.price','catagories.name','products.id')
  //   ->get();
  //
  //   return view('pages.our-services',compact('vehiclehotproducts','lighthotproducts','snackshotproducts','snackshotproducts','dalashotproducts','holudhotproducts','weddinghotproducts','crafthotproducts','flowershotproducts'));
  // }

  public function CatProducts($catagory){
    $catagorydata = catagory::where('name',$catagory)->firstOrFail();
    $catagoryid = $catagorydata->id;
    // $catagorytype = $catagorydata->is_service;
    // if ($catagorytype=='1') {
    //   switch ($catagory) {
    //     case 'vehicle':
    //       // ayojok_vehicle table
    //         $datas = products::where('catagory_id',$catagoryid)->orderBy('id','desc')->get();
    //         return view('pages.services',compact('datas','catagorydata'));
    //       break;
    //     case 'light & sound':
    //       // light&sound table
    //         $datas = products::where('catagory_id',$catagoryid)->orderBy('id','desc')->get();
    //         return view('pages.services',compact('datas','catagorydata'));
    //       break;
    //     case 'holud snacks':
    //       // holudsnacks table
    //         $datas = products::where('catagory_id',$catagoryid)->orderBy('id','desc')->get();
    //         return view('pages.services',compact('datas','catagorydata'));
    //       break;
    //     case 'crafts & alpona':
    //       // crafts&alpona table
    //         $datas = products::where('catagory_id',$catagoryid)->orderBy('id','desc')->get();
    //         return view('pages.services',compact('datas','catagorydata'));
    //       break;
    //   }
    //
    // }else{
    //   $datas = products::where('catagory_id',$catagoryid)->orderBy('id','desc')->get();
    //   return view('pages.products',compact('datas','catagorydata'));
    // }

    $datas = products::where('catagory_id',$catagoryid)->where('status',0)->orderBy('id','desc')->get();
    return view('pages.products',compact('datas','catagorydata'));

  }

  public function Services($catagory,$product){
    $catagorydata = catagory::where('name',$catagory)->firstOrFail();
    $catagoryid = $catagorydata->id;
    $singleproduct = products::where('catagory_id',$catagoryid)->where('id',$product)->with('images')->first();
    if ($singleproduct->is_sellable == "1" ) {
      return view('pages.ayojok-product',compact('singleproduct'));
    } else {
      return view('pages.ayojok-service',compact('singleproduct'));
      //dd($singleproduct);
    }
    // dd($catagorydata);
    // dd($singleproducts);
  }

  public function product(Request $request){

    $userid = Auth::user()->id;
    $catagory_id = $request->input('catagory_id');
    $product_id = $request->input('product_id');
    $datestring = $request->input('date');
    // $qnt = $request->input('qnt');
    $mess = $request->input('mess');
    // dd($product_id);

    $query = querycart::where("user_id", "=", $userid)->where('status',1)->orderBy('created_at','desc')->first();

    // if (empty($query)) {
    //   $query_last = 1;
    // }else{
    //   $query_data = $query->query_set;
    //   $query_last = $query_data + 1;
    // }

    // if(empty($qnt)){
    //   $status=querycart::where('user_id',Auth::user()->id)
    //   ->where('products_id',$product_id)
    //   ->where('catagory_id',$catagory_id)
    //   ->where("status", "=", 0 )
    //   ->first();
    //
    //
    //
    //   if(isset($status->user_id) and isset($status->products_id) and isset($status->catagory_id)){
    //     // Session::flash('flash_messaged','This item is already in your query-cart!');
    //     return response()->json(['flash_message'=> 'This item is already in your query-list!','status'=>'0']);
    //   //  return redirect()->back();
    //   }
    //   else
    //   {
    //     $date = date("Y-m-d", strtotime($datestring));
    //
    //     $queryadd = querycart::create(['user_id'=>$userid,'catagory_id'=>$catagory_id,'products_id'=>$product_id,'date'=>$date,'mess'=>$mess]);
    //
    //     $addmess = inbox::create(['user_id'=>$userid,'catagory_id'=>$catagoryid,'vendors_id'=>$vendor]);
    //
    //     $querydata = inbox::where('user_id', $userid)->where('is_open',0)->get();
    //     $totalinbox = $querydata->count();
    //     return response()->json(['totalinbox'=>$totalinbox, 'flash_message'=> 'Added to your query-list!','status'=>'1']);
    //   //  Session::flash('flash_message','Added to your query-cart!');
    //   //  return redirect()->back();
    //   }
    // }
    // else
    // {
      // $status = querycart::where('user_id',Auth::user()->id)->where('products_id',$product_id)->where('catagory_id',$catagory_id)->first();
      //
      // if(isset($status->user_id) and isset($status->products_id) and isset($status->catagory_id))
      // {
      // //   Session::flash('flash_messaged','This item is already in your wishlist!');
      // return response()->json(['flash_messages'=> 'This item is alredy added before, adding again !']);
      // //return redirect()->back();
      // }
      // else
      // {
        $date = date("Y-m-d", strtotime($datestring));

        $cartadd = querycart::create(['user_id'=>$userid,'catagory_id'=> $catagory_id,'products_id'=>$product_id,'date'=>$date,'mess'=>$mess]);

        $addmess = inbox::create(['user_id'=>$userid,'catagory_id'=>$catagory_id,'product_id'=>$product_id]);

        $querydata = inbox::where('user_id', $userid)->where('is_open',0)->get();
        $totalinbox = $querydata->count();
        //Session::flash('flash_message','Added to your cart!');
        return response()->json(['totalinbox'=>$totalinbox,'flash_message'=> 'Added to my queries!']);
        //return redirect()->back();
      // }
    // }
  }


}
