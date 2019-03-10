<?php

$pattern = "/.com/";
$server_name = $_SERVER['SERVER_NAME'];
//echo "Server Name:".$server_name;

$path = public_path();

if (preg_match($pattern, $server_name)) {

    $url_prefix = "";
} else {
    $url_prefix = "";
}
//echo "<br> $path";



?>

@extends('layouts.app')
        <!-- Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
@push('css')

@endpush

@section('content')
        <!-- Masthead -->
<header class="pagehead" style="background-image: url('{{asset('img/backgrounds/bg-footer.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto text-center text-white">
                <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt="">
            </div>
        </div>
    </div>
</header>
<!-- FB Profile Style -->

<!-- Blank section -->

<section class="page-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{route('mainhome')}}">Home</a></li>
                    <li><a href="{{route('my-account')}}">My Account</a></li>
                    <li class="active"> Order List</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="page-section mb-4">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="wow fadeIn">
                    <h3><i class="fa fa-map-marker fa-lg" style="margin-right:1rem;"></i> Order List</h3>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="my-account">
                    <p>Product Order List</p>
                </div>

                <div class="row">
                    <table id="order-list" class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            {{-- <th>Order ID</th> --}}
                            <th>Product</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $data)
                            @if(isset($data->product))
                                <tr>
                                    <td>{{$data->order_date}}</td>
                                    <td>{{$data->product->title}}</td>
                                    <td>
                                        <a href="{{url('/services/'.$data->product->catagory->name.'/'.$data->product->id)}}"
                                           target="_blank"><img src="{{asset($url_prefix.$data->product->image)}}"
                                                                style="height: 60px;width: 100px"></a></td>

                                    {{-- <td>#00{{$data->order_set}}{{$data->user_id}}</td> --}}

                                    <td>{{$data->product->price}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>
                                        @if ($data->payment_type == 1)
                                            Cash On Delivery
                                        @elseif($data->payment_type == 2)
                                            Bkash
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->is_paid == 0)
                                            Not Paid
                                        @elseif($data->is_paid == 1)
                                            Paid
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->is_delivered == 0)
                                            Not Delivered
                                        @elseif($data->is_delivered == 1)
                                            Delivered
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


        <div class="row mt-6">
            <div class="col-lg-12">
                <div class="my-account">
                    <p>Vendor Order List</p>
                </div>

                <div class="row">
                    <table id="order-list2" class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Date</th>
                            {{-- <th>Order ID</th> --}}
                            <th>Categories</th>
                            <th>Vendors</th>
                            <th>photo</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($datas as $data)
                            @if(isset($data->vendor))
                                <tr>
                                    <td>{{$data->order_date}}</td>
                                    <td>{{$data->vendor->catagory->name}}</td>
                                    <td>{{$data->vendor->title}}</td>
                                    <td>
                                        <a href="{{url('/vendors/'.$data->vendor->catagory->name.'/'.$data->vendor->id)}}"><img
                                                    src="{{asset($url_prefix.$data->vendor->profile_img)}}"
                                                    style="height: 60px;width: 100px"></a></td>
                                    <td>
                                        <?php
                                        if (isset($data->vendor->startingat_1_title)) {

                                            $title = $data->vendor->startingat_1_title;
                                            $price = $data->vendor->startingat_1_price;

                                        } elseif (isset($data->vendor->startingat_2_title)) {

                                            $title = $data->vendor->startingat_2_title;
                                            $price = $data->vendor->startingat_2_price;

                                        } else {

                                            $title = $data->vendor->startingat_3_title;
                                            $price = $data->vendor->startingat_3_price;

                                        }
                                        ?>
                                        {{$price}} Tk ({{$title}})
                                    </td>
                                    <td>{{$data->quantity}}</td>
                                    <td>
                                        @if ($data->payment_type == 1)
                                            Cash On Delivery
                                        @elseif($data->payment_type == 2)
                                            Bkash
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->is_paid == 0)
                                            Not Paid
                                        @elseif($data->is_paid == 1)
                                            Paid
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->is_delivered == 0)
                                            Not Delivered
                                        @elseif($data->is_delivered == 1)
                                            Delivered
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


        <div class="row mb-5">
            <div class="col-lg-12 ">
                <ul class="pager">
                    <li class="previous pull-left"><a href="{{route('my-account')}}"> &larr; Back to My Account </a>
                    </li>
                    <li class="next pull-right"><a href="{{route('mainhome')}}"> <i class="fa fa-home"></i> Go to
                            Home</a></li>
                </ul>
            </div>
        </div>


    </div>
</section>
@endsection

@push('scripts')
        <!-- Datatable -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#order-list').DataTable({
            info: true,
            searching: true
            // paging: false
        });
    });


    $(document).ready(function () {
        $('#order-list2').DataTable({
            info: true,
            searching: true
            // paging: false
        });
    });
</script>
@endpush
