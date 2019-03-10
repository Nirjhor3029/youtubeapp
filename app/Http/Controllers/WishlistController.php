<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wishlist;
use Auth;
use Session;

class WishlistController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = Auth::user();
    $wishlists = wishlist::where("user_id", "=", $user->id)
                  ->with('catagory')
                  ->with('vendor')
                  ->with('product')
                  ->orderby('id', 'desc')
                  ->paginate(10);
    //dd($wishlists);
    return view('user.wishlist', compact('user', 'wishlists'));
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
  * Store a newly created product resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    if(!empty($request->catagory_id) and empty($request->vendor_id)){
    $status=Wishlist::where('user_id',Auth::user()->id)
    ->where('products_id',$request->product_id)
    ->where('catagory_id',$request->catagory_id)
    ->first();

    if(isset($status->user_id) and isset($status->products_id) and isset($status->catagory_id))
    {

      Session::flash('flash_messaged','This item is already in your wishlist!');
      return redirect()->back();
    }
    else
    {
      $wishlist = new Wishlist;

      $wishlist->user_id = $request->user_id;
      $wishlist->catagory_id = $request->catagory_id;
      $wishlist->products_id = $request->product_id;

      $wishlist->save();

      Session::flash('flash_message','Item added to your wishlist.');
      return redirect()->back();
    }
  }else{

    // Service Wishlist
    $status=Wishlist::where('user_id',Auth::user()->id)
    ->where('products_id',$request->product_id)
    ->where('vendors_id',$request->vendor_id)
    ->first();

    if(isset($status->user_id) and isset($status->vendors_id) and isset($status->catagory_id))
    {
      Session::flash('flash_messaged','This item is already in your wishlist!');
      // return redirect()->back()->with('flash_messaged', 'This item is already in your
      // wishlist!');
      return redirect()->back();
    }
    else
    {
      $wishlist = new Wishlist;

      $wishlist->user_id = $request->user_id;
      $wishlist->catagory_id = $request->catagory_id;
      $wishlist->vendors_id = $request->vendor_id;

      $wishlist->save();

      Session::flash('flash_message','Vendor added to your wishlist.');
      return redirect()->back();
    }

  }
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
    //
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $wishlist = Wishlist::findOrFail($id);
    $wishlist->delete();
    return redirect()->route('wishlist.index');
  }
}
