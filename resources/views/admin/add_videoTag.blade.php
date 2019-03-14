<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/13/2019
 * Time: 10:52 AM
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
                Add New Tag
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-primary">
                    <div class="box-body" style="margin-top:2rem;">
                        @if(!isset($vdo_category))
                            <form action="{{route('addTagSubmit')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Tag Title: <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vendor_name"
                                               placeholder="Enter Title"
                                               name="vendor_title" required>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary pull-right" type="submit">Upload Tag</button>
                                </div>
                            </form>
                        @else
                            <form action="{{route('editTagSubmit',$vdo_category->id)}}" method="post"
                                  class="form-horizontal"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                        <label for="vendor_name" class="control-label">Tag Title: <span
                                                    style="color:red;">*</span> </label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="vendor_name"
                                               placeholder="Enter Title"
                                               name="vendor_title" required value="{{$vdo_category->title}}">
                                    </div>
                                </div>


                                <div>
                                    <button class="btn btn-success pull-right" type="submit">Update Tags</button>
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
