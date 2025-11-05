@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Users Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section users-section">
    <div class="row">
      <!-- Total Users Card -->
      <div class="col-lg-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6>{{ count($users) }}</h6>
              <span class="text-muted small pt-2 ps-1">Total Users</span>
            </div>
          </div>
        </div>
      </div>
      <!-- End Total Users Card -->

      <!-- User Statistics -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User Statistics</h5>
            <!-- Line Chart -->
            <div id="reportsChart"></div>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                  series: [{
                    name: 'New Users',
                    data: [150, 230, 220, 270, 280, 320, 310, 380, 420],
                  }],
                  chart: {
                    height: 350,
                    type: 'area',
                    toolbar: { show: false },
                    foreColor: '#9ca3af'
                  },
                  theme: {
                    mode: localStorage.getItem('darkMode') === 'enabled' ? 'dark' : 'light',
                    palette: 'palette1',
                    monochrome: { enabled: true, color: '#299E63', shadeTo: 'light', shadeIntensity: 0.65 }
                  },
                  markers: { size: 4 },
                  colors: ['#299E63'],
                  fill: {
                    type: "gradient",
                    gradient: { shadeIntensity: 1, opacityFrom: 0.3, opacityTo: 0.4, stops: [0, 90, 100] }
                  },
                  dataLabels: { enabled: false },
                  stroke: { curve: 'smooth', width: 2 },
                  xaxis: {
                    type: 'category',
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Dec"],
                    labels: { style: { colors: '#9ca3af' } }
                  },
                  yaxis: { labels: { style: { colors: '#9ca3af' } } },
                  tooltip: { x: { format: 'MMM' } }
                }).render();
              });
            </script>
            <!-- End Line Chart -->
          </div>
        </div>
      </div><!-- End User Statistics -->

      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User Data</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Nomor Telpon</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $index => $user)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->alamat ?? 'N/A' }}</td>
                  <td>{{ $user->nomor_telpon ?? 'N/A' }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection