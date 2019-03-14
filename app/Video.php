<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    public function tags(){
        return $this->belongsToMany('App\Tag','tag_videos','video_id','tag_id');
    }
}
