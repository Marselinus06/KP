@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Waste Type</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('waste-data.index') }}">Waste Data</a></li>
        <li class="breadcrumb-item active">Add New</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">New Waste Type Form</h5>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('waste-data.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="category" class="form-label">Waste Type</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" required>
              </div>
              <div class="mb-3">
                <label for="price_per_kg" class="form-label">Price each kg(Rp)</label>
                <input type="number" class="form-control" id="price_per_kg" name="price_per_kg" value="{{ old('price_per_kg') }}" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('waste-data.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection