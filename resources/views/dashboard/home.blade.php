@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

    <div class="pagetitle mb-4">
      <h1>Hello, Admin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Total Users Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card sales-card h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalUsers ?? 'N/A' }}</h6>
                      <span class="text-muted small pt-2 ps-1">Total Pengguna</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Total Users Card -->

            <!-- Waste Collected Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card revenue-card h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-leaf-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalWaste ?? 0 }}<span class="text-muted small">kg</span></h6>
                      <span class="text-muted small pt-2 ps-1">Sampah Terkumpul</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Waste Collected Card -->

            <!-- Transactions Card -->
            <div class="col-lg-4 col-md-6">
              <div class="card info-card customers-card h-100">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-left-right"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $totalTransactions ?? 0 }}</h6>
                      <span class="text-muted small pt-2 ps-1">Transaksi</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Transactions Card -->

            <!-- User Statistics -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Statistik Pengguna</h5>
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Pengguna Baru',
                          data: {!! json_encode($userStats['data'] ?? []) !!},
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
                          categories: {!! json_encode($userStats['categories'] ?? []) !!},
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
                  <h5 class="card-title">Transaksi Terkini</h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pengguna</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($recentTransactions as $transaction)
                      <tr>
                        <td>{{ $transaction->created_at->format('d M Y') }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td><span class="badge bg-{{ $transaction->status == 'Completed' ? 'success' : 'warning' }}">{{ $transaction->status }}</span></td>
                      </tr>
                      @empty
                      <tr><td colspan="3" class="text-center">Tidak ada transaksi terkini.</td></tr>
                      @endforelse
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