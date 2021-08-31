<style type="text/css">

    .inActive{
  color: #3276b1 !important;
  background-color: #fff !important;
  }
   .fa-edit{
      pointer-events:none;
  }

    .dropdown-item{
        background-color: #007bff;
        color: #fff;
    }
  </style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Home</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <!-- Menu Footer-->
                <li class="user-footer">

                    <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p>{{ __('Sign out') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
        {{--        <li class="nav-item">--}}
            {{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
                {{--                    class="fas fa-th-large"></i></a>--}}
            {{--        </li>--}}
    </ul>
</nav>
