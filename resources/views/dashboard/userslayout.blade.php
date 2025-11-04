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
              <h6>1,580</h6>
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
                  <th scope="col">Nomor</th>
                  <th scope="col">Name</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Nomor Telpon</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $users = [
                      ['Andi Saputra', 'Jl. Merdeka No. 1, Jakarta', '081234567890'],
                      ['Budi Hartono', 'Jl. Sudirman No. 2, Bandung', '081234567891'],
                      ['Citra Lestari', 'Jl. Gatot Subroto No. 3, Surabaya', '081234567892'],
                      ['Dewi Anggraini', 'Jl. Diponegoro No. 4, Semarang', '081234567893'],
                      ['Eko Prasetyo', 'Jl. Pahlawan No. 5, Yogyakarta', '081234567894'],
                      ['Fitriani', 'Jl. Ahmad Yani No. 6, Medan', '081234567895'],
                      ['Gunawan', 'Jl. Imam Bonjol No. 7, Makassar', '081234567896'],
                      ['Hesti Wulandari', 'Jl. Teuku Umar No. 8, Palembang', '081234567897'],
                      ['Indra Wijaya', 'Jl. Gajah Mada No. 9, Denpasar', '081234567898'],
                      ['Joko Susilo', 'Jl. Asia Afrika No. 10, Jakarta', '081234567899'],
                      ['Kartika Sari', 'Jl. Cihampelas No. 11, Bandung', '081345678900'],
                      ['Lia Amelia', 'Jl. Tunjungan No. 12, Surabaya', '081345678901'],
                      ['Muhammad Rizky', 'Jl. Pandanaran No. 13, Semarang', '081345678902'],
                      ['Nadia Putri', 'Jl. Malioboro No. 14, Yogyakarta', '081345678903'],
                      ['Oscar Mahendra', 'Jl. Sisingamangaraja No. 15, Medan', '081345678904'],
                      ['Putri Ayu', 'Jl. Sultan Hasanuddin No. 16, Makassar', '081345678905'],
                      ['Rian Hidayat', 'Jl. Jenderal Sudirman No. 17, Palembang', '081345678906'],
                      ['Siska Permata', 'Jl. Sunset Road No. 18, Denpasar', '081345678907'],
                      ['Taufik Akbar', 'Jl. Kebon Sirih No. 19, Jakarta', '081345678908'],
                      ['Utari Dewi', 'Jl. Braga No. 20, Bandung', '081345678909'],
                  ];
                @endphp
                @foreach ($users as $index => $user)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $user[0] }}</td>
                  <td>{{ $user[1] }}</td>
                  <td>{{ $user[2] }}</td>
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