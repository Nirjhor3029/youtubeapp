<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class VideoController extends Controller
{


    /*Video Basic Crud*/
    public function videos()
    {
        $vdo_categories = Tag::all();
        return view('admin.vdo_tags')->with('vdo_categories', $vdo_categories);
    }

    public function addVideo()
    {

        return view('admin.add_videoTag');
    }

    public function addVideoSubmit(Request $request)
    {
        //return $request;


        $vdo_category = new Tag();
        $vdo_category->title = $request->vendor_title;
        $vdo_category->save();

        return Redirect::to('admin/tags');

    }

    public function deleteVideo($id)
    {
        $vdo_category = Tag::find($id);
        //exit;
        $vdo_category->delete();
        return Redirect::back();
    }

    public function editVideo($id)
    {


        $vdo_category = Tag::find($id);
        //$vdo_category->delete();
        return view('admin.add_videoTag')->with('vdo_category', $vdo_category);

    }

    public function editVideoSubmit(Request $request, $id)
    {
        //echo $id;
        $vdo_category = Tag::find($id);

        $vdo_category->title = $request->vendor_title;

        $vdo_category->save();

        return Redirect::to('admin/tags');
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
