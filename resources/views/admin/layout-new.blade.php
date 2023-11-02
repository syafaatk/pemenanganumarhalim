<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="pemenangan umar halim" />
    <meta name="author" content="Khoirusy Syafaat" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('plusadmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plusadmin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plusadmin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('plusadmin/vendors/jquery-bar-rating/css-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('plusadmin/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('plusadmin/css/demo_2/style.css') }}" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('plusadmin/images/favicon.png') }}" />
  </head>
  <body>
    @if(session('message'))
    <script>
        // Tambahkan JavaScript untuk menampilkan dialog box
        alert("{{ session('message') }}");
    </script>
    @endif
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
          <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container">
              <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html">
                  <img src="{{ asset('plusadmin/images/logo.svg') }}" alt="logo" />
                  <span class="font-12 d-block font-weight-light">Responsive Dashboard </span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('plusadmin/images/logo-mini.svg') }}" alt="logo" /></a>
              </div>
              <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                  <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                      <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                          <i class="mdi mdi-magnify"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                    </div>
                  </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item nav-profile dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      {{-- <div class="nav-profile-img">
                        <img src="{{ asset('plusadmin/images/faces/face1.jpg') }}" alt="image" />
                      </div> --}}
                      <div class="nav-profile-text">
                        <p class="text-black font-weight-semibold m-0"> {{ Auth::user()->name}} </p>
                        <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                      </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="{{ route('admin.changePassword') }}">
                        <i class="mdi mdi-cached me-2 text-success"></i> Change Password </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-2 text-primary"></i> {{ __('Logout') }} </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                  <span class="mdi mdi-menu"></span>
                </button>
              </div>
            </div>
          </nav>
          <nav class="bottom-navbar">
            <div class="container">
              <ul class="nav page-navigation">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-monitor-dashboard menu-icon"></i>
                    <span class="menu-title">UI Elements</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                    <ul class="submenu-item">
                      <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdown</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/forms/basic_elements.html">
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                    <span class="menu-title">Forms</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/icons/mdi.html">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Icons</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/charts/chartjs.html">
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                    <span class="menu-title">Charts</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/tables/basic-table.html">
                    <i class="mdi mdi-table-large menu-icon"></i>
                    <span class="menu-title">Tables</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                    <span class="menu-title">Docs</span></a>
                </li>
                <li class="nav-item">
                  <div class="nav-link d-flex">
                    <button class="btn btn-sm bg-danger text-white"> Trailing </button>
                    <div class="nav-item dropdown">
                      <a class="nav-link count-indicator dropdown-toggle text-white font-weight-semibold" id="notificationDropdown" href="#" data-bs-toggle="dropdown"> English </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item" href="#">
                          <i class="flag-icon flag-icon-bl me-3"></i> French </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="flag-icon flag-icon-cn me-3"></i> Chinese </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="flag-icon flag-icon-de me-3"></i> German </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                          <i class="flag-icon flag-icon-ru me-3"></i>Russian </a>
                      </div>
                    </div>
                    <a class="text-white" href="index.html"><i class="mdi mdi-home-circle"></i></a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <div class="main-panel">
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="container">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('plusadmin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('plusadmin/vendors/jquery-bar-rating/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('plusadmin/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('plusadmin/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('plusadmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('plusadmin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('plusadmin/js/misc.js') }}"></script>
    <script src="{{ asset('plusadmin/js/settings.js') }}"></script>
    <script src="{{ asset('plusadmin/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('plusadmin/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Custom js for this page -->
    <script src="{{ asset('plusadmin/js/chart.js') }}"></script>
    <!-- End custom js for this page -->
  </body>