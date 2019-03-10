<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checklist;
use Auth;

class ChecklistController extends Controller
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

  public function show(Request $r,$id){
    $datas = checklist::where('user_id',$id)->get();

    return view('user.my-checklist',compact('datas'));
  }

  public function addNew(Request $r){
    $add =  new checklist;
    $add->user_id = Auth::user()->id;
    $add->section = $r->section;
    $add->details = $r->details;
    $add->save();

    return redirect()->back();
  }

  public function deleteChecklist($id){
    $add =  checklist::find($id);
    $add->delete();

    return redirect()->back();
  }

  public function checkChecklist(Request $r){
    echo $status = $r->status;
    $add =  checklist::find($r->id)->update(['status'=> $r->status]);
    echo "Updated";
  }
}
