@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Transactions Management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Transactions</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section transactions-section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="card-header-flex">
              <h5 class="card-title">Transaction History</h5>
              <a href="#" class="btn btn-success add-btn">
                <i class="bi bi-plus-circle"></i> Add Transaction
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">User</th>
                  <th scope="col">Date</th>
                  <th scope="col">Total Weight (kg)</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">#TRX001</th>
                  <td>Andi</td>
                  <td>2024-05-21</td>
                  <td>5.2</td>
                  <td>Rp 18,200</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX002</th>
                  <td>Siti</td>
                  <td>2024-05-20</td>
                  <td>10.0</td>
                  <td>Rp 20,000</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX003</th>
                  <td>Budi Hartono</td>
                  <td>2024-05-20</td>
                  <td>7.5</td>
                  <td>Rp 26,250</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX004</th>
                  <td>Citra Lestari</td>
                  <td>2024-05-19</td>
                  <td>3.1</td>
                  <td>Rp 6,200</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX005</th>
                  <td>Dewi Anggraini</td>
                  <td>2024-05-19</td>
                  <td>12.0</td>
                  <td>Rp 42,000</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX006</th>
                  <td>Eko Prasetyo</td>
                  <td>2024-05-18</td>
                  <td>8.8</td>
                  <td>Rp 17,600</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX007</th>
                  <td>Fitriani</td>
                  <td>2024-05-18</td>
                  <td>4.5</td>
                  <td>Rp 15,750</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX008</th>
                  <td>Gunawan</td>
                  <td>2024-05-17</td>
                  <td>20.0</td>
                  <td>Rp 40,000</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX009</th>
                  <td>Hesti Wulandari</td>
                  <td>2024-05-17</td>
                  <td>6.3</td>
                  <td>Rp 22,050</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX010</th>
                  <td>Indra Wijaya</td>
                  <td>2024-05-16</td>
                  <td>2.5</td>
                  <td>Rp 5,000</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX011</th>
                  <td>Joko Susilo</td>
                  <td>2024-05-16</td>
                  <td>15.1</td>
                  <td>Rp 52,850</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX012</th>
                  <td>Kartika Sari</td>
                  <td>2024-05-15</td>
                  <td>9.0</td>
                  <td>Rp 18,000</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">#TRX013</th>
                  <td>Lia Amelia</td>
                  <td>2024-05-15</td>
                  <td>11.2</td>
                  <td>Rp 39,200</td>
                  <td><span class="badge bg-success">Completed</span></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
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