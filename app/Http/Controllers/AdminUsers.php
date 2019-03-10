<?php

namespace App\Http\Controllers;

use App\Admin;
use App\VdoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminUsers extends Controller
{



    public function showPage(){
        $admin_users = Admin::all();
        return view('admin.admin_users')->with('admin_users',$admin_users);
    }

    public function addNewUser(){
        return view('admin.add_adminUser');
    }

    public function addNewUserSubmit(Request $request){

        $user = new Admin();

        $user->name = $request->name;
        $user->job_title = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        return Redirect::to('admin/users');

    }

    public function showVideoCategories(){
        $vdo_categories = VdoCategory::all();
        return view('admin.vdo_categories')->with('vdo_categories',$vdo_categories);
    }












    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
