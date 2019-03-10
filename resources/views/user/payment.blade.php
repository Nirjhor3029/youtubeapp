@extends('layouts.app')

@push('css')

@endpush

@section('content')
        <!-- Masthead -->
<header class="pagehead" style="background-image: url({{asset('img/backgrounds/bg-footer.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto text-center text-white">
                <img class="pagehead-img img-responsive mb-3" src="{{asset('img/ayojok-logo-transparent.png')}}"
                     alt=""/>
            </div>
        </div>
    </div>
</header>
<!--/ End of Masthead -->

<!-- Content section -->
<section class="page-section mt-4 mb-4">
    <div class="container">

        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{route('mainhome')}}">Home</a></li>
                <li><a href="{{route('my-account')}}">My Account</a></li>
                <li class="active"> Payment</li>
            </ul>
        </div>

        <div class="wow fadeIn">
            <h3><i class="fa fa-money fa-lg" style="margin-right:1rem;"></i> Payment</h3>
        </div>
        <div class="mt-4 mb-5">
            {{-- <p>You can pay advance or due payment directly to the vendors or Ayojok, you can also pay cash on delivery for the deliverable products like Dala-Kula. You can now also pay through debit/credit card and Bkash in Ayojok.com</p> --}}
            <p class="text-justify">You can pay the specified “Advance” amount to Ayojok either by Bkash/debit/credit
                card or by coming to our office. You can also pay the "Advance" amount directly to the vendors. The rest
                of the “due amount” shall need to be paid to the vendors. For products like Dala Kula and Holud
                cosmetics, you have the option to pay us by cash during delivery or you can pay in advance by bkash or
                debit/credit card.</p>

            <p class="text-justify">For Cash-on-delivery, our Ayojok team will call you again for confirmation and
                deliver the product to your address. For Bkash, you will be asked to send us the required money to our
                Bkash number that is given on the website. After sending your money through Bkash, you will be asked to
                provide us the Bkash transaction ID and number for verification. After verification, your order will
                finally be placed and ready for delivery.</p>
        </div>
        <div class="row">
            <div class="col-lg-8">
                @if ($datas->isNotEmpty())
                    @foreach ($datas as $data)
                        @if (is_null($data->vendor))
                            <div class="card mb-2">
                                <div class="card-body row">
                                    <div class="col-lg-8">
                                        <h5 class="card-title">{{$data->product->title}}
                                            <small>({{$data->catagory->name}})</small>
                                        </h5>
                                        <p class="card-text"><strong>Date : </strong>
                                            @php
                                            $dates = explode(',',$data->order_date);
                                            @endphp
                                            @foreach ($dates as $date)
                                                @php
                                                $thedate = date("d-m-Y", strtotime($date));
                                                @endphp
                                                <span>{!! $thedate. ',' !!}</span>
                                            @endforeach
                                        </p>

                                        <p class="card-text"><strong>Time/Shift : </strong>{{$data->time or ""}} </p>

                                        <p class="card-text"><strong>Total : </strong>{{$data->total}} BDT </p>

                                        <p class="card-text"><strong>Advance : </strong>{{$data->advance}} BDT
                                            @if ($data->online_paid == 1)
                                                (Paymenet Not Verified Yet)
                                            @elseif($data->onlines_paid == 2)
                                                (Payment Verified)
                                            @endif
                                        </p>

                                        <p class="card-text" style="float:left;padding-top:10px;"> Paid to vendor
                                            directly/Cash on Deliver :
                                            @if ($data->is_paid == 0)
                                                {!! Form::open(['method' => 'POST','route'=> ['manual-payment',$data->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-check" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;padding:2px 10px 0px 10px;color:#f47f20;background-color: #ffffff;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click, if paid to vendor !']) !!}
                                                {!! Form::close()!!}
                                            @elseif ($data->is_paid == 1)
                                                <span style="color:#f47f20;">Payment Complete</span>
                                            @endif

                                            {{-- <button class="btn btn-xs" style="font-size:1.5rem;padding: 8px;color:#f47f20;background-color: #ffffff;" type="submit" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click, if paid manually"><span class="fa fa-sm fa-check" style="" aria-hidden="true"></span></button> --}}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 mt-2 text-center">
                                        @if ($data->temp_add == 0)
                                            @if ($data->is_paid == 1)
                                                {!! Form::open(['method' => 'POST','route'=> ['delete-payment',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-secondary btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding: 0.5rem 1rem;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                                {!! Form::close()!!}
                                            @else
                                                {!! Form::open(['method' => 'POST','route'=> ['payonline',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('Pay online <br> or Bkash',['class'=> 'btn btn-secondary', 'style' => 'font-size:0.6rem;','type' => 'submit',"name"=>"order_id"]) !!}
                                                {!! Form::close()!!}
                                                {!! Form::open(['method' => 'POST','route'=> ['delete-payment',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-secondary btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding: 0.5rem 1rem;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                                {!! Form::close()!!}

                                            @endif
                                        @else
                                            <h6 style="color:#f47f20;text-align:center;">Added !!</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @elseif(is_null($data->product))
                            <div class="card mb-2">
                                <div class="card-body row">
                                    <div class="col-lg-8">
                                        <h5 class="card-title">{{$data->vendor->title}}
                                            <small>({{$data->catagory->name}})</small>
                                        </h5>
                                        <p class="card-text"><strong>Date : </strong>
                                            @php
                                            $dates = explode(',',$data->order_date);
                                            @endphp
                                            @foreach ($dates as $date)
                                                @php
                                                $thedate = date("d-m-Y", strtotime($date));
                                                @endphp
                                                <span>{!! $thedate. ',' !!}</span>
                                            @endforeach
                                        </p>

                                        <p class="card-text"><strong>Time/Shift : </strong>{{$data->time or ""}} </p>

                                        <p class="card-text"><strong>Total : </strong>{{$data->total}} BDT</p>

                                        <p class="card-text"><strong>Advance : </strong>{{$data->advance}} BDT
                                            @if ($data->online_paid == 1)
                                                (Paymenet Not Verified Yet)
                                            @elseif($data->onlines_paid == 2)
                                                (Payment Verified)
                                            @endif
                                        </p>

                                        <p class="card-text" style="float:left;padding-top:10px;"> Paid to vendor
                                            directly/Cash on Deliver :
                                            @if ($data->is_paid == 0)
                                                {!! Form::open(['method' => 'POST','route'=> ['manual-payment',$data->id],'style'=>'display:inline']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-check" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;padding:2px 10px 0px 10px;color:#f47f20;background-color: #ffffff;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Click, if paid manually !']) !!}
                                                {!! Form::close()!!}
                                            @elseif ($data->is_paid == 1)
                                                <span style="color:#f47f20;">Payment Complete</span>
                                            @endif

                                            {{-- <button class="btn btn-xs" style="font-size:1.5rem;padding: 8px;color:#f47f20;background-color: #ffffff;" type="submit" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click, if paid manually"><span class="fa fa-sm fa-check" style="" aria-hidden="true"></span></button> --}}
                                        </p>
                                    </div>
                                    <div class="col-lg-4 mt-2 text-center">
                                        @if ($data->temp_add == 0)
                                            @if ($data->is_paid == 1)
                                                {!! Form::open(['method' => 'POST','route'=> ['delete-payment',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-secondary btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding: 0.5rem 1rem;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                                {!! Form::close()!!}
                                            @else
                                                {!! Form::open(['method' => 'POST','route'=> ['payonline',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('Pay online <br> or Bkash',['class'=> 'btn btn-secondary', 'style' => 'font-size:0.6rem;','type' => 'submit',"name"=>"order_id"]) !!}
                                                {!! Form::close()!!}
                                                {!! Form::open(['method' => 'POST','route'=> ['delete-payment',$data->id],'style'=>'display:inline-block']) !!}
                                                {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-secondary btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding: 0.5rem 1rem;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                                {!! Form::close()!!}

                                            @endif
                                        @else
                                            <h6 style="color:#f47f20;text-align:center;">Added !!</h6>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <h5> Your query is still in process !!</h5>
                    <p>Payment will be updated after the process completed</p>
                @endif

            </div>

            <div class="col-lg-4">
                <div class="table-responsive calculator">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Paying For</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($temporders as $temporder)
                            @if ($temporder->vendors_id == 0)
                                <tr>
                                    <td>{{$temporder->product->title or ""}}</td>
                                    <td><span class="price">{{$temporder->advance or ""}}</span> BDT</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route'=> ['temp-delete',$temporder->id], 'style' => 'display:inline']) !!}
                                        {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                            @elseif ($temporder->products_id == 0)
                                <tr>
                                    <td>{{$temporder->vendor->title or ""}}</td>
                                    <td><span class="price">{{$temporder->advance or ""}}</span> BDT</td>
                                    <td>
                                        {!! Form::open(['method' => 'POST','route'=> ['temp-delete',$temporder->id], 'style' => 'display:inline']) !!}
                                        {!! Form::button('<span class="fa fa-sm fa-close" style="" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color:transparent;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr style="font-weight:500">
                            <td>Total Due</td>
                            <td colspan="2"><span class="total">0</span> BDT</td>
                        </tr>
                        <tr class="text-center">
                            {{-- <td colspan="3"><button type="button" name="button" class="btn btn-secondary block">Pay Now</button></td> --}}
                            <td colspan="3">
                                @if (count($temporders)>0)
                                    {{-- <a href="{{route('payment-method')}}" class="btn btn-secondary block">Pay Now</a> --}}
                                    {!! Form::open(['method' => 'POST','route'=>'payment-method']) !!}
                                    <input type="hidden" name="total" id="total">
                                    {!! Form::button('Pay Now',['class'=> 'btn btn-secondary block','type' => 'submit']) !!}
                                    {!! Form::close()!!}
                                @else
                                    <p>No item added you for payment</p>
                                @endif
                            </td>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>

        </div>

        <div class="mt-4 mb-5">
            <p>After any types of payment using an method you will get invoice over the email or phone. In terms of cash
                on delivery you will also get a hard copy of the invoice during delivery.</p>
        </div>

    </div>
</section>
<!--/ End of Content section -->

@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        $('.price').each(function () {
            calculateSum();
        });
        function calculateSum() {
            var sum = 0;
            // iterate through each td based on class and add the values
            $(".price").each(function () {

                var value = $(this).text();
                // add only if the value is number
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('.total').html(sum);
            $('#total').val(sum);
        }
    });
    $(window).scroll(function (e) {
        var $el = $('.calculator');
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 400 && !isPositionFixed) {
            $('.calculator').css({'position': 'fixed', 'top': '100px', 'width': '25%'});
            if ($(window).width() < 512) {
                $('.calculator').css({'position': 'static', 'width': 'auto'});
            }
            else if ($(window).width() < 801) {
                $('.calculator').css({'position': 'static', 'width': 'auto'});
            }
            // elseif($( window ).width() < 1200 && isPositionFixed) {
            //   $('.calculator').css({'position': 'static','width': 'auto'});
            // }
        }
        if ($(this).scrollTop() < 400 && isPositionFixed) {
            $('.calculator').css({'position': 'static', 'width': 'auto'});
        }
    });
</script>
@endpush
