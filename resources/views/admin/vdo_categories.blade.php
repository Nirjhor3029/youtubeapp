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
<style>

</style>
@endpush

@section('content')
    <div class="content-wrapper">



        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Vendor
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-primary">
                    <div class="box-body" style="margin-top:2rem;">
                        <form action="{{route('vendors.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="col-md-6" style="margin-bottom:2rem;">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="vendor_name" class="control-label col-md-3">Vendor Name: <span style="color:red;">*</span> </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="vendor_name" placeholder="Enter name" name="vendor_title" required>
                                    </div>
                                </div>

                                <input type="file">




                                <hr>

                            </div>

                            <div class="col-md-6">



                                <div class="form-group">
                                    <div class="control-label col-lg-2">
                                        <label class="" for="profile_image">Profile Image:</label>
                                        <p>Max (600x600)</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="file" name="profile_image" id="profile_image" accept="image/*" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="profile_image">Profile Image Preview</label>
                                        <div id="profile-preview"></div>
                                    </div>
                                </div>



                            </div>
                            <div>
                                <button class="btn btn-primary pull-right" type="submit" >Upload vendor</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>



        </section><!-- /.content -->


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
                            <a href="{{route('addNewUser')}}" class="btn btn-primary">Add New</a>
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
                                    <td>{{$v_vdo_category->image}}</td>

                                    <td>
                                        delete [not done]
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


