<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alaouy\Youtube\Youtube;
use Mail;


use App\Models\catagory;
use App\Models\vendors;

use App\Models\vendor_features;
use App\Models\packages;
use App\Models\querycart;
use App\Models\tempquery;
use App\Models\vendor_image;
use App\Models\inbox;
use App\Models\rating;

use Session;

class VendorServices extends Controller
{

    public function Services($catagory, Request $request)
    {

        $catagorydata = catagory::where('name', $catagory)->first();
        //dd($catagorydatas);
        //$catagoryid = $catagorydata->id;
        //dd($catagorydata);

        $model = '\App\Models\\' . $catagorydata->feature_table;
        //dd($model);

        $datas = new $model;
        //dd($datas);


        if (request()->ajax()) {
            $view = 'extra.product-list';
            switch ($request->cat) {
                case (9):
                    include(app_path() . '/filter-function/venue-filter.php');
                    break;
                case (10):
                    include(app_path() . '/filter-function/dj-filter.php');
                    break;
                case (11):
                    include(app_path() . '/filter-function/catering-filter.php');
                    break;
                case (18):
                    include(app_path() . '/filter-function/kazi-filter.php');
                    break;
                case (14):
                    include(app_path() . '/filter-function/invitation-filter.php');
                    break;
                case (16):
                    include(app_path() . '/filter-function/bakeries-filter.php');
                    break;
                case (17):
                    include(app_path() . '/filter-function/mehedi-filter.php');
                    break;
                case (12):
                    include(app_path() . '/filter-function/photo-filter.php');
                    break;
                case (13):
                    include(app_path() . '/filter-function/decor-filter.php');
                    break;
                case (15):
                    include(app_path() . '/filter-function/makeup-filter.php');
                    break;
            }

        } else {
            if ($catagorydata->is_service == '1') {
                $view = 'pages.services';
                // $datas = vendors::where('catagory_id',$catagoryid)->inRandomOrder()->paginate(16);
                $datas = $datas->where('status', 0)->inRandomOrder()->with('vendor')->get();                                                            /**random **/
                //$datas = $datas->where('status', 0)->with('vendor')->get();                                                            /** Ascending **/
                //dd($datas);
                //return view('pages.services',compact('datas','catagorydata'));
            }
        }

        return view($view, compact('datas', 'catagorydata'));
    }

    public function vendor($catagory, $vendor)
    {

        $catagorydata = catagory::where('name', $catagory)->firstorFail();
        $catagoryid = $catagorydata->id;
        $catagorylayout = $catagorydata->layout;
        $catagorytype = $catagorydata->is_service;


        if ($catagorytype == '1') {

            $datas = vendors::where('id', $vendor)->with('packages')->with('images')->first();
            $ratings = rating::where('vendor_id', $vendor);
            //$reviews = rating::where('vendor_id', $vendor)->with('user')->orderBy('id', 'DESC')->limit(6)->get();
            $reviews = rating::where('vendor_id', 10)->with('user')->orderBy('id', 'DESC')->limit(6)->get();

            $model = 'App\Models\\' . $catagorydata->feature_table;

            $fdetails = $model::where('vendor_id', $vendor)->first();
            //dd($fdetails);

            $features = vendor_features::where('catagory_id', $catagoryid)->first();

            $array['total'] = $ratings->count();
            $array['avgtotal'] = (float)$ratings->avg('rating');

            for ($a = 1; $a <= 5; $a++) {
                $rating = rating::where('vendor_id', $vendor)->where('rating', $a)->count();
                if ($rating > 0) {
                    $array['rate' . $a] = intval($rating / $ratings->count() * 100);
                } else {
                    $array['rate' . $a] = 0;
                }
            }

            $opinion = (object)$array;
            //dd($reviews);

            switch ($catagorylayout) {
                case '1':
                    return view('pages.layout1', compact('datas', 'catagorydata', 'features', 'fdetails', 'ratings', 'opinion', 'reviews'));
                    break;
                case '2':
                    return view('pages.layout2', compact('datas', 'catagorydata', 'features', 'fdetails', 'ratings', 'opinion', 'reviews'));
                    break;
                case '3':
                    //dd($features);
                    return view('pages.layout3', compact('datas', 'catagorydata', 'features', 'fdetails', 'ratings', 'opinion', 'reviews'));
                    break;
                case '4':
                    return view('pages.layout4', compact('datas', 'catagorydata', 'features', 'fdetails', 'ratings', 'opinion', 'reviews'));
                    break;
            }

        }
    }

    public function rating(Request $r)
    {
        // dd($r->all());
        $validatedData = $r->validate([
            'vendor_id' => 'required',
            'rating' => 'required|numeric',
        ]);

        $rating = new rating;
        $rating->vendor_id = $r->vendor_id;
        $rating->user_id = Auth::user()->id;
        $rating->rating = $r->rating;
        $rating->comment = $r->comment;
        $rating->save();

        return redirect()->back();
    }

    public function vendorQuery(Request $request)
    {
        $this->validate($request, ['date' => 'required','num' => 'required']);

        $userid = Auth::user()->id;
        $catagory = $request->input('catagory');
        $vendor = $request->input('vendor');
        $datestring = $request->input('date');
        $mess = $request->input('mess');
        $num = $request->input('num');

        /*code for contact number*/
        $user = User::find(Auth::user()->id);

        if(!isset($user->contact)){
            $user->contact = $num;
            $user->save();
        }
        /*End of code for contact number*/


        // dd($catagory);
        // $input = request()->all();
        $catagorydata = catagory::where('name', $catagory)->firstorFail();
        $catagoryid = $catagorydata->id;
        $date = date("Y-m-d", strtotime($datestring));

        // $checkvendor = querycart::where('user_id','=',$userid)->where('vendors_id','=',$vendor)->first();
        // if (empty($checkvendor)) {
        $queryadd = querycart::create(['user_id' => $userid, 'catagory_id' => $catagoryid, 'vendors_id' => $vendor, 'date' => $date, 'mess' => $mess, 'phn' => $num]);
        $queryid = $queryadd->id;
        $addmess = inbox::create(['user_id' => $userid, 'catagory_id' => $catagoryid, 'vendors_id' => $vendor, 'query_id' => $queryid]);

        $querydata = inbox::where('user_id', $userid)->where('is_open', 0)->get();
        $totalinbox = $querydata->count();

        // Send mail
        //redirect()->route('query-send',['id'=>$userid, 'item'=>$vendor]);

        // $datas = querycart::where("user_id","=",$userid)
        //                   ->where("vendors_id","=",$vendor)
        //                   ->where("is_available","=",0)
        //                   ->with('vendors')
        //                   ->with('catagory')
        //                   ->with('user')
        //                   ->get();
        //$querys = array($datas);
        //dd($querys);

        //Active when on live server
        // Mail::send('emails.query', array('querys'=>$datas), function($mess) use ($datas){
        //   $mess->from('booking@ayojok.com','Ayojok.com');
        //   $mess->to(Auth::user()->email,Auth::user()->name);
        //   $mess->subject("Ayojok | Query");
        // });
        return response()->json(['totalinbox' => $totalinbox, 'flash_message' => 'Your query is added to my queries']);
        // }else{
        //   return response()->json(['flash_messages'=>'You already added this in your query list']);
        // }


    }


    /*all vendors*/
    public function all_vendors()
    {
        $view = view('layouts.app');
        $sub_view = view('pages.all_vendors');
        return $view->with('content', $sub_view);
    }




}



