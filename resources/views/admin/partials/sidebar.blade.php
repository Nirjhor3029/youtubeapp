<style>
    .hide {
        display: none;
    }
</style>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" >
            <div class="pull-left image" style="">
                <img src="{{asset('img/web/youtube.jpg')}}" class="img-circle mt-4" alt="User Image"
                     style="height: 40px;background-color: #000">
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


            <li class="treeview">
                <a href="#">
                    <span class="glyphicon glyphicon-gift"></span>
                    <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{route('userList')}}">
                            <i class="fa fa-dashboard"></i> <span>User List</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('userLogList')}}">
                            <i class="fa fa-dashboard"></i> <span>User Log</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('appUsersToken')}}">
                            <i class="fa fa-dashboard"></i> <span>App User Tokens</span>
                        </a>
                    </li>
                </ul>
            </li>



            {{-- Vendor Menu --}}
            <li class="treeview">
                <a href="#">
                    <span class="glyphicon glyphicon-knight"></span>
                    <span>Video Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
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
                </ul>
            </li>











            <li>
                <a href="{{route('videos')}}">
                    <i class="fa fa-dashboard"></i> <span>Video List</span>
                </a>
            </li>









        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
