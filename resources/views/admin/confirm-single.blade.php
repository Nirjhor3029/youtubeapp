@extends('layouts.admin')

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Confirmed Details
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-6" style="margin-top:2rem;">

                <div class="box box-danger">
                    <div class="box-body">
                        <div class="details">

                            <label for="id" class="control-label col-md-4">Client ID:</label>

                            <div class="col-md-8">
                                <p>{{$datas[0]->user->id}}</p>
                            </div>
                            <label for="email" class="control-label col-md-4">Client Email:</label>

                            <div class="col-md-8">
                                <p>{{$datas[0]->user->email}}</p>
                            </div>
                            <label for="username" class="control-label col-md-4">Client Username:</label>

                            <div class="col-md-8">
                                <p>{{$datas[0]->user->name}}</p>
                            </div>
                            <label for="name" class="control-label col-md-4">Client Name:</label>

                            <div class="col-md-8">
                                @if (isset($datas[0]->user->fname) )
                                    <?php
                                    $name = "";
                                    $name = $name.$datas[0]->user->fname
                                    ?>
                                    @if(isset($datas[0]->user->lname))
                                        <?php

                                            $name = "";
                                            $name = $name.$datas[0]->user->fname.$datas[0]->user->lname;
                                        ?>
                                    @endif
                                    {{--<p>{{$datas[0]->user->fname}} {{$datas->user->lname}}</p>--}}
                                    <p> {{$name}}</p>
                                @else
                                    <p>Not Set Yet</p>
                                @endif
                            </div>
                            <label for="contact" class="control-label col-md-4">Client Contact:</label>

                            <div class="col-md-8">
                                <p>{{$datas[0]->user->contact}}</p>
                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            {{-- Vendor Query --}}
            <div class="col-md-12" style="margin-top:2rem;">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Vendor Confirm List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="vendor" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Catagory</th>
                                <th>Vendor Name</th>
                                <th>Event Date</th>
                                <th>Time</th>
                                <th>Message</th>
                                <th>Advance</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vendors as $ven)
                                <tr>
                                    <td>{{$ven->vendor->id}}</td>
                                    <td style="text-transform:uppercase;">{{$ven->catagory->name}}</td>
                                    <td>{{$ven->vendor->title}}</td>
                                    @php
                                    $dates = explode(',',$ven->order_date);
                                    @endphp
                                    <td>
                                        @foreach ($dates as $date)
                                            @php
                                            $thedate = date("d-m-Y", strtotime($date));
                                            @endphp
                                            <span>{!! $thedate. '<br/>' !!}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$ven->time}}</td>
                                    <td>{{$ven->mess or ""}}</td>
                                    <td>{{$ven->advance}}</td>
                                    <td>{{$ven->total}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            {{-- End of Vendor Query --}}

            {{-- Ayojok Service Bookable Query --}}
            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-info ">
                    <div class="box-header">
                        <h3 class="box-title">Service Confirm List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="service" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Catagory</th>
                                <th>Service Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Message</th>
                                <th>Advance</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $pro)
                                <tr>
                                    <td>{{$pro->id}}</td>
                                    <td style="text-transform:uppercase;">{{$pro->catagory->name}}</td>
                                    <td>{{$pro->product->title}}</td>
                                    @php
                                    $dates = explode(',',$pro->order_date);
                                    @endphp
                                    <td>
                                        @foreach ($dates as $date)
                                            @php
                                            $thedate = date("d-m-Y", strtotime($date));
                                            @endphp
                                            <span>{!! $thedate. '<br/>' !!}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$pro->time}}</td>
                                    <td>{{$pro->mess}}</td>
                                    <td>{{$pro->advance}}</td>
                                    <td>{{$pro->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            {{-- End of Ayojok Service Bookable Query --}}


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('#vendor,#service').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endpush
