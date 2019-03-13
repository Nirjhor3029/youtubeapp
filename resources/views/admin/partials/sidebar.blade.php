<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="">
                <img src="{{asset('img/ayojok_v2.png')}}" class="img-circle mt-4" alt="User Image" style="height: 30px;background-color: #000" >
            </div>
            <div class="pull-left info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>

                <p>{{\Illuminate\Support\Facades\Auth::user()->job_title}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('adminhome')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            {{--<li>
                <a href="{{route('admindash')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard (Google)</span>
                </a>
            </li>--}}
            <li>
                <a href="{{route('userList')}}">
                    <i class="fa fa-dashboard"></i> <span>User List</span>
                </a>
            </li>

            <li>
                <a href="{{route('userList')}}">
                    <i class="fa fa-dashboard"></i> <span>User Log</span>
                </a>
            </li>
            <li>
                <a href="{{route('videoCategories')}}">
                    <i class="fa fa-dashboard"></i> <span>Video Categories</span>
                </a>
            </li>
            <li>
                <a href="{{route('showVideoSubCategories')}}">
                    <i class="fa fa-dashboard"></i> <span>Video Sub Categories</span>
                </a>
            </li>
            <li>
                <a href="{{route('showTags')}}">
                    <i class="fa fa-dashboard"></i> <span>Video Tags</span>
                </a>
            </li>
            <li>
                <a href="{{route('appUsersToken')}}">
                    <i class="fa fa-dashboard"></i> <span>App User Tokens</span>
                </a>
            </li>

            {{-- Client Menu --}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-secret"></i>
                    <span>Client</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('client')}}"><i class="fa fa-circle-o"></i> Client List</a></li>
                </ul>
            </li>
            {{-- User Menu --}}
            {{--<li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Add new user</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Oparator List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Manager List</a></li>
                </ul>
            </li>--}}
            {{-- Payment Menu --}}
            {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Payment</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Payment Invoice</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Due Payment</a></li>
              </ul>
            </li> --}}
            {{-- Order Menu --}}
            <li>
                <a href="{{route('order')}}">
                    <i class="fa fa-clipboard"></i> <span>Order List</span>
                </a>
            </li>
            {{-- Query Menu --}}
            <li>
                <a href="{{route('query')}}">
                    <span class="glyphicon glyphicon-blackboard"></span> <span>Query List</span>
                </a>
            </li>
            {{-- Confirm List --}}
            <li>
                <a href="{{route('confirm')}}">
                    <span class="glyphicon glyphicon-ok"></span> <span>Confirm List</span>
                </a>
            </li>

            {{-- Product Menu --}}
            <li class="treeview">
                <a href="#">
                    <span class="glyphicon glyphicon-gift"></span>
                    <span>Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('service.index')}}"><i class="fa fa-circle-o"></i> Service List</a></li>
                    <li><a href="{{route('service.create')}}"><i class="fa fa-circle-o"></i> New Service Add</a></li>
                </ul>
            </li>

            {{-- Vendor Menu --}}
            <li class="treeview">
                <a href="#">
                    <span class="glyphicon glyphicon-knight"></span>
                    <span>Vendor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('vendors.index')}}"><i class="fa fa-circle-o"></i> Vendor List</a></li>
                    <li><a href="{{route('vendors.create')}}"><i class="fa fa-circle-o"></i> New Vendor Add</a></li>
                    <li><a href="{{route('vendor-packages')}}"><i class="fa fa-circle-o"></i>Vendor Package & Galleries</a></li>
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i>Vendor Gallery</a></li>--}}
                </ul>
            </li>

            {{-- Report Menu --}}
            {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-coffee"></i>
                <span>Report</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Product Report</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Vendor Report</a></li>
              </ul>
            </li> --}}

            {{-- Profit Menu --}}
            {{-- <li class="treeview">
              <a href="#">
                <span class="glyphicon glyphicon-piggy-bank"></span>
                <span>Profit</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Product Report</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Vendor Report</a></li>
              </ul>
            </li> --}}

            {{-- Messages --}}
            <li>
                <a href="{{route('mess')}}">
                    <i class="fa fa-envelope-o"></i> <span>Message</span>
                </a>
            </li>
            <li>
                <a href="{{route('ad_partners')}}">
                    <i class="fa fa-handshake-o"></i> <span>Partners</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
