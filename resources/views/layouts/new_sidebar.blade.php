<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
    
        <!-- User Profile -->
        <li>
            <div class="user-profile text-center">
                <img src="{{asset('img/user1.png')}}" alt="user_auth" class="user-auth-img img-circle"/>
                <div class="dropdown mt-5">
                <a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown">ryan georgian <span class="caret"></span></a>
                <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <li class="divider"></li>
                    <li>
                        
                        <div id="navbarDropdown" class=" dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </li>
        <!-- /User Profile -->
        <li class="navigation-header">
            <span>Main</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        <li class="">
            <a href="/admin-dashboard"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div></a>
        </li>
        
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>component</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="zmdi zmdi-google-pages mr-20"></i><span class="right-nav-text">Credentials Pegawai</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="form_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="/admin-tunjangan">Tunjangan</a>
                </li>
                
                <li>
                    <a href="/admin-jabatan">Jabatan</a>
                </li>

                <li>
                    <a href="/admin-pegawai">Pegawai</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Absensi </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="/admin-daftar-absensi">Daftar Absensi</a>
                </li>
                <li>
                    <a href="/admin-detail-absensi">Detail Absensi</a>
                </li>
            </ul>
        </li>
        
        <li><hr class="light-grey-hr mb-10"/></li>
        <li class="navigation-header">
            <span>featured</span> 
            <i class="zmdi zmdi-more"></i>
        </li>
        
        <li>
            <a href="/admin-penggajian"><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text">Penggajian</span></div><div class="clearfix"></div></a>
        </li>
        
    </ul>
</div>
<!-- /Right Sidebar Menu -->