<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">E-Data BPS Aceh Barat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
       
            <li class="{{Request::is('backend/dashboard')  ? 'active' : ''}}">
            <a href="{{route('admin.dashboard_index')}}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>

           </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{Request::is('backend/publikasi/*') || Request::is('backend/publikasi') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Input Data</span></a>
                <ul class="dropdown-menu"  >
                <li class="{{Request::is('backend/publikasi/*') || Request::is('backend/publikasi') ? 'active' : ''}}"><a class="nav-link " href="{{route('admin.publikasi_index')}}">Tabel Publikasi</a></li>
                   <!-- <li><a class="nav-link" href="#">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="#">Top Navigation</a></li>-->
                </ul>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dokumentasi
            </a>
        </div>
    </aside>
</div>