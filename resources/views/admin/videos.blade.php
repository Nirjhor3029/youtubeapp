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

    img{
        width: 100px;
        height: 100px;
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
                                <th> ID</th>
                                <th>Video Id</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Video Url</th>
                                <th>Video Author Url</th>
                                <th>Video Author Name</th>
                                <th>Title</th>
                                <th>description</th>
                                <th>Thumbnail Url</th>
                                <th>Video Length</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{$video->id}}</td>
                                    <td>{{$video->video_id}}</td>
                                    <td>{{$video->category_id}}</td>
                                    <td>{{$video->sub_category_id}}</td>
                                    <td>{{$video->video_url}}</td>
                                    <td>{{$video->video_author_url}}</td>
                                    <td>{{$video->video_author_name}}</td>
                                    <td>{{$video->title}}</td>
                                    <td>{{$video->description}}</td>
                                    <td>{{$video->thumbnail_url}}</td>
                                    <td>{{$video->video_length}}</td>

                                    <td>
                                        {{--<i class="material-icons" style="font-size:36px">delete</i>--}}
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="{{route('deleteVideo',$video->id)}}"><i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="{{route('editVideo',$video->id)}}"><i class="fa fa-edit" style="font-size:30px;color:green"></i></a>
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
