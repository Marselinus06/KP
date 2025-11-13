<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MallSampah</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('images/dashboard/faviconMS.png') }}" rel="icon">
  <link href="{{ asset('images/dashboard/faviconMS.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('images/dashboard/faviconMS.png') }}" rel="android-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('images/dashboard/MallSampahLogo.png') }}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link nav-icon" href="#" id="darkModeToggle">
            <i class="bi bi-brightness-high" id="darkModeIcon"></i>
          </a>
        </li>

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('images/dashboard/user.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Administrator</h6>
              <span>MallSampah</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>{{ __('Sign Out') }}</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }}" href="{{ url('/dashboard') }}">
          <i class="bi bi-house-door"></i>
          <span>{{ __('Dashboard') }}</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('users') ? '' : 'collapsed' }}" href="{{ url('/users') }}">
          <i class="bi bi-people"></i>
          <span>{{ __('Users') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('waste-data') ? '' : 'collapsed' }}" href="{{ url('/waste-data') }}">
          <i class="bi bi-trash"></i>
          <span>{{ __('Waste Data') }}</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('transactions') ? '' : 'collapsed' }}" href="{{ url('/transactions') }}">
          <i class="bi bi-arrow-left-right"></i>
          <span>{{ __('Transactions') }}</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  @yield('main')

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    @if (session('success'))
    <div id="success-toast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          {{ session('success') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
    @endif
  </div>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MallSampah</span></strong>. All Rights Reserved
    </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var successToast = document.getElementById('success-toast');
      if (successToast) {
        var toast = new bootstrap.Toast(successToast);
        toast.show();
      }
    });
  </script>

  <script>
    document.addEventListener('click', function(event) {
        let target = event.target.closest('.delete-button');

        if (target) {
            event.preventDefault();

            if (confirm('Anda yakin ingin menghapus item ini?')) {
                let form = target.closest('form');
                if (form) {
                    form.submit();
                }
            }
        }
    });
  </script>

  
  @stack('scripts')

</body>