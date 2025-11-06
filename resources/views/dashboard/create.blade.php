@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add New Transaction</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Transactions</a></li>
        <li class="breadcrumb-item active">Add New</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">New Transaction Form</h5>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('transactions.store') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="user_id" class="form-label">User</label>
                  <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="Pending" selected>Pending</option>
                    <option value="Completed">Completed</option>
                  </select>
                </div>
              </div>

              <hr>
              <h5 class="card-title">Waste Details</h5>
              <div id="waste-details-container">
                <!-- Waste detail rows will be added here by JS -->
              </div>

              <button type="button" class="btn btn-outline-primary mt-2" id="add-waste-row">
                <i class="bi bi-plus-circle"></i> Add Waste Item
              </button>

              <hr>
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit Transaction</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let wasteIndex = 0;
    const container = document.getElementById('waste-details-container');
    const addRowButton = document.getElementById('add-waste-row');

    const wasteOptions = `@foreach($wasteData as $waste) <option value="{{ $waste->id }}">{{ $waste->category }} (Rp {{ number_format($waste->price_per_kg, 0) }}/kg)</option> @endforeach`;

    function addWasteRow() {
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-3', 'align-items-end');
        newRow.innerHTML = `
            <div class="col-md-6">
                <label for="waste_data_id_${wasteIndex}" class="form-label">Waste Type</label>
                <select class="form-select" id="waste_data_id_${wasteIndex}" name="details[${wasteIndex}][waste_data_id]" required>
                    <option value="" disabled selected>Select Waste</option>
                    ${wasteOptions}
                </select>
            </div>
            <div class="col-md-4">
                <label for="weight_${wasteIndex}" class="form-label">Weight (kg)</label>
                <input type="number" step="0.1" class="form-control" id="weight_${wasteIndex}" name="details[${wasteIndex}][weight]" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-waste-row">Remove</button>
            </div>
        `;
        container.appendChild(newRow);
        wasteIndex++;
    }

    addRowButton.addEventListener('click', addWasteRow);

    container.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-waste-row')) {
            e.target.closest('.row').remove();
        }
    });

    // Add one row by default
    addWasteRow();
});
</script>
@endsection