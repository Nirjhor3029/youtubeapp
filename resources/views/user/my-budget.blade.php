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

  <section class="page-section mt-4 mb-4">
    <div class="container">

      <div class="row">
        <ul class="breadcrumb">
          <li><a href="{{route('mainhome')}}">Home</a></li>
          <li><a href="{{route('my-account')}}">My Account</a></li>
          <li class="active"> Budget Manager</li>
        </ul>
      </div>

      <div class="wow fadeIn clearfix">
        <img src="img/planning-tools/my-vendor.png" style="width:3rem;float:left;" alt=""><h3 style="padding:15px;margin-left:3rem;">My Budget</h3>
      </div>

      <div class="mt-4 mb-5">
        <div class="mt-2 mb-2 text-justify">
          <p>Our Budget Manager tool has been designed to help you plan your wedding by allocating your budget properly for either the groom or bride. The aim of our tool is to help you get an idea of the expense scenario for your wedding within your specified total budget; like in which segments the expenditures will take place and also how you should allocate your budget for the different segments to create a balanced and efficient budget. We tried to cover up all the expenses in our segments, however, we have excluded the ‘Denmohor’ expense as it will vary from person to person. Our segment expenses has accounted for all the events (Mehedi, Holud, Reception etc.) you decide to have in your wedding; it could be one or could be more.</p>
        </div>
      </div>

        <div class="row mb-3">
          <form class="col-lg-12" action="{{route('addbudget')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group">
              <span class="input-group-addon">Your Total Budget</span>
              <input type="hidden" name="userid" value="{{Auth::user()->id}}">
              <input type="number" class="form-control" id="budget_input" name="totalBudget" onkeypress="return event.charCode >= 48" min="1" value="{{Auth::user() ? Auth::user()->mybudget : 0}}">
              <button type="submit" name="button" class="col-lg-1"><i class="fa fa-check"></i></button>
            </div>
          </form>
        </div>
      {!! Form::open(['method' => 'POST','route' => ['updateBudget','id' => Auth::user()->id],'style' => 'display:inline']) !!}

        <div class="row mb-3 ">
          <div class="col-sm-10">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="text-center">
                <tr>
                  <th>Segments</th>
                  <th>Estimated Cost</th>
                  <th>Actual Cost</th>
                  <th>Amount Paid</th>
                  <th>Amount Due</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>
                    <h6>Venue</h6>
                    <p style="font-size:0.8rem;">Including Venue rent for all wedding events &amp; other payables.</p>
                  </td>
                  <td id="bm1"></td>
                  <td> <input type="text" name="venue_c" id="bmac1" value="{{$cost->venue or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="venue_p" id="bmap1" value="{{$paid->venue or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd1"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Decoration & lighting</h6>
                    <p style="font-size:0.8rem;">Including Venue &amp; Home Decoration &amp; lighting, Car Decoration etc.</p>
                  </td>
                  <td id="bm2"></td>
                  <td> <input type="text" name="decoration_c" id="bmac2" value="{{$cost->decoration or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="decoration_p" id="bmap2" value="{{$paid->decoration or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd2"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Outfits & Accessories</h6>
                    <p style="font-size:0.8rem;">Including Bride/Groom Outfits, F&amp;F and in-laws Outfits, Cosmetics, Shoes etc.</p>
                  </td>
                  <td id="bm3"></td>
                  <td> <input type="text" name="outfit_c" id="bmac3" value="{{$cost->outfit or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="outfit_p" id="bmap3" value="{{$paid->outfit or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd3"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Jewelery</h6>
                    <p style="font-size:0.8rem;"></p>
                  </td>
                  <td id="bm4"></td>
                  <td> <input type="text" name="jewelery_c" id="bmac4" value="{{$cost->jewelery or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="jewelery_p" id="bmap4" value="{{$paid->jewelery or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd4"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Photography & Cinematography</h6>
                    <p style="font-size:0.8rem;">Including hiring Photographers &amp; cinematographer, Photo Album &amp; Frames etc.</p>
                  </td>
                  <td id="bm5"></td>
                  <td> <input type="text" name="photo_c" id="bmac5" value="{{$cost->photo or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="photo_p" id="bmap5" value="{{$paid->photo or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd5"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Make Up & Mehedi</h6>
                    <p style="font-size:0.8rem;">Including Bride/Groom Makeup &amp; Grooming, F&amp;F Makeup, Mehedi for all etc.</p>
                  </td>
                  <td id="bm6"></td>
                  <td> <input type="text" name="makeup_c" id="bmac6" value="{{$cost->makeup or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="makeup_p" id="bmap6" value="{{$paid->makeup or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd6"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Music & Entertainment</h6>
                    <p style="font-size:0.8rem;">Including DJ, Bands, Sound System, Projectors, Laser Lights etc.</p>
                  </td>
                  <td id="bm7"></td>
                  <td> <input type="text" name="music_c" id="bmac7" value="{{$cost->music or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="music_p" id="bmap7" value="{{$paid->music or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd7"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Catering</h6>
                    <p style="font-size:0.8rem;">Including food &amp; beverage cost for both venues &amp; home, Sweets etc.</p>
                  </td>
                  <td id="bm8"></td>
                  <td> <input type="text" name="catering_c" id="bmac8" value="{{$cost->catering or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="catering_p" id="bmap8" value="{{$paid->catering or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd8"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Bakeries & Snacks</h6>
                    <p style="font-size:0.8rem;">Including Wedding/Holud Cakes, Chotpoti/Fuchka, Coffee etc..
                    </p>
                  </td>
                  <td id="bm9"></td>
                  <td> <input type="text" name="bakeries_c" id="bmac9" value="{{$cost->bakeries or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="bakeries_p" id="bmap9" value="{{$paid->bakeries or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd9"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Invitation Card</h6>
                    <p style="font-size:0.8rem;">Including the card making cost &amp; card distribution cost etc.</p>
                  </td>
                  <td id="bm10"></td>
                  <td> <input type="text" name="invitation_c" id="bmac10" value="{{$cost->invitation or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="invitation_p" id="bmap10" value="{{$paid->invitation or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd10"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Legal Paperwork</h6>
                    <p style="font-size:0.8rem;">Including Kazi, legal cost; though it depends upon the amount of ‘Denmohor’.</p>
                  </td>
                  <td id="bm11"></td>
                  <td> <input type="text" name="legal_c" id="bmac11" value="{{$cost->legal or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="legal_p" id="bmap11" value="{{$paid->legal or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd11"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Transportation & Accomodation</h6>
                    <p style="font-size:0.8rem;">Including rents of Bride/Groom car, F&amp;F cars and hotel rooms if required.</p>
                  </td>
                  <td id="bm12"></td>
                  <td> <input type="text" name="transportation_c" id="bmac12" value="{{$cost->transportation or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="transportation_p" id="bmap12" value="{{$paid->transportation or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd12"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Honeymoon</h6>
                    <p style="font-size:0.8rem;">Including Plane fare, Room rents, Shopping, Travelling etc.</p>
                  </td>
                  <td id="bm13"></td>
                  <td> <input type="text" name="honeymoon_c" id="bmac13" value="{{$cost->honeymoon or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="honeymoon_p" id="bmap13" value="{{$paid->honeymoon or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd13"></td>
                </tr>
                <tr>
                  <td>
                    <h6>Others</h6>
                    <p style="font-size:0.8rem;">Including miscellaneous expenses, Dala Kula, etc.</p>
                  </td>
                  <td id="bm14"></td>
                  <td> <input type="text" name="other_c" id="bmac14" value="{{$cost->other or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td> <input type="text" name="other_p" id="bmap14" value="{{$paid->other or "0"}}" onkeyup="changeAmountDue()"> </td>
                  <td id="bmd14"></td>
                </tr>

                {{--<tr style="background-color: #318488" >
                  <td>
                    <h6>Total</h6>
                    <p style="font-size:0.8rem;"></p>
                  </td>
                  <td id="bm14">{{Auth::user() ? Auth::user()->mybudget : 0}}</td>
                  <td> <input type="text" name="other_c" id="bmac_total" value="{{"0"}}" > </td>
                  <td> <input type="text" name="other_p" id="bmap_total" value="{{"0"}}"  > </td>
                  <td id="bmd14"></td>
                </tr>--}}
                </tbody>
              </table>

            </div>
          </div>
          <div class="col-sm-2" >
            <div style="position: fixed;color: rgba(180, 3, 13, 0.84);display: none" class="text-center" id="fixed_update_message">
              <h5 style="text-transform: none" >* Please Save your Updated budget before leave/reload the page! *</h5>
              {!! Form::button('Save',['class'=> 'btn btn-xs btn-secondary ', 'style' => 'background-color:#f47f20;font-size:1.2rem; color:#ffffff; border-color:#f47f20','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Update your budget']) !!}
            </div>
            <div>
              hello
            </div>

          </div>

        </div>
      {!! Form::close()!!}
    </div>
  </section>
@endsection

@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
$('#budget_input').keyup(function () {
  var total = $("#budget_input").val();
     $('#bm1').text(total*0.10);
     $('#bm2').text(total*0.08);
     $('#bm3').text(total*0.08);
     $('#bm4').text(total*0.20);
     $('#bm5').text(total*0.05);
     $('#bm6').text(total*0.03);
     $('#bm7').text(total*0.02);
     $('#bm8').text(total*0.25);
     $('#bm9').text(total*0.02);
     $('#bm10').text(total*0.02);
     $('#bm11').text(total*0.02);
     $('#bm12').text(total*0.03);
     $('#bm13').text(total*0.05);
     $('#bm14').text(total*0.05);

     // Update Due
     $('#bmd1').text(document.getElementById("bmac1").value - document.getElementById("bmap1").value);
     $('#bmd2').text(document.getElementById("bmac2").value - document.getElementById("bmap2").value);
     $('#bmd3').text(document.getElementById("bmac3").value - document.getElementById("bmap3").value);
     $('#bmd4').text(document.getElementById("bmac4").value - document.getElementById("bmap4").value);
     $('#bmd5').text(document.getElementById("bmac5").value - document.getElementById("bmap5").value);
     $('#bmd6').text(document.getElementById("bmac6").value - document.getElementById("bmap6").value);
     $('#bmd7').text(document.getElementById("bmac7").value - document.getElementById("bmap7").value);
     $('#bmd8').text(document.getElementById("bmac8").value - document.getElementById("bmap8").value);
     $('#bmd9').text(document.getElementById("bmac9").value - document.getElementById("bmap9").value);
     $('#bmd10').text(document.getElementById("bmac10").value - document.getElementById("bmap10").value);
     $('#bmd11').text(document.getElementById("bmac11").value - document.getElementById("bmap11").value);
     $('#bmd12').text(document.getElementById("bmac12").value - document.getElementById("bmap12").value);
     $('#bmd13').text(document.getElementById("bmac13").value - document.getElementById("bmap13").value);
     $('#bmd14').text(document.getElementById("bmac14").value - document.getElementById("bmap14").value);
 }).trigger('keyup');
 });


  function changeAmountDue(){

    //alert('ok');
    $('#bmd1').text(document.getElementById("bmac1").value - document.getElementById("bmap1").value);
    $('#bmd2').text(document.getElementById("bmac2").value - document.getElementById("bmap2").value);
    $('#bmd3').text(document.getElementById("bmac3").value - document.getElementById("bmap3").value);
    $('#bmd4').text(document.getElementById("bmac4").value - document.getElementById("bmap4").value);
    $('#bmd5').text(document.getElementById("bmac5").value - document.getElementById("bmap5").value);
    $('#bmd6').text(document.getElementById("bmac6").value - document.getElementById("bmap6").value);
    $('#bmd7').text(document.getElementById("bmac7").value - document.getElementById("bmap7").value);
    $('#bmd8').text(document.getElementById("bmac8").value - document.getElementById("bmap8").value);
    $('#bmd9').text(document.getElementById("bmac9").value - document.getElementById("bmap9").value);
    $('#bmd10').text(document.getElementById("bmac10").value - document.getElementById("bmap10").value);
    $('#bmd11').text(document.getElementById("bmac11").value - document.getElementById("bmap11").value);
    $('#bmd12').text(document.getElementById("bmac12").value - document.getElementById("bmap12").value);
    $('#bmd13').text(document.getElementById("bmac13").value - document.getElementById("bmap13").value);
    $('#bmd14').text(document.getElementById("bmac14").value - document.getElementById("bmap14").value);

    /*var actualCostTotal = document.getElementById("bmac1").value+document.getElementById("bmac2").value+document.getElementById("bmac3").value+
            document.getElementById("bmac4").value+document.getElementById("bmac5").value+document.getElementById("bmac6").value+
            document.getElementById("bmac7").value+document.getElementById("bmac8").value+document.getElementById("bmac9").value+
            document.getElementById("bmac10").value+document.getElementById("bmac11").value+document.getElementById("bmac12").value+
            document.getElementById("bmac13").value+document.getElementById("bmac14").value;

    //alert(actualCostTotal);
    $('#bmac_total').text(actualCostTotal);*/


    $('#fixed_update_message').show();



  }
</script>
@endpush
