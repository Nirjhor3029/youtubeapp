@extends('layouts.admin')

@push('css')
<style media="screen">
    img {
        max-width: 50rem;
        margin: 0.5rem;
    }
</style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New Images
            </h1>
        </section>

        <section class="maincontent">
            <div class="col-md-12" style="margin-top:2rem;">
                <div class="box box-info">
                    <div class="box-body" style="margin-top:2rem;">
                        <div class="col-lg-12">
                            {!! Form::open(['method' => 'POST','route'=> ['vendor.addGalleries',$datas->id],'enctype'=>"multipart/form-data"]) !!}

                            <div class="form-group" style="margin-bottom:8rem;">
                                <label class="" for="package_image">Vendor Images:</label>

                                <p>Max (600x400)</p>
                                <div class="col-lg-6">
                                    <input type="file" name="vendor_images[]" id="package_image" accept="image/*"  class="form-control" multiple>
                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" name="vendor_id" value="{{$datas->id}}">
                                    <input type="hidden" name="category_id" value="{{$datas->catagory_id}}">
                                    <input type="hidden" name="vendor_title" value="{{$datas->title}}">
                                </div>
                                {!! Form::button('Add Photos',['class'=> 'btn btn-success','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Add Packages']) !!}
                                {!! Form::close()!!}
                            </div>

                        </div>
                        <div class="col-lg-12" style="margin-top: 3px">
                            <label for="package_image">selected Image Preview</label>

                            <div id="package-preview"></div>
                        </div>
                    </div>
                </div>

                <div class="box-body" style="margin-top:2rem;">

                    <div class="col-md-12" style="margin-top:2rem;">
                        <div class="box box-primary">
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category ID</th>
                                        <th>Vendors ID</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($datas->images as $image)
                                        <tr>
                                            <td>{{$image->id}}</td>
                                            <td>{{$image->catagory_id}}</td>
                                            <td>{{$image->vendors_id}}</td>
                                            <td>
                                                <img src="{{asset($image->image_locations)}}"
                                                     title="{{$image->image_locations}}"
                                                     style="height: 80px;width: 100px">
                                            </td>
                                            <td>
                                                {{-- Delete Button --}}
                                                {!! Form::open(['method' => 'POST','route'=> ['vendor.deleteGall', $image->id], 'style' => 'display:inline', 'onsubmit' => 'return delecteConfirm(this)']) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-remove" style="" aria-hidden="true"></span>',['class'=> 'btn btn-danger','type' => 'submit','data-toggle'=>'tooltip', 'data-placement'=>'bottom', 'title'=>'Remove Image']) !!}
                                                {!! Form::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </div>
        </section>
    </div>

    <script>
        function delecteConfirm(ob) {
            if (confirm("Are you sure to delete the image !")) {
                //alert("true") ;
                return true;
            } else {
                //alert("false") ;
                return false;
            }
        }
    </script>
@endsection

@push('scripts')
<script type="text/javascript">
    $('#package_image').on("change", previewpackageImage);
    function previewpackageImage() {
        var $preview = $('#package-preview').empty();
        if (this.files) $.each(this.files, readAndPreview);

        function readAndPreview(i, file) {

            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            }
            var reader = new FileReader();

            $(reader).on("load", function () {
                $preview.append($("<img/>", {src: this.result}));
            });

            reader.readAsDataURL(file);

        }
    }
</script>
@endpush


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

    function deleteAlert() {
        //alert("alert");
        var x = confirm("Are you sure you want to delete this data ? ");
        return x;
    }
</script>
@endpush
