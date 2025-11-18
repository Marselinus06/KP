@extends('dashboard.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Transaction Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transactions.index') }}">Transactions</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Transaction #{{ $transaction->id }}</h5>

            <div class="row mb-3">
                <div class="col-md-3 fw-bold">User:</div>
                <div class="col-md-9">{{ $transaction->user->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Date:</div>
                <div class="col-md-9">{{ $transaction->created_at->format('d F Y, H:i') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Status:</div>
                <div class="col-md-9"><span class="badge bg-{{ $transaction->status == 'Completed' ? 'success' : 'warning' }}">{{ $transaction->status }}</span></div>
            </div>

            <hr>
            <h5 class="card-title">Waste Details</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th>Waste Type</th>
                        <th>Weight</th>
                        <th>Price/kg</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaction->details as $detail)
                    <tr>
                        <td>{{ $detail->wasteData->category }}</td>
                        <td>{{ $detail->weight }} kg</td>
                        <td>Rp {{ number_format($detail->wasteData->price_per_kg, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td>Total</td>
                        <td>{{ number_format($transaction->total_weight, 2, ',', '.') }} kg</td>
                        <td colspan="2" class="text-end">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

            <div class="text-end mt-4">
                <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection