<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 3/9/2019
 * Time: 9:29 AM
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
                Add New User
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-primary">
                    <div class="box-body" style="margin-top:2rem;">
                        <form action="{{route('addNewUserSubmit')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="col-md-6" style="margin-bottom:2rem;">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="vendor_name" class="control-label col-md-3">Admin User Name: <span style="color:red;">*</span> </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="" placeholder="Enter name" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="vendor_catagory">Role: <span style="color:red;">*</span></label>
                                    <div class="col-md-9">
                                        <select style="padding: 5px;" class="form-control" id="" name="role" required>
                                            <option value="">-- Select any type --</option>
                                                <option value="admin" style="text-transform:capitalize;">admin</option>
                                                <option value="editor" style="text-transform:capitalize;">editor</option>
                                        </select>
                                    </div>
                                </div>


                                <hr>

                                <div class="form-group">
                                    <label for="email" class="control-label col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" id="" placeholder="Enter email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="" placeholder="Enter Password" name="password">
                                    </div>
                                </div>

                                {{--<input type="file">--}}
                            </div>

                            <div class="col-md-6" >
                                <div style="margin-top: 20%">
                                    <button class="btn btn-primary " type="submit" >Add User</button>
                                </div>

                            </div>

                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>



        </section><!-- /.content -->
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
@endpush
