<?php
/**
 * Created by PhpStorm.
 * User: Sohel Rana
 * Date: 3/31/2019
 * Time: 4:37 AM
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
                User Log
            </h1>
        </section>

        <section class="maincontent">
            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-danger">

                    <div class="box-body table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Action</th>


                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin_users as $v_admin_user)
                                <tr>
                                    <td>{{$v_admin_user->id}}</td>
                                    <td>{{$v_admin_user->user_name}}</td>
                                    <td>{{$v_admin_user->Action}}</td>

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

