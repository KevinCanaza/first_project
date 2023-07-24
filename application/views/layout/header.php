<!DOCTYPE html>
<html>

<head>
  <title>CodeIgniter 3 Project </title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js"></script>


  <!-- Incluir SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

  <!-- Incluir SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.ico" />

  <!-- App css -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url()?>assets/css/theme.min.css" rel="stylesheet" type="text/css" />



</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
      <header id="page-topbar">
        <div class="navbar-header">
          <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
              <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="dropdown d-none d-sm-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-plus"></i> Create New
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
              </button>
              <div class="dropdown-menu">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  Application
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  Software
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  EMS System
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  CRM App
                </a>
              </div>
            </div>
          </div>

          <div class="d-flex align-items-center">
            <div class="dropdown d-none d-sm-inline-block ml-2">
              <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                  <div class="form-group m-0">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username" />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                          <i class="mdi mdi-magnify"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="" src="<?php echo base_url()?>assets/images/flags/us.jpg" alt="Header Language" height="16" />
                <span class="d-none d-sm-inline-block ml-1">English</span>
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <img src="<?php echo base_url()?>assets/images/flags/spain.jpg" alt="user-image" class="mr-1" height="12" />
                  <span class="align-middle">Spanish</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <img src="<?php echo base_url()?>assets/images/flags/germany.jpg" alt="user-image" class="mr-1" height="12" />
                  <span class="align-middle">German</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <img src="<?php echo base_url()?>assets/images/flags/italy.jpg" alt="user-image" class="mr-1" height="12" />
                  <span class="align-middle">Italian</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <img src="<?php echo base_url()?>assets/images/flags/russia.jpg" alt="user-image" class="mr-1" height="12" />
                  <span class="align-middle">Russian</span>
                </a>
              </div>
            </div>

            <div class="dropdown d-inline-block">
              <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-bell"></i>
                <span class="badge badge-danger badge-pill">3</span>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                <div class="p-3">
                  <div class="row align-items-center">
                    <div class="col">
                      <h6 class="m-0">Notifications</h6>
                    </div>
                    <div class="col-auto">
                      <a href="#!" class="small"> View All</a>
                    </div>
                  </div>
                </div>
                <div data-simplebar style="max-height: 230px">
                  <a href="" class="text-reset notification-item">
                    <div class="media">
                      <img src="<?php echo base_url()?>assets/images/users/avatar-2.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic" />
                      <div class="media-body">
                        <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                        <p class="font-size-13 mb-1">
                          You have new follower on Instagram
                        </p>
                        <p class="font-size-12 mb-0 text-muted">
                          <i class="mdi mdi-clock-outline"></i> 2 min ago
                        </p>
                      </div>
                    </div>
                  </a>
                  <a href="" class="text-reset notification-item">
                    <div class="media">
                      <div class="avatar-xs mr-3">
                        <span class="avatar-title bg-success rounded-circle">
                          <i class="mdi mdi-cloud-download-outline"></i>
                        </span>
                      </div>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1">Download Available !</h6>
                        <p class="font-size-13 mb-1">
                          Latest version of admin is now available. Please
                          download here.
                        </p>
                        <p class="font-size-12 mb-0 text-muted">
                          <i class="mdi mdi-clock-outline"></i> 4 hours ago
                        </p>
                      </div>
                    </div>
                  </a>
                  <a href="" class="text-reset notification-item">
                    <div class="media">
                      <img src="<?php echo base_url()?>assets/images/users/avatar-3.jpg" class="mr-3 rounded-circle avatar-xs" alt="user-pic" />
                      <div class="media-body">
                        <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                        <p class="font-size-13 mb-1">
                          Just upgraded to premium account.
                        </p>
                        <p class="font-size-12 mb-0 text-muted">
                          <i class="mdi mdi-clock-outline"></i> 1 day ago
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="p-2 border-top">
                  <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                  </a>
                </div>
              </div>
            </div>

            <div class="dropdown d-inline-block ml-2">
              <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="<?php echo base_url()?>assets/images/users/avatar-3.jpg" alt="Header Avatar" />
                <span class="d-none d-sm-inline-block ml-1">Jamie D.</span>
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>Inbox</span>
                  <span>
                    <span class="badge badge-pill badge-info">3</span>
                  </span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>Profile</span>
                  <span>
                    <span class="badge badge-pill badge-warning">1</span>
                  </span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  Settings
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>Lock Account</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>Log Out</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">
        <div data-simplebar class="h-100">
          <div class="navbar-brand-box">
            <a href="index.html" class="logo">
              <img src="<?php echo base_url()?>assets/images/logo-light.png" />
            </a>
          </div>

          <!--- Sidemenu -->
          <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
              <li class="menu-title">Menu</li>

              <li>
                <a href="<?php echo base_url('project/'); ?>" class="waves-effect"><i class="bx bx-home-smile"></i><span class="badge badge-pill badge-primary float-right">7</span><span>Dashboard</span></a>
              </li>

              <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-notepad"></i><span>Project</span></a>
                <ul class="sub-menu" aria-expanded="true">
                  <li><a href="<?php echo base_url('project/'); ?>">Project</a></li>
                  <li><a href="<?php echo base_url('area/'); ?>">Area</a></li>
                  <li><a href="<?php echo base_url('supervisor/'); ?>">Supervisor</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- Sidebar -->
        </div>
      </div>
      <!-- Left Sidebar End -->

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">




