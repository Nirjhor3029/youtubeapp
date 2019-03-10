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

  <!-- Content section -->
  <section class="page-section mt-4 mb-4">
    <div class="container">

      <div class="row">
        <ul class="breadcrumb">
          <li><a href="{{route('mainhome')}}">Home</a></li>
          <li><a href="{{route('my-account')}}">My Account</a></li>
          <li class="active"> My Vendors</li>
        </ul>
      </div>

      <div class="wow fadeIn">
        <h3><i class="fa fa-shopping-bag fa-lg" style="margin-right:1rem;"></i>  My Vendors</h3>
      </div>

      <div class="mt-4 mb-5">
        <div class="mt-2 mb-2">
          <p>This planning tool is design to track your selected vendors for your upcoming events. Using this tool, you can easily find whom you have chosen for different segments, their contact details; when &amp; where the service will be provided. You can also find the due payment &amp; advance payment has given to each vendor. You can add these vendors manually or it will be added automatically if you book directly through our website.</p>
        </div>
      </div>

      <div class="row mb-3">
        <div class="table-responsive">
          <table class="table">
            {!! Form::open(['method' => 'POST','route'=> ['deleteall',Auth::user()->id], 'style' => 'display:inline']) !!}
            {!! Form::button('Clear List',['class'=> 'btn btn-xs mb-3' ,'type' => 'submit']) !!}
            {!! Form::close()!!}
            <thead>
              <tr>
                <th>Vendors</th>
                <th>Contact Details</th>
                <th>Service Date, Time</th>
                <th>Total Payment</th>
                <th>Advance Payment</th>
                <th>Due Payment</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
                <tr>
                  <td><span style="text-transform:uppercase;font-weight:900;">{{$data->vendors_name}}<span> <br><span style="text-transform:capitalize;font-weight:450;">{{$data->catagory}}</span></td>
                  <td>{{$data->contact_details or ""}}</td>
                  <td>{{$data->service_date or ""}} <br> {{$data->service_time or ""}}</td>
                  <td>{{$data->total_payment}}</td>
                  <td>{{$data->advance_payment}}</td>
                  <td>{{$data->due_payment}}</td>
                  <td>
                    <button class="btn" type="button" data-toggle="modal" style="background-color: #f2f2f2;" data-target="#updateModal" data-venid = "{{$data->id}}" data-vendor="{{$data->vendors_name}}" data-catagory = "{{$data->catagory}}" data-contact = "{{$data->contact_details}}" data-date = "{{$data->service_date}}" data-time = "{{$data->service_time}}" data-total = "{{$data->total_payment}}" data-advance = "{{$data->advance_payment}}" data-due = "{{$data->due_payment}}"><span class="fa fa-sm fa-edit" style="font-size:1.5rem;color:#f47f20;background-color: #f2f2f2;padding:2px;" data-toggle="tooltip", data-placement="top", title ="Edit" aria-hidden="true" ></span> </button>
                    {{-- {!! Form::open(['method' => 'GET','route'=> ['confirm-query-id',$data->id], 'style' => 'display:inline']) !!}
                    {!! Form::button('<span class="fa fa-sm fa-edit" data-toggle="tooltip", data-placement="top", title ="Edit" aria-hidden="true" ></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#f47f20;background-color: #f2f2f2;padding:2px;','data-toggle'=>'modal','data-target'=>'#updateModal','data-vendor'=>$data->vendors_name,'data-catagory'=>$data->catagory,'data-contact'=>$data->contact_details,'data-date'=>$data->service_date,'data-time'=>$data->service_time,'data-total'=>$data->total_payment,'data-advance'=>$data->advance_payment,'data-due'=>$data->due_payment]) !!}
                    {!! Form::close()!!} --}}
                    {!! Form::open(['method' => 'POST','route'=> ['deleteMyVendor',$data->id], 'style' => 'display:inline']) !!}
                    {!! Form::button('<span class="fa fa-sm fa-close" aria-hidden="true"></span>',['class'=> 'btn btn-xs', 'style' => 'font-size:1.5rem;color:#dd3333;background-color: #f2f2f2;padding:2px;','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}
                    {!! Form::close()!!}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <button type="button" name="button" class="btn" style="background-color:#f47f20;color:#ffffff;" data-toggle="modal" data-target="#createModal">Add New</button>
      </div>

    </div>
  </section>

  <!-- The Update Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
    <div class="modal-dialog modal-login" id="myVendorModal" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form class="col-lg-12 row" action="{{route('createMyVendor')}}" method="post">
          {{csrf_field()}}

            @include('extra.myVendorform')

            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:2px;"><span style="color:#fff;">Close</span></button>
            <button type="submit" class="btn btn-secondary" style="margin-left:2px;"><span style="color:#fff;">Save</span></button>

        </form>
      </div>
      </div>
    </div>
  </div>

  <!-- The Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel">
    <div class="modal-dialog modal-login" id="myVendorModal" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form class="col-lg-12 row" action="{{route('updateMyVendor')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="venid" id="venid">
            @include('extra.myVendorform')

            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-right:2px;"><span style="color:#fff;">Close</span></button>
            <button type="submit" class="btn btn-secondary" style="margin-left:2px;"><span style="color:#fff;">Save</span></button>

        </form>
      </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <script type="text/javascript">
  $('#updateModal').on('show.bs.modal', function (event) {
    console.log('Modal Open');
    var button = $(event.relatedTarget) // Button that triggered the modal
    var vendor = button.data('vendor')
    var catagory = button.data('catagory')
    var contact = button.data('contact')
    var time = button.data('time')
    var date = button.data('date')
    var total = button.data('total')
    var advance = button.data('advance')
    var due = button.data('due')
    var venid = button.data('venid')
    var modal = $(this)
    modal.find('.modal-title').text('Update My Vendor')
    modal.find('.modal-body #vendor_name').val(vendor);
    modal.find('.modal-body #catagory').val(catagory);
    modal.find('.modal-body #contact_detail').val(contact);
    modal.find('.modal-body #service_time').val(time);
    modal.find('.modal-body #service_date').val(date);
    modal.find('.modal-body #total').val(total);
    modal.find('.modal-body #advance').val(advance);
    modal.find('.modal-body #due').val(due);
    modal.find('.modal-body #venid').val(venid);
  })
</script>
@endpush
