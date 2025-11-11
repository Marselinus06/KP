@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Jenis Sampah</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('waste-data.index') }}">Waste Data</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Waste Type Edit Form</h5>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('waste-data.update', $wasteData->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="category" class="form-label">Waste Type</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $wasteData->category) }}" required>
              </div>
              <div class="mb-3">
                <label for="price_per_kg" class="form-label">Price each kg(Rp)</label>
                <input type="number" class="form-control" id="price_per_kg" name="price_per_kg" value="{{ old('price_per_kg', $wasteData->price_per_kg) }}" required>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('waste-data.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection