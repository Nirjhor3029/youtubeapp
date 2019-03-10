@extends('layouts.app')

@push('css')
  <link href="{{asset('css/account.css')}}" rel="stylesheet" type="text/css">
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


  <section class="page-section mb-5 mt-5">
    <div class="container">


      <div class="row mt-5 mb-5">
        <div class="col-lg-12">
          <div class="text-center">
            <h3>THANK YOU FOR SUBMITTING YOUR QUERY</h3>
            <p class="mt-4">Ayojok will contact you soon regarding the status of your query and the payment procedure.</p>
            <p>You can check our response to your query submission anytime in <a href="{{route('confirm-query')}}">Query List</a> under <a href="{{route("my-account")}}">My Account</a></p>
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-lg-12 ">
          <ul class="pager">
            <li class="previous pull-left"><a href="{{route('my-account')}}"> &larr; My Account </a></li>
            <li class="next pull-right"><a href="{{route('mainhome')}}"> Back To home <i class="fa fa-check"></i></a></li>
          </ul>
        </div>
      </div>


    </div>
  </section>
@endsection

@push('scripts')
  <script type="text/javascript">
  $("#cart").on('click','.dlt-btn', function(){
    var id = $(this).val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      type  : 'DELETE',
      url   : 'query-cart/'+ id ,
      data  : {id : id},
      success: function (data) {
        // console.log(data);
        // $("#id" +id).remove();
        location.reload();

      },
      error: function (data) {
        console.log('Error:', data);
      }
    });
  });

</script>
@endpush
