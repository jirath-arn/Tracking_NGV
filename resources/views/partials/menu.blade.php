<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Brand Logo -->
    <div class="brand-link">
        <span class="brand-text font-weight-normal text-sm">{{ trans('global.name')}} : {{ Auth::user()->name }}</span><br>
        <span class="brand-text font-weight-normal text-sm">{{ trans('global.login_email')}} : {{ Auth::user()->email }}</span>
    </div>
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Buses -->
                <li class="nav-item">
                    <a href="{{ route('admin.buses.index') }}" class="nav-link {{ request()->is('admin/buses') || request()->is('admin/buses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-bus">

                        </i>
                        <p>
                            <span>{{ trans('cruds.bus.title') }}</span>
                        </p>
                    </a>
                </li>
                
                <!-- Routes -->
                <li class="nav-item">
                    <a href="{{ route('admin.routes.index') }}" class="nav-link {{ request()->is('admin/routes') || request()->is('admin/routes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-road">

                        </i>
                        <p>
                            <span>{{ trans('cruds.route.title') }}</span>
                        </p>
                    </a>
                </li>

                <!-- Stations -->
                <li class="nav-item">
                    <a href="{{ route('admin.stations.index') }}" class="nav-link {{ request()->is('admin/stations') || request()->is('admin/stations/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-map-pin">

                        </i>
                        <p>
                            <span>{{ trans('cruds.station.title') }}</span>
                        </p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <p>
                            <span>{{ trans('cruds.user.title') }}</span>
                        </p>
                    </a>
                </li>

                <!-- Setting -->
                <li class="nav-item has-treeview {{ request()->is('admin/profiles*') ? 'menu-open' : '' }} {{ request()->is('admin/profiles*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cog">

                        </i>
                        <p>
                            <span>{{ trans('cruds.setting.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <!-- Profiles -->
                        <li class="nav-item">
                            <a href="{{ route('admin.profiles.index') }}" class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user">

                                </i>
                                <p>
                                    <span>{{ trans('cruds.profile.title') }}</span>
                                </p>
                            </a>
                        </li>

                        <!-- Change Password -->
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt">

                                </i>
                                <p>
                                    <span>{{ trans('cruds.changePassword.title') }}</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>