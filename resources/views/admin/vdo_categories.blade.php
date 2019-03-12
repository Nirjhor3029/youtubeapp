<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 3/9/2019
 * Time: 12:57 PM
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
                Categories
            </h1>
        </section>

        <section class="maincontent">
            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-danger">

                    <div class="box-body table-responsive">
                        <table id="table" class="table table-bordered">
                            <a href="{{route('addNewCategory')}}" class="btn btn-primary">Add New</a>
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th>Title</th>
                                <th>Image</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vdo_categories as $v_vdo_category)
                                <tr>
                                    <td>{{$v_vdo_category->id}}</td>
                                    <td>{{$v_vdo_category->title}}</td>
                                    <td>
                                    {{--{{$v_vdo_category->image}}--}}
                                        <a href="{{asset($v_vdo_category->image)}}"><img src="{{asset($v_vdo_category->image)}}"></a>
                                    </td>

                                    <td>
                                        {{--<i class="material-icons" style="font-size:36px">delete</i>--}}
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <a href="{{route('deleteVideoCategory',$v_vdo_category->id)}}"><i class="fa fa-remove" style="font-size:30px;color:red"></i></a>
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="{{route('editVideoCategory',$v_vdo_category->id)}}"><i class="fa fa-edit" style="font-size:30px;color:green"></i></a>
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


