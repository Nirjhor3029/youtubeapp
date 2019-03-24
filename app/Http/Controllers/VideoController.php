<?php

namespace App\Http\Controllers;

use App\Tag;
use App\TagVideo;
use App\VdoCategory;
use App\VdoSubCategory;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{


    /*Video Basic Crud*/
    public function videos()
    {
        $videos = Video::all();
        return view('admin.videos')->with('videos',$videos);
    }


    public function addVideo()
    {

        return view('admin.add_video');
    }

    public function getVideoInfo(Request $request){

        $videoUrl = $request->video_url;

        //echo $videoUrl;
        $videoId = explode('=',$videoUrl);
        $videoId = $videoId[1];
        //print_r($videoId);

        //exit;


        $str = file_get_contents('https://www.youtube.com/oembed?url='.$videoUrl.'&format=json');

        //return $str;
        $videoInfo = \GuzzleHttp\json_decode($str);

        $tags = Tag::all();
        $categories = VdoCategory::all();
        $sub_categories = VdoSubCategory::all();

        return view('admin.add_video')
            ->with('videoId',$videoId)
            ->with('videoUrl',$videoUrl)
            ->with('videoInfo',$videoInfo)
            ->with('categories',$categories)
            ->with('sub_categories',$sub_categories)
            ->with('tags',$tags);

        //print_r($str) ;
        //$thumbnail_url = $str->$thumbnail_url;
        //$author_url = $str->author_url;
        //return $str->thumbnail_width;

    }

    public function addVideoSubmit(Request $request)
    {
        //return $request;

        $video = new Video();

        $video->video_id = $request->video_id;
        $video->category_id = $request->category;
        $video->sub_category_id = $request->sub_category;
        $video->video_url = $request->video_url;
        $video->video_author_url  = $request->author_url;
        $video->video_author_name  = $request->author_name;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->thumbnail_url = $request->thumbnail_url;
        $video->video_length = $request->video_length;
        $video->save();

        foreach($request->tags as $tag){

            $tag_video = new TagVideo();
            $tag_video->video_id = $video->id;
            $tag_video->tag_id = $tag;

            $tag_video->save();

        }



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
