@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Transaction</h1>
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
                    @foreach($users as $user)
                      <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                  </select>
                </div>
              </div>

              <hr>
              <h5 class="card-title">Waste Details</h5>
              <div id="waste-details-container">
                <!-- Waste detail row will be added here by JS -->
              </div>
              <button type="button" class="btn btn-info btn-sm mt-2" id="add-waste-detail">Add Waste Item</button>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
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
document.addEventListener('DOMContentLoaded', function () {
    let detailIndex = 0;
    const container = document.getElementById('waste-details-container');
    const addButton = document.getElementById('add-waste-detail');
    const wasteData = {!! json_encode($wasteData) !!};

    function addDetailRow() {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-3', 'align-items-end');
        row.innerHTML = `
            <div class="col-md-5">
                <label for="details_${detailIndex}_waste_data_id" class="form-label">Waste Type</label>
                <select class="form-select" name="details[${detailIndex}][waste_data_id]" required>
                    <option value="" disabled selected>Select Waste Type</option>
                    ${wasteData.map(waste => `<option value="${waste.id}">${waste.category} (Rp ${waste.price_per_kg}/kg)</option>`).join('')}
                </select>
            </div>
            <div class="col-md-5">
                <label for="details_${detailIndex}_weight" class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" name="details[${detailIndex}][weight]" step="0.1" min="0.1" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.parentElement.remove()">Remove</button>
            </div>
        `;
        container.appendChild(row);
        detailIndex++;
    }

    addButton.addEventListener('click', addDetailRow);
    addDetailRow(); // Add first row initially
});
</script>
@endsection