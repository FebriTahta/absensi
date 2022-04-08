<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>CV Agus Wahyu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/datepicker.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-ricksaw-chart/css/rickshaw.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-morris-chart/css/morris.css')}}" type="text/css" media="screen">
    <link href="{{asset('assets/plugins/bootstrap-select2/select2.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('assets/plugins/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN PLUGIN CSS -->
    <link href="{{asset('assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('assets/plugins/bootstrapv3/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/bootstrapv3/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/plugins/animate.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}

    <link href="{{asset('assets/plugins/bootstrap-select2/select2.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('assets/plugins/jquery-datatable/css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <!-- END PLUGIN CSS -->
    @yield('header')
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{asset('webarch/css/webarch.css')}}" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="/admin-dashboard">
            <img src="{{asset('assets/img/logo.png')}}" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo2x.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <i class="material-icons">menu</i>
                </a>
              </li>
            </ul>
            <ul class="nav quick-section">
              <li class="quicklinks  m-r-10">
                <a href="#" class="">
                  <i class="material-icons">refresh</i>
                </a>
              </li>
              
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              
             
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    David Nester - Commented on your wall
                  </div>
                  <div class="description">
                    Meeting postponed to tomorrow
                  </div>
                  <div class="date pull-left">
                    A min ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages danger">
                <div class="iconholder">
                  <i class="icon-warning-sign"></i>
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    Server load limited
                  </div>
                  <div class="description">
                    Database server has reached its daily capicity
                  </div>
                  <div class="date pull-left">
                    2 mins ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="notification-messages success">
                <div class="user-profile">
                  <img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    You haveve got 150 messages
                  </div>
                  <div class="description">
                    150 newly unread messages in your inbox
                  </div>
                  <div class="date pull-left">
                    An hour ago
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <!-- END TOP NAVIGATION MENU -->
          <!-- BEGIN CHAT TOGGLER -->
          <div class="pull-right">
            <div class="chat-toggler sm">
              <div class="profile-pic">
                <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                <div class="availability-bubble online"></div>
              </div>
            </div>
            <ul class="nav quick-section ">
              <li class="quicklinks">
                <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                  <i class="material-icons">tune</i>
                </a>
                <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                
                  <li class="divider"></li>
                  <li>
                    <a href="login.html"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Log Out</a>
                  </li>
                </ul>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
            </ul>
          </div>
          <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>