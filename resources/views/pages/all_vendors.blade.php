<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11/29/2018
 * Time: 3:20 PM
 */


?>

@extends('layouts.app')

@section('content')

        <!-- Our Service -->
<section class="page-section pricing" style="margin-top: 5%;text-transform: none">
    <div class="container wow fadeIn mb-5">
        <div class="text-center wow fadeIn">
            <p style="color:black; font-size:26px;">Find vendors at every budget</p>

            <p style="color:black; font-size:18px;">Venues, catering, decoration, photographers & more</p>
        </div>

        {{--Ayojok Services--}}
        <div class="wow fadeIn text-center mt-5" style="visibility: visible; animation-name: fadeIn;">
            <h3 id="service-name" style="color: rgba(10, 10, 10, 0.91);text-transform: none">Ayojok Services</h3>
            <hr class="colored" style="max-width: 200px;">
        </div>

        <div class="vendors" style="text-transform: none">
            <div class="row text-center justify-content-md-center mt-4">
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='venue')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Venue</h4>
                                <img src="{{asset('img/final/Venue.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='catering')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Catering</h4>
                                <img src="{{asset('img/final/catering.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='photography and cinematography')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Photography</h4>
                                <img src="{{asset('img/final/Photography.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='decoration')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Decoration</h4>
                                <img src="{{asset('img/final/Decoration.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-md-center mt-4">
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='invitation cards')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Invitation cards</h4>
                                <img src="{{asset('img/final/invitation card.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='dj')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">DJ</h4>
                                <img src="{{asset('img/final/DJ.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='makeup artist')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Makeup Artist</h4>
                                <img src="{{asset('img/final/Make UP.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='bakeries')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Bakeries</h4>
                                <img src="{{asset('img/final/Bakeries.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-md-center mt-4">
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='mehedi')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Mehedi</h4>
                                <img src="{{asset('img/final/Mehedi.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('vendors/'.$catagory ='kazi')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Kazi</h4>
                                <img src="{{asset('img/final/Kazi.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='vehicle')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Vehicle</h4>
                                <img src="{{asset('img/final/Vehicle.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='light & sound')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Light & Sound</h4>
                                <img src="{{asset('img/final/Lighting.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row text-center justify-content-md-center mt-4">
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='holud snacks')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Holud & Snacks</h4>
                                <img src="{{asset('img/final/Holud Snacks.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>

                    </div>

                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='dala kula')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Dala Kula</h4>
                                <img src="{{asset('img/final/Dala-Kula.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='holud')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Holud Accessories</h4>
                                <img src="{{asset('img/final/Holud Accessories.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3">
                    <div class="item">

                        <a href="{{url('services/'.$catagory ='wedding')}}">

                            <div class="img-wrapper">
                                <h4 class="fontOverImage">Wedding Accessories</h4>
                                <img src="{{asset('img/final/Wedding Accessories.jpg')}}"
                                     class="img-fluid mx-auto zoom" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--Ayojok Products --}}

    {{--<div class="wow fadeIn text-center mt-5" style="visibility: visible; animation-name: fadeIn;">
        <h3 id="service-name" style="color: rgba(10, 10, 10, 0.91);text-transform: none">Products</h3>
        <hr class="colored">
    </div>

    <div class="ayojok_services">
        <!-- Sub Service Start-->
        <div class="row text-center mt-4">
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='dj')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Vehicle</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='makeup artist')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Light & Sound</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='bakeries')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Holud Snacks</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='mehdi')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Dala Kula</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row text-center mt-4 mb-5">
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='vehicle')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Holud Accessories</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-6 col-lg-3">
                <div class="item">

                    <a href="{{url('vendors/'.$catagory ='holud')}}">

                        <div class="img-wrapper">
                            <h4 style="width:100%;">Wedding Accessories</h4>
                            <img src="https://ayojok.com/ideas-and-stories/wp-content/uploads/2018/11/37935754_1167663213386587_8347775346484969472_o.jpg"
                                 class="img-fluid mx-auto zoom" alt="">
                        </div>
                    </a>
                </div>
            </div>


        </div>

    </div>--}}


    </div>

</section>

@endsection
