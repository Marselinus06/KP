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
                <span>Sign Out</span>
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
        <a class="nav-link " href="{{ url('/dashboard') }}">
          <i class="bi bi-house-door"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-trash"></i>
          <span>Waste Data</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-arrow-left-right"></i>
          <span>Transactions</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle mb-4">
      <h1>Hello, Admin</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Total Users Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1,580</h6>
                      <span class="text-muted small pt-2 ps-1">Total Users</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Total Users Card -->

            <!-- Waste Collected Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-leaf-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>12,450<span class="text-muted small">kg</span></h6>
                      <span class="text-muted small pt-2 ps-1">Waste Collected</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Waste Collected Card -->

            <!-- Transactions Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-left-right"></i>
                    </div>
                    <div class="ps-3">
                      <h6>3,200</h6>
                      <span class="text-muted small pt-2 ps-1">Transactions</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Transactions Card -->

            <!-- User Statistics -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">User Statistics</h5>
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Users',
                          data: [150, 230, 220, 270, 280, 320, 310, 380, 420],
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                          foreColor: '#9ca3af'
                        },
                        theme: {
                          mode: localStorage.getItem('darkMode') === 'enabled' ? 'dark' : 'light',
                          palette: 'palette1',
                          monochrome: { enabled: true, color: '#299E63', shadeTo: 'light', shadeIntensity: 0.65 }
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#299E63'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'category',
                          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Dec"],
                          labels: {
                            style: { colors: '#9ca3af' }
                          }
                        },
                        yaxis: {
                          labels: { style: { colors: '#9ca3af' } }
                        },
                        tooltip: {
                          x: {
                            format: 'MMM'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->
                </div>
              </div>
            </div><!-- End User Statistics -->

            <!-- Recent Transactions -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Recent Transactions</h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">User</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Apr 15, 2024</td>
                        <td>Andi</td>
                        <td><span class="badge bg-success">Completed</span></td>
                      </tr>
                      <tr>
                        <td>Apr 15, 2024</td>
                        <td>Siti</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <td>Apr 15, 2024</td>
                        <td>Buéi</td>
                        <td><span class="badge bg-success">Completed</span></td>
                      </tr>
                      <tr>
                        <td>Apr 15, 2024</td>
                        <td>Maya</td>
                        <td><span class="badge bg-success">Completed</span></td>
                      </tr>
                      <tr>
                        <td>Apr 15, 2024</td>
                        <td>Rinà</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Recent Transactions -->

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

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

</body>