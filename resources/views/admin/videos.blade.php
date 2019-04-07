<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 3/17/2019
 * Time: 12:25 AM
 */

?>


@extends('layouts.admin')

@push('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>

    img {
        width: 50px;
        height: 60px;
    }
</style>
@endpush

@section('content')
    <div class="content-wrapper">


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Videos
            </h1>
        </section>

        <section class="maincontent">
            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-danger">

                    <div class="box-body table-responsive">
                        <table id="table" class="table table-bordered">
                            <a href="{{route('addVideo')}}" class="btn btn-primary">Add New Video</a>
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>

                                <th>Video Info</th>
                                <th>Category + Tag Info</th>
                                <th>Video Author Info</th>


                                <th>description</th>

                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            ?>
                            @foreach($videos as $video)
                                <?php
                                $i++;
                                ?>
                                <tr>
                                    <td>{{$i."."}}</td>
                                    <td>{{$video->id}}</td>

                                    <td>
                                        @if(preg_match("/img/", $video->thumbnail_url) == 1)
                                            <a href="{{asset($video->thumbnail_url)}}" target="_blank"><img  src="{{asset($video->thumbnail_url)}}" style="height: 60px;width: 80px"></a>
                                        @else
                                            <a href="{{$video->thumbnail_url}}" target="_blank"><img src="{{$video->thumbnail_url}}" style="height: 100px;width: 160px"></a>
                                        @endif

                                        <br>
                                        <strong>Video Title:</strong> {{$video->title}}


                                    </td>
                                    <td>
                                        <strong>Category: </strong> {{$video->sub_category_id}}
                                        <br>
                                        <?php
                                        $tags = "";
                                        foreach ($video->tags as $tag) {
                                            $tags = $tags . "," . $tag->title;
                                        }
                                        ?>

                                        <strong>Sub-Category: </strong> {{$tags}}
                                        <br>
                                        <strong>Tags: </strong> {{$tags}}
                                    </td>


                                    <td>
                                        <strong>Author: </strong> <a href="{{$video->video_author_url}}">{{$video->video_author_name}}</a>

                                        <br>
                                        <strong>Video Id:</strong> <a
                                                href="{{$video->video_url}}">{{$video->video_id}}</a>

                                        <br>
                                        <strong>Video Length:</strong> {{$video->video_length}}
                                    </td>
                                    <td>
                                        {{--<iframe width="280" height="157"
                                                src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>--}}
                                        <br>
                                        {{$video->description}}
                                    </td>


                                    <td colspan="2">
                                        {{--<i class="material-icons" style="font-size:36px">delete</i>--}}
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="{{route('deleteVideo',$video->id)}}"><i class="fa fa-remove"
                                                                                                 style="font-size:30px;color:red"></i></a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="{{route('editVideo',$video->id)}}"><i class="fa fa-edit"
                                                                                               style="font-size:30px;color:green"></i></a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

        </section>
    </div>

@endsection

@push('scripts')


<script>

</script>
@endpush
