@push('css')

@endpush
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('adminhome')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"> <img src="{{asset('img/ayojok_v2.png')}}" alt="logo"
                                      style="width:5rem;"> </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> Ayojok</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu" data-toggle="tooltip" data-placement="bottom"
                    title="Contact Message">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        @php
                        $totalmess = App\Models\contactus::where('is_opened',0)->count();
                        @endphp
                        <span class="label label-success">{{$totalmess}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$totalmess}} messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="topbar-menu">
                                @php
                                $allmess = App\Models\contactus::where('is_opened',0)->get();
                                @endphp
                                @foreach ($allmess as $mess)
                                    @php
                                    $slug = str_limit($mess->messbody, 25, '...');
                                    $dateslug = $mess->created_at->format('d-m-Y');
                                    @endphp
                                    <li><!-- start message -->
                                        <a href="{{route('mess-single',$mess->id)}}">
                                            <h4>
                                                {{$mess->name}}
                                                <small><i class="fa fa-clock-o"></i> {{$dateslug}}</small>
                                            </h4>
                                            <p>{{$slug}}</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="{{route('mess')}}">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu" data-toggle="tooltip" data-placement="bottom" title="Order">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart"></i>
                        @php
                        $totalOrder = App\Models\order::all()->count();
                        @endphp
                        <span class="label label-warning">{{$totalOrder}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$totalOrder}} new order</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="topbar-menu2">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> New Purchase Order (Invice id
                                        #0001)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> New Purchase Order (Invice id
                                        #0002)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> New Purchase Order (Invice id
                                        #0003)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> New Purchase Order (Invice id
                                        #0004)
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> New Purchase Order (Invice id
                                        #0005)
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu" data-toggle="tooltip" data-placement="bottom" title="Query">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-search"></i>
                        @php
                        $totalquery = App\Models\querycart::where('status',0)->count();
                        @endphp
                        <span class="label label-danger">{{$totalquery}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$totalquery}} new query</li>
                        <li>
                            <!-- inner menu: contains the actual data -->

                            {{--Nir Edit--}}
                            <?php

                            $datas_count_user_id = \App\Models\querycart::where('status', 0)->groupBy('user_id')->orderBy('created_at', 'asc')->select('user_id', 'created_at', DB::raw('count(*) as total'))->get();
                            //return $datas_count_user_id[0]->user_id ;

                            $datas_for_query_icon = array();


                            for ($i = 0; $i < $datas_count_user_id->count(); $i++) {

                                $user_id = $datas_count_user_id[$i]->user_id;
                                $user = \App\User::where('id', $user_id)->first();

                                $datas_for_query_icon[$i] = [
                                        'user_id' => $user_id,
                                        'total_query_as_user_id' => $datas_count_user_id[$i]->total,
                                        'user_name' => "",  //$user->name
                                        'created_at' => $datas_count_user_id[$i]->created_at,
                                ];
                            }

                            //return $datas_for_query_icon;
                            ?>
                            {{--End of Nir Edit--}}

                            <ul class="menu" id="topbar-menu3">

                                @foreach($datas_for_query_icon as $data_for_query_icon)
                                    <li><!-- Query item -->
                                        <a href="{{url('/admin/query/'.$user = $data_for_query_icon['user_id'])}}">
                                            <h3>
                                                <i class="fa fa-search"> </i>
                                                New Query
                                                <small class="pull-right">{{$data_for_query_icon['created_at']->format(' d-M-y || g:i A ')}}</small>
                                            </h3>
                                            <p>{{$data_for_query_icon['user_name']}}
                                                - {{$data_for_query_icon['total_query_as_user_id']}} queries</p>
                                        </a>
                                    </li>
                                    @endforeach

                                            <!-- end Query item -->

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{route('query')}}">View all queries</a>
                        </li>
                    </ul>
                </li>
                <li data-toggle="tooltip" data-placement="bottom" title="Profile">
                    <a href="#"><i class="fa fa-user"></i></a>
                </li>
                <li data-toggle="tooltip" data-placement="bottom" title="Logout">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="fa fa-power-off"></i></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
@push('scripts')

<script type="text/javascript">
    // SLIMSCROLL FOR CHAT WIDGET
    $('#topbar-menu,#topbar-menu2,#topbar-menu3').slimScroll({
        height: '200px'
    });
    $('[data-toggle="tooltip"]').tooltip();
</script>

@endpush
