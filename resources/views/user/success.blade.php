<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/4/2019
 * Time: 4:45 PM
 */
?>

@extends('layouts.app')
@push('css')

@endpush


@section('content')
        <!-- Masthead -->
<header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto text-center text-white">
                <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}" alt=""/>
            </div>
        </div>
    </div>
</header>
<!--/ End of Masthead -->

{{--@include('extra.invoice')--}}

<div class="container" id='printableArea'>

    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="text-center">
                <a href="#"><i class="fa fa-print pull-left icon" id="print"></i></a>

                <h3>Invoice for Booking #33221</h3>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-sm-12">
            <div class="card height">
                <div class="card-header">Billing Details</div>
                <div class="card-body">
                    <table>
                        <tr>
                            <td>
                                <strong>Transaction Id</strong>
                            </td>
                            <td>
                                : {{$tran_id}} || {{$tranDetail_directFromSSL['tran_id']}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Card Type</strong>
                            </td>
                            <td>
                                : {{$tranDetail_directFromSSL['card_type']}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Account Holder Name</strong>
                            </td>
                            <td>
                                : {{$order_detials->cus_name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Total Amount</strong>
                            </td>
                            <td>
                                : {{$order_detials->total_amount}} {{$tranDetail_directFromSSL['currency']}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Email</strong>
                            </td>
                            <td>
                                : {{$order_detials->cus_email}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Phone</strong>
                            </td>
                            <td>
                                : {{$order_detials->cus_phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Orders id</strong>
                            </td>
                            <td>
                                : {{$order_detials->order_id}}
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <?php
    $order_ids = explode(',', $order_detials->order_id);

    ?>
    <div class="row mt-4 mb-2">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Order Date</strong></td>
                                <td><strong>Transaction Date</strong></td>
                                <td><strong>Item Name</strong></td>
                                <td class="text-center"><strong>Advance Paid</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_ids as $s_order_id)
                                <?php
                                $confirm_order = \App\Models\order::find($s_order_id);
                                ?>
                                <tr>
                                    <td>{{$confirm_order->order_date}}</td>
                                    <td>{{$tranDetail_directFromSSL['tran_date']}}</td>
                                    <td>
                                        <?php
                                        $item_title = "";
                                        if ($confirm_order->products_id != 0) {
                                            $item_title = $confirm_order->product->title;
                                        } elseif ($confirm_order->vendors_id != 0) {
                                            $item_title = $confirm_order->vendor->title;
                                        } else {
                                            $item_title = "Item title not Set";
                                        }
                                        echo $item_title;
                                        ?>
                                    </td>
                                    <td class="text-center">{{$confirm_order->advance}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="highrow"><i class="fa fa-barcode iconbig"></i></td>
                                <td class="highrow"></td>
                                <td class="highrow text-center"><strong>Total Advance Paid</strong></td>
                                <td class="highrow text-right">{{$tranDetail_directFromSSL['currency_amount']}} {{$tranDetail_directFromSSL['currency']}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 mb-3">
        <div class="col-sm-12" style="text-align: center">
            <span style="color: red">*Collect me for future use.*</span>
        </div>
    </div>
</div>

<style>

    @media print {
        .height {
            min-height: 10px;
        }
    }

    .height {
        min-height: 210px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
</style>

@endsection

@push('scripts')
<script type="text/javascript">

    $('#print').on('click', function () {

        $('.footer').hide();
        $('.navbar').hide();

        window.print();

        /*setTimeout(function(){*/
        $('.footer').show();
        $('.navbar').show();
        /*}, 2000);*/
    })
</script>

@endpush
