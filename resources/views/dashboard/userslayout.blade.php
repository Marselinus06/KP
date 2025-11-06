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
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="card-header-flex">
              <h5 class="card-title">Data Pengguna (Total: {{ count($users) }})</h5>
              <a href="{{ route('users.create') }}" class="btn btn-success add-btn">
                <i class="bi bi-plus-circle"></i> Tambah Pengguna
              </a>
            </div>

            <!-- Table Start -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Peran</th>
                  <th scope="col">Nomor Telepon</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $index => $user)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td><span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'secondary' }}">{{ ucfirst($user->role) }}</span></td>
                  <td>{{ $user->nomor_telpon ?? 'N/A' }}</td>
                  <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" {{ $user->id === 1 ? 'disabled' : '' }}><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                  <tr>
                    <td colspan="6" class="text-center">Tidak ada data pengguna.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Table -->

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection