<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link" style="background: #3998fd;">
        &nbsp;<i class="fas fa-cogs"></i>
        <span class="brand-text font-weight-light" style="font-weight: 700 !important; color: #d8ebff;">&nbsp;&nbsp;Admin Area</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 mb-3 d-flex">
            <div class="col-md-3" style="padding-left: 0px; padding-right:0px">
                <div class="image">
                    <img src="{{ asset('images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
            </div>

            <div class="col-md-7">
                <div class="info">
                    <a style="white-space: nowrap;" href="/admin/user" class="d-block">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
                </div>
            </div>

            <div class="col-md-2" style="font-size: 22px; margin-top: -3px; cursor: pointer;">
                <div class="info">
                    <a style="white-space: nowrap;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i style="color: #a02b2bf0;" class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="/admin" class="nav-link"
                        @if(Request::is('admin/dashboard'))
                            style="background: #50586138 !important;"
                        @endif
                        >
                        <i class="nav-icon fas fa-home"></i>
                        <p> Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/materials" class="nav-link"
                        @if((Request::is('admin/materials')) or (Request::is('admin/materials/*')) )
                            style="background: #50586138 !important;"
                        @endif
                        >
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>Materiais</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/healthUnits" class="nav-link"
                        @if((Request::is('admin/healthUnits')) or (Request::is('admin/healthUnits/*')) )
                            style="background: #50586138 !important;"
                        @endif
                        >
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>Unidades de Saúde</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/patients" class="nav-link"
                        @if((Request::is('admin/patients')) or (Request::is('admin/patients/*')) )
                            style="background: #50586138 !important;"
                        @endif
                        >
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Pacientes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/reports" class="nav-link"
                        @if((Request::is('admin/reports')) or (Request::is('admin/reports/*')) )
                            style="background: #50586138 !important;"
                        @endif
                        >
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Relatórios</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
