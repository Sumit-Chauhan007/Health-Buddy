<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ URL::asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script> -->

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ URL::asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" >
            <a href="/" class="app-brand-link" >
                <img src="/admin.png" alt="" style="width: 220px;margin-left:-32px ">
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item ">
              <a href="/admin-dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Users -->

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Blogs</span>
            </li>
            <li class="menu-item ">
                <a href="/starting" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home"></i>
                  <div data-i18n="Analytics">Starting</div>
                </a>
              </li>
            <li class="menu-item ">
                <a href="/first-blog" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">1st blog</div>
                </a>
              </li>
            <li class="menu-item ">
                <a href="/medical-services-blog" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-first-aid"></i>
                  <div data-i18n="Analytics">Medical Servies</div>
                </a>
              </li>
            <li class="menu-item ">
                <a href="/abc-blog" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-book-open"></i>
                  <div data-i18n="Analytics">ABC Blog</div>
                </a>
              </li>
            <li class="menu-item ">
                <a href="/contact-blog" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-book"></i>
                  <div data-i18n="Analytics">Contact Us Blog</div>
                </a>
              </li>
            <li class="menu-item ">
                <a href="/team-blog" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Analytics">Team Blog</div>
                </a>
              </li>
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Testimonials</span>
              </li>
            <li class="menu-item ">
                <a href="/testimonial" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-bookmark"></i>
                  <div data-i18n="Analytics">Testimonials</div>
                </a>
              </li>
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Records</span>
              </li>
            <li class="menu-item ">
                <a href="/user-contact" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-book-open"></i>
                  <div data-i18n="Analytics">User Contact </div>
                </a>
              </li>

            <!-- Extended components -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Accounts</span>
              </li>
            <li class="menu-item ">
                <a href="admin-profile" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-dock-top"></i>
                  <div data-i18n="Account Settings">Account Settings</div>
                </a>
              </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              {{-- <form onSubmit='pageSearch(event)'>
                <div class="navbar-nav align-items-center">
                  <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                      <input autocomplete="off" id="myInput" type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."  />
                  </div>
                </div>
              </form> --}}
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    @if (!Auth::user()->profile_photo_path)
<img src="{{ URL::asset('assets/images/users/avatar.jpg') }}" class="w-px-40 h-auto rounded-circle">
@else
<img src="{{ URL::asset('assets/images/users/') }}/{{ Auth::user()->profile_photo_path }}" alt="user" class="w-px-40 h-auto rounded-circle">
@endif
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                            @if (!Auth::user()->profile_photo_path)
<img src="{{ URL::asset('assets/images/users/avatar.jpg') }}" class="w-px-40 h-auto rounded-circle">
@else
<img src="{{ URL::asset('assets/images/users/') }}/{{ Auth::user()->profile_photo_path }}" alt="user" class="w-px-40 h-auto rounded-circle">
@endif
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="/admin-profile">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <!-- <a class="dropdown-item" href="auth-login-basic.html">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </a> -->
                            <button class="dropdown-item"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span></button>
                        </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          @yield('main-content')
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ URL::asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ URL::asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ URL::asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ URL::asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        $(document).ready(function() {
            $('#services').DataTable();
        });

        setTimeout(function() {
            $('#alert').hide();

        }, 3000);

        var url = window.location.pathname;
        if (url == '/') {
            // console.log(url);
        } else {
            urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
            $('.menu-link').each(function() {
                // and test its normalized href against the url pathname regexp
                if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                    $(this).parent().addClass('active');
                    $(this).closest('.leader').addClass('active open');
                }
            });
            // console.log(url);
        }

        function pageSearch(e) {
            event.preventDefault();
            let input = $("#myInput").val() //Takes the textbox textmy search text
            var data = window.find(input);
            // window.location = 'http://www.google.com/search?q= ' + document.getElementById('myInput').value; // to redirect search on google
            // return false;
        }
    </script>
  </body>
</html>
