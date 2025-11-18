@extends('dashboard.layouts.main')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Transaction</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Transactions</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Transaction Form</h5>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="user_id" class="form-label">User</label>
                  <select class="form-select" id="user_id" name="user_id" required>
                    <option value="" disabled>Select User</option>
                    @foreach($users as $user)
                      <option value="{{ $user->id }}" {{ old('user_id', $transaction->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="Pending" {{ old('status', $transaction->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ old('status', $transaction->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ old('status', $transaction->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                  </select>
                </div>
              </div>

              <hr>
              <h5 class="card-title">Waste Details</h5>
              <div id="waste-details-container">
                @foreach($transaction->details as $index => $detail)
                <div class="row mb-3 align-items-end existing-detail">
                    <div class="col-md-5">
                        <label for="details_{{ $index }}_waste_data_id" class="form-label">Waste Type</label>
                        <select class="form-select" name="details[{{ $index }}][waste_data_id]" required>
                            <option value="" disabled>Select Waste Type</option>
                            @foreach($wasteData as $wasteItem)
                                <option value="{{ $wasteItem->id }}" data-price="{{ $wasteItem->price_per_kg }}" {{ old("details.{$index}.waste_data_id", $detail->waste_data_id) == $wasteItem->id ? 'selected' : '' }}>{{ $wasteItem->category }} (Rp {{ number_format($wasteItem->price_per_kg, 0, ',', '.') }}/kg)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="details_{{ $index }}_weight" class="form-label">Weight (kg)</label>
                        <input type="number" class="form-control" name="details[{{ $index }}][weight]" step="0.1" min="0.1" value="{{ old("details.{$index}.weight", $detail->weight) }}" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm" onclick="this.parentElement.parentElement.remove()">Remove</button>
                    </div>
                </div>
                @endforeach
              </div>
              <button type="button" class="btn btn-info btn-sm mt-2" id="add-waste-detail">Add Waste Item</button>

              <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Transaction</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div> {{-- End card-body --}}
        </div> {{-- End card --}}
      </div> {{-- End col-lg-12 --}}
    </div> {{-- End row --}}
  </section> {{-- End section --}}

  {{-- Template untuk satu baris item sampah baru (disembunyikan) --}}
  <template id="waste-item-template">
      <div class="row mb-3 align-items-end waste-item-row">
        <div class="col-md-5">
            <label class="form-label">Waste Type</label>
            <select class="form-select" name="details[0][waste_data_id]" required>
                <option value="" disabled selected>Select Waste Type</option>
                @foreach($wasteData as $wasteItem)
                    <option value="{{ $wasteItem->id }}" data-price="{{ $wasteItem->price_per_kg }}">{{ $wasteItem->category }} (Rp {{ number_format($wasteItem->price_per_kg, 0, ',', '.') }}/kg)</option>
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
        let wasteItemIndex = {{ count($transaction->details) }}; // Inisialisasi dengan jumlah detail yang sudah ada

        addButton.addEventListener('click', function () {
            // Clone seluruh konten dari template
            const newRow = template.content.cloneNode(true);

            // Update 'name' attribute untuk select dan input
            const select = newRow.querySelector('select');
            const input = newRow.querySelector('input');
            select.name = `details[${wasteItemIndex}][waste_data_id]`;
            input.name = `details[${wasteItemIndex}][weight]`;

            newRow.querySelector('.remove-waste-item').addEventListener('click', () => newRow.remove()); // Tambahkan event listener untuk tombol remove
            container.appendChild(newRow);
            wasteItemIndex++;
        });
    });
</script>
@endpush
@endsection