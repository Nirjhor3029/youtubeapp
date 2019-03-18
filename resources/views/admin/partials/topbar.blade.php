@push('css')
<style>
    .bg_you{
        background-color: #FFFFFF;
    }
</style>
@endpush
<header class="main-header bg_you">
    <!-- Logo -->
    <a href="{{route('adminhome')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"> <img src="{{asset('img/web/youtube.jpg')}}" alt="logo"
                                      style="width:5rem;"> </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b> YoutubeApp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


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
