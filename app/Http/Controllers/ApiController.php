<?php

namespace App\Http\Controllers;

use App\VdoCategory;
use App\VdoSubCategory;
use App\Video;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getCategories(){

        $category_class = array();
        $video_class = array();

        $categories = VdoCategory::with('vdoSubCategory')->with('video')->get();

        $i = 0;
        foreach($categories as $category){
            $category_class[$i] = [
              "id" =>   $category->id,
              "name" =>   $category->title,
              "imageUrl" =>   'http://youtubeapp.ovie.winexsoft.com/public/'.str_replace("\\","/",$category->image),
            ];

            $i++;
        }

        $videos = Video::with('tags')->get();

        //return $videos;
        $all_tags = array();

        $i = 0;
        foreach($videos as $video){

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach($tags as $tag){
                $all_tags = $all_tags .",". $tag->title;
                $j++;
            }

            $video_class[$i] = [
                "id" => $video->id,
                "title" => $video->title,
                "details" => $video->description,
                "videoUrl" => $video->video_url,
                "youtube_ID" => $video->video_id,
                "thumbnil_image_link" => $video->thumbnail_url,
                "tags" => $all_tags,
                "cat_id" => $video->category_id,
                "sub_cat_id" => $video->sub_category_id,
                "duration" => $video->video_length,
                "author_name" => $video->video_author_name,
                "author_url" => $video->video_author_url,
            ];
            $i++;

        }


        $total = [
            "status_code" => 200,
            "status" => "success",
            "CategoryClass" =>   $category_class,
            "VideoClass" =>   $video_class,
        ];


        return $total;


        //return $categories;
    }

    public function getSubCategories(Request $request){

        //echo $category_id;

        //exit;

        $category_id = $request->cat_id;



        $SubCategoryClass = array();
        $VideoClass = array();
        $VideoClass_forFeature = array();



        $Subcategories = VdoSubCategory::with('video')->where('VdoCategory_id',$category_id)->get();

        $i = 0;
        foreach($Subcategories as $sub_category){


            $videos = $sub_category->video;

            $j = 0;
            $VideoClass = null;
            foreach($videos as $video)
            {

                $VideoTags ="";
                $tags = $video->tags;
                foreach($tags as $tag){
                    $VideoTags = $VideoTags .",". $tag->title;
                }

                $VideoClass[$j] = [
                    "id" => $video->id,
                    "title" => $video->title,
                    "details" => $video->description,
                    "videoUrl" => $video->video_url,
                    "youtube_ID" => $video->video_id,
                    "thumbnil_image_link" => $video->thumbnail_url,
                    "tags" => $VideoTags,
                    "cat_id" => $video->category_id,
                    "sub_cat_id" => $video->sub_category_id,
                    "duration" => $video->video_length,
                    "author_name" => $video->video_author_name,
                    "author_url" => $video->video_author_url,
                ];
                $j++;
            }




            $SubCategoryClass[$i]=[
                "id" => $sub_category->id,
                "name" => $sub_category->title,
                "imageUrl" => 'http://youtubeapp.ovie.winexsoft.com/public/'.str_replace("\\","/",$sub_category->image),
                "VideoClass" => $VideoClass,

            ];

            $i++;
        }



        $VideoClass_forFeature = null;
        foreach($Subcategories as $sub_category){


            $videos = $sub_category->video;

            $j = 0;
            foreach($videos as $video)
            {

                $VideoTags ="";
                $tags = $video->tags;
                foreach($tags as $tag){
                    $VideoTags = $VideoTags .",". $tag->title;
                }

                $VideoClass_forFeature[$j] = [
                    "id" => $video->id,
                    "title" => $video->title,
                    "details" => $video->description,
                    "videoUrl" => $video->video_url,
                    "youtube_ID" => $video->video_id,
                    "thumbnil_image_link" => $video->thumbnail_url,
                    "tags" => $VideoTags,
                    "cat_id" => $video->category_id,
                    "sub_cat_id" => $video->sub_category_id,
                    "duration" => $video->video_length,
                    "author_name" => $video->video_author_name,
                    "author_url" => $video->video_author_url,
                ];
                $j++;
            }

        }
        $final = [
            "status_code" => 200,
            "status" => "success",
            "SubCategoryClass" => $SubCategoryClass,
            "VideoClass" => $VideoClass_forFeature,

        ];


        return $final;


    }

    public function getAllVideos(){
        $video = Video::with('tags')->get();

        return $video;
    }

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
