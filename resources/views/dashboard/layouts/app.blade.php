@php
    $setting = \App\Models\Setting::first();
@endphp
<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path=" {{ asset('dashboard_assets') }}/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $setting?->site_name }} | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=" {{ asset('dashboard_assets') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { font-family: "IBM Plex Sans Arabic", sans-serif; }
    </style>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href=" {{ asset('dashboard_assets') }}/assets/vendor/fonts/boxicons.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href=" {{ asset('dashboard_assets') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href=" {{ asset('dashboard_assets') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href=" {{ asset('dashboard_assets') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=" {{ asset('dashboard_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    @stack('styles')
    <!-- Helpers -->
    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src=" {{ asset('dashboard_assets') }}/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset($setting?->logo) }}" alt="Brand Logo" class="w-12" />
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2"> {{ $setting?->site_name }} </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
              <a href="{{ request()->routeIs('dashboard.home') ? 'javascript:void(0)' : route('dashboard.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">الصفحة الرئيسية</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('home') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-globe"></i>
                <div data-i18n="Analytics">زيارة الموقع</div>
              </a>
            </li>

            <li class="menu-item {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
                <a href="{{ request()->routeIs('dashboard.settings.*') ? 'javascript:void(0)' : route('dashboard.settings.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-cog"></i>
                  <div data-i18n="Analytics">إعدادات الموقع</div>
                </a>
            </li>

            <li class="menu-item {{ request()->routeIs('dashboard.players.*') ? 'active' : '' }}">
              <a href="{{ request()->routeIs('dashboard.players.*') ? 'javascript:void(0)' : route('dashboard.players.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-football"></i>
                <div data-i18n="Analytics">اللاعبين</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">العناصر الرئيسية</span>
            </li>
            <li class="menu-item {{ request()->routeIs('dashboard.trainings.*') ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Account Settings">التمارين</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.trainings.index') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.trainings.index') ? 'javascript:void(0)' : route('dashboard.trainings.index') }}" class="menu-link">
                    <div data-i18n="Account">عرض التمارين</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.trainings.create') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.trainings.create') ? 'javascript:void(0)' : route('dashboard.trainings.create') }}" class="menu-link">
                    <div data-i18n="Notifications">إضافة تمرين</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item {{ request()->routeIs('dashboard.positions.*') ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-current-location"></i>
                <div data-i18n="Authentications">مراكز اللعب</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.positions.index') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.positions.index') ? 'javascript:void(0)' : route('dashboard.positions.index') }}" class="menu-link">
                    <div data-i18n="Basic">عرض المراكز</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.positions.create') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.positions.create') ? 'javascript:void(0)' : route('dashboard.positions.create') }}" class="menu-link">
                    <div data-i18n="Basic">إضافة مركز</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">المركز الإعلامي</span>
            </li>

            <li class="menu-item {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}">
              <a href="{{ request()->routeIs('dashboard.pages.*') ? 'javascript:void(0)' : route('dashboard.pages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div data-i18n="Analytics">صفحات تعرف أكثر</div>
              </a>
            </li>

            <li class="menu-item {{ request()->routeIs('dashboard.blogs.*') ? 'open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxl-blogger"></i>
                <div data-i18n="Account Settings">المقالات</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.blogs.index') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.blogs.index') ? 'javascript:void(0)' : route('dashboard.blogs.index') }}" class="menu-link">
                    <div data-i18n="Account">عرض المقالات</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.blogs.create') ? 'active' : '' }}">
                  <a href="{{ request()->routeIs('dashboard.blogs.create') ? 'javascript:void(0)' : route('dashboard.blogs.create') }}" class="menu-link">
                    <div data-i18n="Notifications">إضافة مقال</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ auth()->user()->image_url }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ auth()->user()->image_url }}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                            <small class="text-muted">{{ auth()->user()->role }}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('dashboard.profile.index') }}">
                        <i class="bx bxs-user me-2"></i>
                        <span class="align-middle">إعدادات الحساب</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('dashboard.profile.logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">تسجيل الخروج</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="text-center content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://wa.me/+201063153994" target="_blank" class="footer-link fw-bolder">Amr Achraf</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
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
    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/js/bootstrap.js"></script>
    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src=" {{ asset('dashboard_assets') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src=" {{ asset('dashboard_assets') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @stack('scripts')
    
    @if(session('success'))
        <script>
            Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "center",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){}
            }).showToast();
        </script>
    @endif
  </body>
</html>

