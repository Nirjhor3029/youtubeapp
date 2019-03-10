@extends('layouts.admin')

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Client Details
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-4" style="margin-top:2rem;">

                <div class="box box-danger">
                    <div class="box-body">
                        <div class="details">
                            <label for="id" class="control-label col-md-4">Client ID:</label>

                            <div class="col-md-8">
                                <p>{{$data->id}}</p>
                            </div>
                            <label for="email" class="control-label col-md-4">Client Email:</label>

                            <div class="col-md-8">
                                <p>{{$data->email}}</p>
                            </div>
                            <label for="username" class="control-label col-md-4">Client Username:</label>

                            <div class="col-md-8">
                                <p>{{$data->name}}</p>
                            </div>
                            <label for="name" class="control-label col-md-4">Client Name:</label>

                            <div class="col-md-8">
                                @if (empty($data->fname) && empty($data->lname))
                                    <p>{{"Not Set Yet"}}</p>
                                @else
                                    <p>{{$data->fname}} {{$data->lname}}</p>
                                @endif
                            </div>
                            <label for="contact" class="control-label col-md-4">Client Contact:</label>

                            <div class="col-md-8">
                                <p>{{$data->contact}}</p>
                            </div>
                            <label for="contact" class="control-label col-md-4">Client Address:</label>

                            <div class="col-md-8">
                                <p>{{$data->address}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <div class="col-md-8" style="margin-top:2rem;">
                <div class="box box-success">
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Reference Name/Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $sl = 1;
                            @endphp
                            @foreach ($addresses as $address)

                                <tr>
                                    <td>{{$sl}}</td>
                                    <td>{{$address->line1}},{{$address->line2}},{{$address->city}}</td>
                                    <td>{{$address->contact}}</td>
                                    <td>{{$address->addressName}}</td>
                                </tr>
                                @php
                                $sl++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('scripts')
<script>
    $(function () {
        $('#example1').DataTable({
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
