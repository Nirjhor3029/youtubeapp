<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
use Auth;
use Session;
use validator;

class AddressController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = Auth::user();
      $addresses = Address::where('user_id', $user->id)->with('user')->get();
      //dd($addresses);
      return view('address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      $addresses = Address::where('user_id', $user->id)->with('user')->get();
      //dd($addresses);
      return view('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      Address::create($request->all());
      return redirect()->route('address.index')->with('success', 'Address added sucessfully !');
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
      $address = address::find($id);
      return view('address.edit',compact('address'));
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
      $address = address::find($id);
      $address -> fname = request('fname');
      $address -> lname = request('lname');
      $address -> company = request('company');
      $address -> line1 = request('line1');
      $address -> line2 = request('line1');
      $address -> city = request('city');
      $address -> contact = request('contact');
      $address -> extraInfo = request('extraInfo');
      $address -> addressName = request('addressName');
      $address->update();
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
        Address::find($id)->delete();
        return redirect()->route('address.index')->with('sucess','Address Deleted Sucessfully');
    }
}
