<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12/17/2018
 * Time: 4:46 PM
 */

?>



@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{asset('css/inbox.css')}}">
@endpush

@section('content')




    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Query List
            </h1>
        </section>

        <section class="maincontent">

            <div class="col-md-12" style="margin-top:2rem;">

                <div class="box box-danger">
                    <div class="box-body table-responsive">
                        <div class="container">

                            {{-- <div class="row">
                                 <ul class="breadcrumb">
                                     <li><a href="{{route('mainhome')}}">Home</a></li>
                                     <li><a href="{{route('my-account')}}">My Account</a></li>
                                     <li class="active"> Message</li>
                                 </ul>
                             </div>--}}

                            <div class="wow fadeIn mt-4" style="color: #04050a;">
                                <h3><i class="fa fa-envelope fa-lg" style="margin-right:1rem;"></i>(User:  {{$user->name}} ) Query Inbox</h3>
                            </div>

                            <div class="mt-4 mb-2" style="color: #04050a;">
                                <div class="my-account">
                                    <p id="scroll_p">WELCOME TO ACCOUNT MESSAGE. HERE YOU CAN FIND ALL THE QUERY NOTIFICATION INFORMATION AND MESSAGE.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="messaging">
                                    <div class="inbox_msg">
                                        <div class="inbox_people col-lg-5">
                                            <div class="headind_srch">
                                                <input type="text" name="search" placeholder="Search Your Message">
                                            </div>
                                            <div class="inbox_chat" >

                                                @foreach ($datas as $data)
                                                    <a href="javascript:void(0)" id="{{$data->id}}">
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="{{asset('img/msg_icon.png')}}" alt="sunil">
                                                                </div>
                                                                @if ($data->type == 0)
                                                                    <div class="chat_ib">
                                                                        <h5>Query - #0{{$data->query_id.$data->user_id}}
                                                                            <span class="chat_date">{{$data->created_at->format('M d, Y ')}}
                                                                                <br>
                                                                                @if ($data->is_open == 1)
                                                                                    <p style="font-size:0.7rem;">Seen</p>
                                                                                @else
                                                                                    <p style="font-size:0.7rem;">Unread</p>
                                                                                @endif
                              </span>
                                                                        </h5>
                                                                        <p>{{$data->vendors->title or $data->product->title}}
                                                                        </p>
                                                                    </div>
                                                                @elseif ($data->type == 1)
                                                                    <div class="chat_ib">
                                                                        <h5>Invoice - #90872<span
                                                                                    class="chat_date">{{$data->created_at->format('M d, Y ')}}</span>
                                                                        </h5>
                                                                    </div>
                                                                @elseif ($data->type == 2)
                                                                    <div class="chat_ib">
                                                                        <h5>Booking Confirm <span
                                                                                    class="chat_date">{{$data->created_at->format('M d, Y ')}}</span>
                                                                        </h5>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="mesgs col-lg-7" >
                                            <div class="msg_history mb-4" id="div1">
                                                <div class="incoming_msg">
                                                    <div class="incoming_msg_img">
                                                        <img src="{{asset('img/msg_icon.png')}}" alt="Ayojok">
                                                    </div>
                                                    <div class="received_msg">
                                                        <p style="color: #ffffff">Please select one to see the detail conversation</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="type_msg">
                                                <div class="input_msg_write">
                                                    <form class="" action="{{route('User.SendMessage')}}" method="post"
                                                          id="send_message_form">
                                                        {{ csrf_field() }}

                                                        <input type="text" class="conv_msg" placeholder="Type a message"
                                                               name="user_message" id="user_message"/>
                                                        <input type="text" name="queryid" id="queryid">
                                                        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o"
                                                                                                      aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>



        </section><!-- /.content -->
    </div>


<section class="maincontent mt-4 mb-4" >

</section>

@endsection

@push('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.inbox_chat a').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');

        //alert(id);
        $('.chat_list').removeClass("active_chat");
        $('#' + id).find('.chat_list').addClass("active_chat");
        //alert(id);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '/query_inbox/' + id,
            data: 'id=' + id,
            success: function (response) {
                console.log(response);
                $(".msg_history").empty().html(response);
                $("#queryid").val(id);
                $('#div1').scrollTop($('#div1')[0].scrollHeight);
                //$('html').scrollTop(100);
                //document.getElementById("scroll_p").scrollIntoView();
            }
        });

        //$('#div1').scrollTop($('#div1')[0].scrollHeight);

    });



    $(document).ready(function(){
        var id = "<?php
            if($errors->any())  {
                echo $errors->first();
            }
            else{
                echo "0";
            }

        ?>";
        //alert(id);
        //$('.inbox_chat a').trigger('click');
        //alert(id);
        $('.chat_list').removeClass("active_chat");
        $('#' + id).find('.chat_list').addClass("active_chat");
        //alert(id);
        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '/inbox/' + id,
            data: 'id=' + id,
            success: function (response) {
                console.log(response);
                $(".msg_history").empty().html(response);
                $("#queryid").val(id);
                $('#div1').scrollTop($('#div1')[0].scrollHeight);
                document.getElementById("scroll_p").scrollIntoView();

            }
        });


        /*Nir edit*/
        $('#send_message_form').on('submit',function(e){
            e.preventDefault();
            var id = $("#queryid").val();
            var message = $("#user_message").val();


            var sts;
            if(id){
                //alert(id);
                sts= true;
            }else{
                //alert(id);
                alert("You must select one Query !!! ");
                sts= false;
            }

            if(message == ''){
                alert("You must Write something !!! ");
            }else{
                //alert(message);


                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: '/query_inbox/sendMessage',
                    data: {user_message:message,queryid : id},
                    success: function (response) {
                        console.log(response);
                        $(".msg_history").empty().html(response);
                        //$("#queryid").val(id);
                        $('#div1').scrollTop($('#div1')[0].scrollHeight);
                        document.getElementById("scroll_p").scrollIntoView();
                        $("#user_message").val("");



                    }

                });
            }



        });
        /*End of- Nir edit*/

        /*Set Interval*/
        setInterval(function() {

            var id = $("#queryid").val();
            $.ajax({

                type: 'get',
                dataType: 'html',
                url: '/query_inbox/' + id,
                data: 'id=' + id,
                success: function (response) {
                    console.log(response);
                    $(".msg_history").empty().html(response);
                    $("#queryid").val(id);
                    $('#div1').scrollTop($('#div1')[0].scrollHeight);
                    //$('html').scrollTop(100);
                    //document.getElementById("scroll_p").scrollIntoView();
                }
            });

        }, 30000);
        /*Set Interval*/


    });


</script>

@endpush
@push('scripts')
<script>
    $(function () {
        $('#table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })


</script>
@endpush