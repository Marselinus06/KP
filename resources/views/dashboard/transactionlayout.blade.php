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
              <a href="{{ route('transactions.create') }}" class="btn btn-success add-btn">
                <i class="bi bi-plus-circle"></i> Add Transaction
              </a>
            </div>

            <!-- Table Start -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Transaction ID</th>
                  <th scope="col">User</th>
                  <th scope="col">Date</th>
                  <th scope="col">Total Weight (kg)</th>
                  <th scope="col">Total Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($transactions as $index => $transaction)
                  <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>#{{ $transaction->id }}</td>
                    <td>{{ $transaction->user->name ?? 'N/A' }}</td>
                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                    <td>{{ $transaction->total_weight }}</td>
                    <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td><span class="badge bg-{{ $transaction->status == 'Completed' ? 'success' : 'warning' }}">{{ $transaction->status }}</span></td>
                    <td>
                      <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                      <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                      <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                        @csrf                        
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center">No transaction data.</td>
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