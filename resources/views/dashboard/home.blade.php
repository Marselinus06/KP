@extends('dashboard.dashboard')

@section('main')
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
@endsection