<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link border-dark">
        <img src="{{ URL::asset('AdminLTE-3.1.0/dist/img/letter-t.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
        <span class="brand-text">&nbsp;&nbsp;<b>T</b>raffic <b>APP</b>s</span>
    </a>
    <div class="user-panel pb-3">
    </div>
    <!-- Sidebar -->
    <div class="sidebar text-sm">
        <!-- Sidebar Menu -->
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Identifikasi</li>
                <li class="nav-item {{ (request()->is('simpang3*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('simpang3*')) ? 'active' : '' }}">
                        <span class="fa-stack fa-xs">
                            <i class="fas fa-square fa-stack-2x"></i>
                            <strong class="fa-stack-1x text-dark">3</strong>
                        </span>
                        <p>
                            Simpang 3
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/simpang3/data-simpang') }}" class="nav-link {{ (request()->is('simpang3/data-simpang*')) ? 'active' : '' }}">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Data Simpang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang3/format-data') }}" class="nav-link {{ (request()->is('simpang3/format-data*')) ? 'active' : '' }}">
                                <i class="fas fa-check-square nav-icon"></i>
                                <p>Format Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang3/data-lalu-lintas') }}" class="nav-link {{ (request()->is('simpang3/data-lalu-lintas*')) ? 'active' : '' }}">
                                <i class="fas fa-poll nav-icon"></i>
                                <p>Identifikasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('simpang4*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('simpang4*')) ? 'active' : '' }}">
                        <span class="fa-stack fa-xs">
                            <i class="fas fa-square fa-stack-2x"></i>
                            <strong class="fa-stack-1x text-dark">4</strong>
                        </span>
                        <p>
                            Simpang 4
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/simpang4/data-simpang') }}" class="nav-link {{ (request()->is('simpang4/data-simpang*')) ? 'active' : '' }}">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Data Simpang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang4/format-data') }}" class="nav-link {{ (request()->is('simpang4/format-data*')) ? 'active' : '' }}">
                                <i class="fas fa-check-square nav-icon"></i>
                                <p>Format Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang4/data-lalu-lintas') }}" class="nav-link {{ (request()->is('simpang4/data-lalu-lintas*')) ? 'active' : '' }}">
                                <i class="fas fa-poll nav-icon"></i>
                                <p>Identifikasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('simpang5*')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('simpang5*')) ? 'active' : '' }}">
                        <span class="fa-stack fa-xs">
                            <i class="fas fa-square fa-stack-2x"></i>
                            <strong class="fa-stack-1x text-dark">5</strong>
                        </span>
                        <p>
                            Simpang 5
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/simpang5/data-simpang') }}" class="nav-link {{ (request()->is('simpang5/data-simpang*')) ? 'active' : '' }}">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Data Simpang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang5/format-data') }}" class="nav-link {{ (request()->is('simpang5/format-data*')) ? 'active' : '' }}">
                                <i class="fas fa-check-square nav-icon"></i>
                                <p>Format Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/simpang5/data-lalu-lintas') }}" class="nav-link {{ (request()->is('simpang5/data-lalu-lintas*')) ? 'active' : '' }}">
                                <i class="fas fa-poll nav-icon"></i>
                                <p>Identifikasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>