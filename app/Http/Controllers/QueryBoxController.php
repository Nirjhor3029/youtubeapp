<?php

namespace App\Http\Controllers;

use App\Models\inbox;
use App\Models\inboxchat;
use App\User;
use Illuminate\Http\Request;

class QueryBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

        //echo $id;

        $datas = inbox::where('user_id',$id)->orderBy('created_at','desc')->with('product')->with('catagory')->with('vendors')->get();

        $user = User::where('id',$id)->first();
        //dd($datas);
        //return view('admin.query_box');
        return view('admin.query_box',compact('datas','user'));

    }


    public function singleMessage($id){

        //echo "hello".$id;
        //exit;

        $datas = inbox::where('id',"=",$id)->with('catagory')->with('product')->with('vendors')->with('querys')->get();
        $open = inbox::where('id',"=",$id)->update(['is_open' => 1 ]);

        $chat = inboxchat::where('inbox_id',"=",$id)->orderBy('created_at','asc')->get();

        //return $chat;
        //dd($datas);
        return view('extra.querymsg',compact('datas','chat'));
    }



    /*
 * Nir Edit for user inbox
 * */
    /*http://127.0.0.1:8000/inbox => send message*/
    public function sendMessage(Request $request){

        $msg = $request->user_message;
        $inbox_id = $request->queryid;

        //echo "msg: " . $msg ."<br> inbox_id : ".$inbox_id;
        //dd($request);

        $chat = new inboxchat();
        $chat->inbox_id = $inbox_id;
        $chat->msg = $msg;
        $chat->msg_type = 1;

        $chat->save();

        /*for load message */
        $id = $inbox_id;

        //echo "hello".$id;
        //exit;

        $datas = inbox::where('id',"=",$id)->with('catagory')->with('product')->with('vendors')->with('querys')->get();
        $open = inbox::where('id',"=",$id)->update(['is_open' => 1 ]);

        $chat = inboxchat::where('inbox_id',"=",$id)->orderBy('created_at','asc')->get();

        //return $datas;
        //dd($datas);
        return view('extra.querymsg',compact('datas','chat'));


        //return redirect()->back()->withErrors([$inbox_id, $inbox_id]);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
