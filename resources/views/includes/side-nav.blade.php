<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
            <a href="#" class="d-block" align="center">{{Auth::user()->full_name}}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-box "></i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>


            <li class="nav-header">CATEGORY MANAGEMENT</li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('category') || request()->is('category/*') ? 'active' : '' }}" href="{{ route('category.index') }}">
                    <i class="fa fa-address-book  nav-icon"></i>
                    <p>{{ __('Category') }}</p>
                </a>
            </li>

            <li class="nav-header">DEPARTMENT MANAGEMENT</li>
            {{-- <li class="nav-item  user-panel mb-3">
                <a href="{{ route('department.index') }}" class="nav-link {{ request()->is('admin/department') || request()->is('admin/department/*')? 'active' : '' }}">
                  <i class="nav-icon fas fa-edit"></i>
                    <p>{{ __('Department') }}</p>
                </a>
            </li> --}}

            <li class="nav-header">USER MANAGEMENT</li>
            {{-- <li class="nav-item  user-panel mb-3">
                <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('admin/user') || request()->is('admin/user/*')? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                    <p>{{ __('User') }}</p>
                </a>
            </li> --}}

            <li class="nav-header">EXIT</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>{{ __('Sign out') }}</p>
                </a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>
