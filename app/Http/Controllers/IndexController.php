<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;
use View;
use Artisan;
use App\Models\phoneQuery;
use App\Models\catagory;
use App\Models\partner;

class IndexController extends Controller
{
    public function index()
    {

        $vendors = catagory::all()->where('status', 1)->where('is_service', '=', 1);
        $services = catagory::all()->where('status', 1)->where('is_service', '=', 0);

        $feed = Feeds::make(['https://ayojok.com/ideas-and-stories/feed'], 6, true); // if RSS Feed has invalid mime types, force to read
        $articles = $feed->get_items();

        $datas = array(
            'items' => $feed->get_items(),
        );
        //dd($link,$sentence,$urls[0]);
        //dd($datas);
        return View::make('index', $datas)->with('vendors', $vendors)->with('services', $services);
    }

    public function onlyphn(Request $r)
    {
        $phn = new phoneQuery();
        $phn->phone = $r->number;
        $phn->vendor_id = 0;
        $phn->products_id = 0;
        $phn->is_followup = 0;

        $phn->save();
        return response()->json(['success' => 'Thank you for leaving your number we will call you soon']);
    }

    // public function savePhone(Request $r){
    //   $data = new phoneQuery;
    //   $data->phone = $r->phone;
    //   if(isset($r->vendor_id)){
    //   $data->vendor_id = $r->vendor_id;
    //   }else{
    //   $data->vendor_id = 0;
    //   }
    //   if(isset($r->products_id)){
    //     $data->products_id = $r->products_id;
    //   }else{
    //     $data->products_id = 0;
    //   }
    //   $data->save();
    //   return redirect()->back()->with('success', 'Thank You.. Ayojok team will call you very soon');
    // }

    public function open(Request $r)
    {
        $catid = $r->input('catagory');
        $cat = catagory::find($catid);
        $catname = $cat->name;
        //dd($cat);
        if (is_null($cat->layout)) {
            return redirect()->route('CatProducts', ['catagory' => $catname]);
        } else {
            return redirect()->route('Vendors', ['catagory' => $catname]);
        }
    }

    public function savePartner(Request $r)
    {
        $pdata = new partner;
        $pdata->name = $r->your_name;
        $pdata->company = $r->company_name;
        $pdata->business_type = $r->business_type;
        $pdata->contact_addres = $r->contact_address;
        $pdata->office_address = $r->office_address;
        $pdata->email = $r->your_email;
        $pdata->phone = $r->phone;
        $pdata->experience = $r->your_experience;
        $pdata->mess = $r->mess;
        $pdata->save();

        return redirect()->back()->with('success', 'Thank you for the information.. Ayojok team will call you very soon');
    }
}
