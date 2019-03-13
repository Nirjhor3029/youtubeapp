<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/12/2019
 * Time: 6:58 PM
 */
?>

@extends('layouts.admin')

@push('css')
<style>
    img {
        width: 300px;
        height: 200px;
    }
</style>
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Sub Category
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-primary">
                    <div class="box-body" style="margin-top:2rem;">
                        @if(!isset($vdo_category))
                            <form action="{{route('addSubCategorySubmit')}}" method="post" class="form-horizontal"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Sub Category Title: <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vendor_name"
                                               placeholder="Enter Title"
                                               name="vendor_title" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Category : <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">

                                        <select class="form-control" name="category_id" required>
                                            <option value="0">Select Category</option>
                                            @foreach($vdo_categories as $v_category)
                                                <option value="{{$v_category->id}}">{{$v_category->title}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="control-label col-sm-2">
                                        <label class="" for="profile_image">Sub Category Image:</label>

                                        <p>Max (600x600)</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="profile_image"> Image Preview</label>

                                        <div id="profile-preview"></div>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-primary pull-right" type="submit">Upload Sub Category</button>
                                </div>
                            </form>
                        @else
                            <form action="{{route('editVideoSubCategorySubmit',$vdo_category->id)}}" method="post"
                                  class="form-horizontal"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Sub Category Title: <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vendor_name"
                                               placeholder="Enter Title"
                                               name="vendor_title" required value="{{$vdo_category->title}}">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Category : <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">

                                        <select class="form-control" name="category_id" required>
                                            <option value="0">Select Category</option>
                                            @foreach($vdo_categories as $v_category)
                                                <option value="{{$v_category->id}}">{{$v_category->title}}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="control-label col-sm-2">
                                        <label class="" for="profile_image">Category Image:</label>

                                        <p>Max (600x600)</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                               class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="profile_image"> Image Preview</label>

                                        <div id="profile-preview"></div>
                                        <img src="{{asset($vdo_category->image)}}" id="previous_image">
                                    </div>
                                </div>


                                <div>
                                    <button class="btn btn-success pull-right" type="submit">Update Sub Category</button>
                                </div>
                            </form>

                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('#table').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,

        })
    })
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    function previewprofileImage() {
        var $preview = $('#profile-preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            }
            var reader = new FileReader();

            $(reader).on("load", function () {
                $preview.append($("<img/>", {src: this.result}));
            });

            reader.readAsDataURL(file);

            $('#previous_image').hide();

        }
    }


    $('#profile_image').on("change", previewprofileImage);


    $('#menu_type_select,#event_type_select,#speciality_select,#bakery_speciality_select,#venue_area_select,#home_service_select').select2();


</script>


@endpush
