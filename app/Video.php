<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    public function tags(){
        return $this->belongsToMany('App\Tag','tag_videos','video_id','tag_id');
    }

    public function videoCategory(){
        return $this->belongsToMany(VdoCategory::class);
    }

    public function videoSubCategory(){
        return $this->belongsToMany(VdoSubCategory::class);
    }
}
