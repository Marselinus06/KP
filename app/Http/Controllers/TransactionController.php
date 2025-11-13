<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\WasteData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->get();
        return view('dashboard.transactionlayout', compact('transactions'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $wasteData = WasteData::all();
        return view('dashboard.transaction_create', compact('users', 'wasteData'));
    }

    public function store(StoreTransactionRequest $request) {
        DB::beginTransaction();
        try {
            $totals = $this->calculateTotals($request->details);

            $transaction = Transaction::create([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'total_weight' => $totals['totalWeight'],
                'total_price' => $totals['totalPrice'],
            ]);

            $this->processTransactionDetails($transaction, $request->details);

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menambahkan transaksi: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Transaction $transaction) 
    {
        $users = User::where('role', 'user')->get();
        $wasteData = WasteData::all();
        $transaction->load('details'); // Load transaction details
        return view('dashboard.transaction_edit', compact('transaction', 'users', 'wasteData'));
    }

    /**
    public function update(UpdateTransactionRequest $request, Transaction $transaction) {
        ]);

        DB::beginTransaction();
        try {
            $totals = $this->calculateTotals($request->details);

            $transaction->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'total_weight' => $totals['totalWeight'],
                'total_price' => $totals['totalPrice'],
            ]);

            // Delete old details and create new ones
            $transaction->details()->delete();
            $this->processTransactionDetails($transaction, $request->details);

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui transaksi: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Calculate total weight and price from details.
     *
     * @param array $details
     * @return array
     */
    private function calculateTotals(array $details): array
    {
        $totalWeight = 0;
        $totalPrice = 0;

        // Eager load waste data to avoid N+1 queries in loop
        $wasteDataIds = array_column($details, 'waste_data_id');
        $wasteDataItems = WasteData::find($wasteDataIds)->keyBy('id');

        foreach ($details as $detail) {
            $waste = $wasteDataItems[$detail['waste_data_id']] ?? null;
            if ($waste) {
                $price = $waste->price_per_kg * $detail['weight'];
                $totalWeight += $detail['weight'];
                $totalPrice += $price;
            }
        }

        return ['totalWeight' => $totalWeight, 'totalPrice' => $totalPrice];
    }

    /**
     * Process and store transaction details.
     *
     * @param Transaction $transaction
     * @param array $details
     */
    private function processTransactionDetails(Transaction $transaction, array $details): void
    {
        $wasteDataIds = array_column($details, 'waste_data_id');
        $wasteDataItems = WasteData::find($wasteDataIds)->keyBy('id');

        foreach ($details as $detail) {
            $waste = $wasteDataItems[$detail['waste_data_id']] ?? null;
            if ($waste) {
                $price = $waste->price_per_kg * $detail['weight'];
                $detail['price'] = $price;
                $transaction->details()->create($detail);
            }
        }
    }

    public function show(Transaction $transaction)
    {
        
        $transaction->load('user', 'details.wasteData');
        return view('dashboard.transaction_show', compact('transaction'));
    }

    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus transaksi.');
        }
    }
}