@extends('layouts.app')
@push('css')
<link href="css/account.css" rel="stylesheet" type="text/css">
@endpush


@section('content')
        <!-- Masthead -->
<header class="pagehead" style="background-image: url('img/backgrounds/bg-footer.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto text-center text-white">
                <img class="pagehead-img img-responsive mb-3" src="img/ayojok-logo-transparent.png" alt="">
            </div>
        </div>
    </div>
</header>
<!-- FB Profile Style -->

<!-- Blank section -->


<section class="page-section mt-4 mb-4">
    <div class="container">

        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="wow fadeIn">
                    <h3><i class="fa fa-shopping-cart fa-lg" style="margin-right:1rem;"></i> PAYMENT METHOD</h3>
                </div>
            </div>
        </div>


        {{-- <div class="row mt-4">
          <div class="col-lg-12">
            <ul class="orderStep orderStepLook2">
              <li><a href="#"> <i class="fa fa-map-marker "></i> <span> address</span></a></li>
              <li><a href="#"><i class="fa fa-truck "> </i><span>Shipping</span> </a></li>
              <li class="active"><a href="#"><i class="fa fa-money  "> </i><span>Payment</span> </a></li>
              <li><a href="#"><i class="fa fa-check-square "> </i><span>Order</span></a>
              </li>
            </ul>
          </div>
        </div> --}}

        {{-- <div class="row">
          <div class="col-lg-12">
            <div class="my-account">
              <p>PAYMENT METHOD</p>
            </div>
          </div>
        </div> --}}


        <div class="row">
            <div class="col-lg-12">
                <p class="mb-3">Please select a payment method to complete your order. If you do any customization in
                    your ordered products, please pay the additional payment during delivery.</p>

                <div id="accordion">
                    {{-- Cash on Delivery --}}
                    {{-- <div class="card mb-2">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span style="font-weight:600;">Option 1 </span> Cash on Delivery
                          </button>
                        </h5>
                      </div>

                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body mb-5">
                          <p>All transactions are secure and encrypted, and we never store. To learn more, please view our privacy policy.</p>
                          <br>
                          {!! Form::open(array('route' => 'paymentAdd', 'method' => 'POST'))  !!}
                            <div class="checkout-address form-group">
                              <label class="container">Cash On Delivery
                                <input required type="radio" value="1" name ="paymentCheck">
                                <span class="checkradio"></span>
                              </label>
                            </div>
                            <div class="form-group">
                              <label for="CommentsCOD"><h6>Add Comments About Your Order</h6></label>
                              <textarea class="form-control" name="Comments" cols="26" rows="3"></textarea>
                            </div>
                            <div class="checkout-address form-group">
                              <label class="container">I have read and agree to the <a href="{{route('terms-condition')}}">Terms & Conditions</a>
                                <input required type="checkbox" value="1" name ="codTermCheck">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="pull-right">
                              <button type="submit" class="btn btn-primary btn-proceed btn-lg"> Place Order &nbsp; <i class="fa fa-check-square"></i> </button>
                            </div>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div> --}}

                    {{-- Bkash --}}
                    <div class="card mb-2">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="true" aria-controls="collapseTwo">
                                    <span style="font-weight:600;">Option 1 </span>Bkash
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body mb-5">
                                <p>All transactions are secure and encrypted, and we never store. To learn more, please
                                    view our <a href="{{route('privacy')}}">privacy policy</a>.</p>
                                <br>
                                {!! Form::open(array('route' => 'paymentAdd', 'method' => 'POST'))  !!}
                                <div class="checkout-address form-group">
                                    <label class="container">
                                        <img src="https://www.bkash.com/sites/all/themes/bkash/logo.png" width="80rem"
                                             alt="Bkash"> Checkout with Bkash
                                        <input required type="radio" value="2" name="paymentCheck">
                                        <span class="checkradio"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="usedBkash"><h6>Sender Bkash Number</h6></label>
                                    <input type="text" class="form-control" name="used_num" placeholder="xxxx-xxxxxxx"
                                           onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                                           required>

                                    <p class="help-block">Enter the bkash number used for the payment.</p>
                                </div>
                                <div class="form-group">
                                    <label for="trxid"><h6>Transaction ID</h6></label>
                                    <input type="text" class="form-control" name="trxid" placeholder="xxxxxxxx"
                                           onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122"
                                           style="text-transform:uppercase" required>

                                    <p class="help-block">After succesful transaction there will be a <b>TrxID</b>,
                                        please enter that TrxID.</p>
                                </div>
                                <div class="form-group">
                                    <label for="CommentsBkash"><h6>Add Comments About Your Order</h6></label>
                                    <textarea class="form-control" name="comments" cols="26" rows="3"></textarea>
                                </div>
                                <div class="checkout-address form-group">
                                    <label class="container">I have read and agree to the <a href="#">Terms &
                                            Conditions</a>
                                        <input required type="checkbox" value="1" name="bkashTermCheck">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-proceed btn-lg"> Place Order &nbsp;
                                        <i class="fa fa-check-square"></i></button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="card mb-2">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    <span style="font-weight:600;">Option 2 </span> Online Payment
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordion">
                            <div class="card-body mb-5">
                                <p>All transactions are secure and encrypted, and we never store. To learn more, please
                                    view our privacy policy.</p>
                                <br>

                                <p>Client Name<span style="color:red;">*</span>: {{$user->name}}</p>
                                @if (!empty($user->contact))
                                    <p>Client Phone<span style="color:red;">*</span>: {{$user->contact}}</p>
                                @else
                                    <span style="color:red;">Please add your phone before placing order</span><br/>
                                @endif
                                @if (!empty($user->email))
                                    <p>Client Email<span style="color:red;">*</span>: {{$user->email}}</p>
                                @else
                                    <span style="color:red;">Please add your email before placing order</span><br/>
                                @endif
                                <p>Total Payment : {{$total}}</p>

                                <div class="pull-right">
                                    {!! Form::open(['method' => 'POST','route'=>'sslpay']) !!}
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <input type="hidden" name="transid" value="{{uniqid(mt_rand())}}">
                                    {!! Form::button('Complete Payment &nbsp; <i class="fa fa-check-square"></i>',['class'=> 'btn btn-primary btn-proceed btn-lg','type' => 'submit']) !!}
                                    {!! Form::close()!!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                {{-- <div class="col-lg-4">
                  <!-- checkout card -->
                  <div class="card">
                    <div class="card-body">
                      <div class="row table-responsive">
                        <table class="table">
                          <tr>
                            <td>Total Price</td>
                            <td style="font-weight:700;">BDT {{session('total')}}</td>
                          </tr>
                          <tr>
                            <td>Shipping</td>
                            <td style="font-weight:700; color:grey;">Free Shipping</td>
                          </tr>
                          <tr>
                            <td>Total</td>
                            <td style="color:rgb(244, 127, 32); font-weight:800;">BDT {{session('totalall')}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- End of Checkout card -->
                </div> --}}

            </div>

            <div class="row mb-5">
                <div class="col-lg-12 ">
                    <ul class="pager">
                        <li class="previous pull-left"><a href="{{route('payment')}}"> <i class="fa fa-arrow-left"></i>
                                Payment</a></li>
                        <!-- <li class="next pull-right"><a href="checkout-2.html">Payment Method <i class="fa fa-arrow-right"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')

@endpush
