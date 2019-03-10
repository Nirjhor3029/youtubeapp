<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2/20/2019
 * Time: 3:08 PM
 */

?>

@extends('layouts.admin')

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Vendors Categories
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-primary">
                    <div class="box-body ">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="list-group">
                                    <?php $i = 0; $total = 0;?>
                                    @foreach ($datas as $data)

                                        <div class="row">
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-10">
                                                <a href="{{route('vendor.categories',[$data->id])}}" class="list-group-item list-group-item-action " style="margin-top: 3px">
                                                    <div class="row">
                                                        <div class="col-sm-10">{{$data->name}}</div>
                                                        <div class="col-sm-1">
                                                            <span class="badge badge-success badge-pill">{{$badges[$i]}}</span>
                                                        </div>
                                                        <div class="col-sm-1">
                                                            <span class="glyphicon glyphicon-forward"></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <?php $total = $total + $badges[$i];  $i++; ?>
                                    @endforeach


                                </div>
                            </div>
                            <div class="col-sm-4" style="margin-top: 10%;font-size: 30px">
                                <div class="col-sm-4">
                                    Total: <span class="badge badge-success badge-pill" style="font-size: 25px"> {{$total}}</span>
                                </div>
                            </div>
                        </div>




                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>



        </section><!-- /.content -->
    </div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })

    function deleteAlert(){
        //alert("alert");
        var x = confirm("Are you sure you want to delete this data ? ");
        return x;
    }
</script>
@endpush

