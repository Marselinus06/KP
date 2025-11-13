@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>{{ __('Waste Data Management') }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Waste Data') }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section waste-data-section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="card-header-flex">
              <h5 class="card-title">{{ __('Waste Category List') }}</h5>
              <a href="{{ route('waste-data.create') }}" class="btn btn-success add-btn">
                <i class="bi bi-plus-circle"></i> {{ __('Add Waste Type') }}
              </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">{{ __('No') }}</th>
                  <th scope="col">{{ __('Category') }}</th>
                  <th scope="col">{{ __('Price/kg') }}</th>
                  <th scope="col">{{ __('Last Updated') }}</th>
                  <th scope="col">{{ __('Actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($waste as $index => $item)
                  <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->category }}</td>
                    <td>Rp {{ number_format($item->price_per_kg, 0, ',', '.') }}</td>
                    <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                    <td>
                      <a href="{{ route('waste-data.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                      <form action="{{ route('waste-data.destroy', $item->id) }}" method="POST" class="delete-form" style="display: inline-block; margin-left: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger delete-button" title="Delete"><i class="bi bi-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center">{{ __('Tidak ada data jenis sampah.') }}</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@push('scripts')
<script>
document.addEventListener('click', function(event) {
    // Gunakan event delegation untuk menangkap klik pada tombol hapus.
    // Ini akan berfungsi bahkan jika tabel di-render ulang oleh simple-datatables.
    let target = event.target.closest('.delete-button');
    
    if (target) {
        // Mencegah form dari submit secara otomatis
        event.preventDefault();
        
        if (confirm('Anda yakin ingin menghapus data ini?')) {
            // Temukan form terdekat dan submit secara manual
            let form = target.closest('form');
            if (form) {
                form.submit();
            }
        }
    }
    });
</script>
@endpush
@endsection