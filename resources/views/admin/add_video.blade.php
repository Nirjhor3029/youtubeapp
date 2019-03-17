<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 3/17/2019
 * Time: 12:37 AM
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Video
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">
                <div class="box box-primary">
                    <div class="box-body" style="margin-top:2rem;">
                        <form action="{{route('getVideoInfo')}}" method="post" class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label for="vendor_name" class="control-label">Video Url: <span
                                                style="color:red;">*</span> </label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Enter Youtube Video Url"
                                           name="video_url" required>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-success pull-right" type="submit">Get Video Info</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                @if(isset($videoInfo))

                    <div class="col-md-12" style="margin-top:2rem;">
                        <div class="box box-primary">
                            <div class="box-body" style="margin-top:2rem;">
                                <form action="{{route('addVideoSubmit')}}" method="post" class="form-horizontal"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Video ID: <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="vendor_name"
                                                   placeholder="Enter Title" name="video_id" value="{{$videoId}}"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Categoryt<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category" required>
                                                <option value="{{null}}">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Sub Categoryt<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="sub_category" required>
                                                <option value="{{null}}">Select Sub Category</option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}( {{$sub_category->vdoCategory->title}} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Tags<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <select class=" js-example-basic-multiple form-control" name="tags[]"
                                                    multiple="multiple" required>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Video Url: <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Video Url"
                                                   name="video_url" value="{{$videoUrl}}" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Author Url: <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Author Url"
                                                   name="author_url" value="{{$videoInfo->author_url}}" required>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Author Name: <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Author Name"
                                                   name="author_name" value="{{$videoInfo->author_name}}" required>
                                        </div>
                                    </div>


                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Title <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Title"
                                                   name="title" value="{{$videoInfo->title}}" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Description <span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">

                                            <textarea class="form-control" name="description"
                                                      placeholder="Enter Video Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Thumbnail url<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Descripton"
                                                   name="thumbnail_url" value="{{$videoInfo->thumbnail_url}}" required>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Thumbnail View<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <img src="{{$videoInfo->thumbnail_url}}">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="vendor_name" class="control-label">Video Length<span
                                                        style="color:red;">*</span> </label>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Enter Descripton"
                                                   name="video_length" value="" required>
                                        </div>
                                    </div>


                                    <div>
                                        <button class="btn btn-primary pull-right" type="submit">Upload Video Info
                                        </button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
            </div>

            @endif


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>

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
