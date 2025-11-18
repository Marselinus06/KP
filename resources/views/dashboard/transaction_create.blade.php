@extends('dashboard.dashboard') {{-- Sesuaikan dengan layout utama Anda --}}

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
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
                    <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                  </select>
                </div>
              </div>

              <hr>
              <h5 class="card-title">Waste Details</h5>
              <div id="waste-details-container">
                {{-- Baris item sampah akan ditambahkan di sini oleh JavaScript --}}              
              </div>              
              <button type="button" class="btn btn-secondary btn-sm mt-2" id="add-waste-detail">+ Add Waste Item</button>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Save Transaction</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Template untuk satu baris item sampah (disembunyikan) --}}
  <template id="waste-item-template">
    <div class="row mb-3 align-items-end waste-item-row">
        <div class="col-md-5">
            <label class="form-label">Waste Type</label>
            <select class="form-select" name="details[0][waste_data_id]" required>
                <option value="" disabled selected>Select Waste Type</option>
                @foreach($wasteData as $waste)
                    <option value="{{ $waste->id }}">{{ $waste->category }} (Rp {{ number_format($waste->price_per_kg, 0, ',', '.') }}/kg)</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label">Weight (kg)</label>
            <input type="number" class="form-control" name="details[0][weight]" step="0.1" min="0.1" required>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-sm remove-waste-item">Remove</button>
        </div>
    </div>
  </template>
</main>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('waste-details-container');
    const addButton = document.getElementById('add-waste-detail');
    const template = document.getElementById('waste-item-template');
    let wasteItemIndex = 0;

    function addWasteItemRow() {
        const newRow = template.content.cloneNode(true);
        const select = newRow.querySelector('select');
        const input = newRow.querySelector('input');
        select.name = `details[${wasteItemIndex}][waste_data_id]`;
        input.name = `details[${wasteItemIndex}][weight]`;

        const rowElement = newRow.querySelector('.waste-item-row');
        rowElement.querySelector('.remove-waste-item').addEventListener('click', () => rowElement.remove());
        container.appendChild(rowElement);
        wasteItemIndex++;
    }

    addButton.addEventListener('click', addWasteItemRow);

    addWasteItemRow();
});
</script>
@endpush
@endsection