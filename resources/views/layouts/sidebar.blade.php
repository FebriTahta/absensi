<div class="page-container row">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <img src="assets/img/profiles/avatar.jpg" alt="" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" width="69" height="69" />
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username">Fred <span class="semi-bold">Smith</span></div>
              <div class="status">Life goes on...</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">BROWSE <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>
            <li class="start active "> <a href="/admin-dashboard"><i class="material-icons">home</i> <span class="title">Dashboard</span> <span class="selected"></span> </a>
            </li>
            
            <li class="start open active">
              <a href="javascript:;"> <i class="material-icons">airplay</i> <span class="title">Master Data</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                
                <li> <a href="/admin-tunjangan"> Tunjangan Pegawai</a> </li>
                {{-- <li> <a href="#"> Potongan Pegawai</a> </li> --}}
                <li> <a href="/admin-jabatan"> Jabatan Pegawai</a> </li>
                <li> <a href="/admin-pegawai"> Data Pegawai</a> </li>
              </ul>
            </li>
            
            
            <li>
              <a href="javascript:;"> <i class="material-icons">playlist_add_check</i> <span class="title">Absensi</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="tables.html"> Daftar Absensi </a> </li>
                <li> <a href="datatables.html"> Detail Absensi </a> </li>
              </ul>
            </li>
            <!-- <li>
              <a href="javascript:;"> <i class="material-icons">layers</i> <span class="title">Extra</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="user-profile.html"> User Profile </a> </li>
              </ul>
            </li> -->
          </ul>
          <div class="side-bar-widgets">
            <p class="menu-title sm">SALARY SECTION <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
            <ul class="folders">
              <li>
                <a href="#">
                  <div class="status-icon green"></div>
                  Penggajian </a>
              </li>
              <li>
                <a href="#">
                  <div class="status-icon red"></div>
                  Cetak Gaji </a>
              </li>
              
              <li class="folder-input" style="display:none">
                <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="">
              </li>
            </ul>
            <p class="menu-title">PROJECTS </p>
            
          </div>
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
          <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
        </div>
        <div class="pull-right">
          <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
          <a href="lockscreen.html"><i class="material-icons">power_settings_new</i></a></div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
          <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button"></button>
            <h3>Widget Settings</h3>
          </div>
          <div class="modal-body"> Widget settings form goes here </div>
        </div>
        <div class="clearfix"></div>