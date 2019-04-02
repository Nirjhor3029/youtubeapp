<?php

namespace App\Http\Controllers;

use App\Tag;
use App\VdoCategory;
use App\VdoSubCategory;
use App\Video;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public $paginated_number = 10;

    public function getCategories()
    {

        $category_class = array();
        $video_class = array();

        $categories = VdoCategory::with('vdoSubCategory')->with('video')->get();

        $i = 0;
        foreach ($categories as $category) {
            $category_class[$i] = [
                "id" => $category->id,
                "name" => $category->title,
                "imageUrl" => 'http://youtubeapp.ovie.winexsoft.com/public/' . str_replace("\\", "/", $category->image),
            ];

            $i++;
        }

        $videos = Video::with('tags')->get();

        //return $videos;
        $all_tags = array();

        $i = 0;
        foreach ($videos as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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
            "CategoryClass" => $category_class,
            "VideoClass" => $video_class,
        ];


        return $total;


        //return $categories;
    }

    public function getSubCategories(Request $request)
    {

        //echo $category_id;

        //exit;

        $category_id = $request->cat_id;


        $SubCategoryClass = array();
        $VideoClass = array();
        $VideoClass_forFeature = array();


        $Subcategories = VdoSubCategory::with('video')->where('VdoCategory_id', $category_id)->get();

        $i = 0;
        foreach ($Subcategories as $sub_category) {


            $videos = $sub_category->video;

            $j = 0;
            $VideoClass = null;
            foreach ($videos as $video) {
                $VideoTags = "";
                $tags = $video->tags;
                foreach ($tags as $tag) {
                    $VideoTags = $VideoTags . "," . $tag->title;
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
            $SubCategoryClass[$i] = [
                "id" => $sub_category->id,
                "name" => $sub_category->title,
                "imageUrl" => 'http://youtubeapp.ovie.winexsoft.com/public/' . str_replace("\\", "/", $sub_category->image),
                "VideoClass" => $VideoClass,

            ];
            $i++;
        }


        $VideoClass_forFeature = null;
        foreach ($Subcategories as $sub_category) {


            $videos = $sub_category->video;

            $j = 0;
            foreach ($videos as $video) {

                $VideoTags = "";
                $tags = $video->tags;
                foreach ($tags as $tag) {
                    $VideoTags = $VideoTags . "," . $tag->title;
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

    public function getAllVideos()
    {
        $video_class = array();
        $pagination = array();

        $totalVideo = Video::all()->count();

        $maxPage = $totalVideo/$this->paginated_number;
        $maxPage = round($maxPage)+1;
        //return $totalVideo.":".$maxPage;

        for($j=1;$j<=$maxPage;$j++){
            $pagination[$j] =  $j;
        }
        //return $totalVideo;

        $videos = Video::with('tags')->inRandomOrder()->paginate($this->paginated_number);

        $i = 0;
        foreach ($videos as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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
            "pagination" => $maxPage,
            "VideoClass" => $video_class,
        ];

        return $total;
    }

    public function getRelatedVideos(Request $request){


        $video_class = array();

        $video_id = $request->videoId;

        $video = Video::with('tags')->find($video_id);

        $cat_id = $video->category_id;
        $sub_cat_id = $video->sub_category_id;

        $tags = $video->tags;

        //$tag_array = explode(',',$tags);

        foreach($tags as $tag){
            //echo $tag->title;
            $tag_Videos = Tag::with('videos')->where('title',$tag->title)->get();
            $videos = $tag_Videos[0]->videos;


        }

        //print_r($tag_array) ;

        return $videos ;
        exit;

        $cat_video = Video::where('category_id',$cat_id)->inRandomOrder()->paginate(3);
        $sub_cat_video = Video::where('sub_category_id',$sub_cat_id)->inRandomOrder()->paginate(3);


        $i = 0;
        foreach ($cat_video as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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

        foreach ($sub_cat_video as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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
            "VideoClass" => $video_class,
        ];

        return $total;

        //return $cat_id.":".$sub_cat_id.":".$tags;

    }

    public function getSubCatVideos(Request $request)
    {

        $video_class = array();
        $pagination = array();



        $cat_id = $request->cat_id;
        $sub_cat_id = $request->sub_cat_id;

        $totalVideo = Video::where('category_id', $cat_id)->where('sub_category_id', $sub_cat_id)->count();

        $maxPage = $totalVideo/$this->paginated_number;
        $maxPage = round($maxPage)+1;

        $video_class = array();
        //echo $cat_id.$sub_cat_id;

        $videos = Video::where('category_id', $cat_id)->where('sub_category_id', $sub_cat_id)->inRandomOrder()->paginate($this->paginated_number);

        $i = 0;
        foreach ($videos as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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
            "pagination" => $maxPage,
            "VideoClass" => $video_class,
        ];


        return $total;
    }

    public function getVideoAsTag(Request $request)
    {
        $tags = $request->tag;
        //return $tags;
        $videos = Tag::where('title', $tags)->with('videos')->inRandomOrder()->paginate($this->paginated_number);
        //return $videos;

        $videoss = $videos[0]->videos;
        $i = 0;
        foreach ($videoss as $video) {

            $tags = $video->tags;
            $j = 0;
            $all_tags = "";
            foreach ($tags as $tag) {
                $all_tags = $all_tags . "," . $tag->title;
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
            "tag_id" => $videos[0]->id,
            "tag" => $videos[0]->title,

            "VideoClass" => $video_class,
        ];

        return $total;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
