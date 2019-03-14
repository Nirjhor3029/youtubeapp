<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function videos(){
        return $this->belongsToMany('App\Video','tag_videos','tag_id','video_id');
    }
}
