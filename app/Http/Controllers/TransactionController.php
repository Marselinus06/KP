<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\WasteData;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'details' => 'required|array|min:1',
            'details.*.waste_data_id' => 'required|exists:waste_data,id',
            'details.*.weight' => 'required|numeric|min:0.1',
        ]);

        DB::beginTransaction();
        try {
            $totalWeight = 0;
            $totalPrice = 0;

            $transaction = Transaction::create([
                'user_id' => $request->user_id,
                'status' => $request->status,
            ]);

            foreach ($request->details as $detail) {
                $waste = WasteData::find($detail['waste_data_id']);
                $price = $waste->price_per_kg * $detail['weight'];

                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'waste_data_id' => $detail['waste_data_id'],
                    'weight' => $detail['weight'],
                    'price' => $price,
                ]);

                $totalWeight += $detail['weight'];
                $totalPrice += $price;
            }

            // Update total di transaksi utama
            $transaction->update([
                'total_weight' => $totalWeight,
                'total_price' => $totalPrice,
            ]);

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $users = User::where('role', 'user')->get();
        $wasteData = WasteData::all();
        $transaction->load('details'); // Load transaction details
        return view('dashboard.transaction_edit', compact('transaction', 'users', 'wasteData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'details' => 'required|array|min:1',
            'details.*.waste_data_id' => 'required|exists:waste_data,id',
            'details.*.weight' => 'required|numeric|min:0.1',
        ]);

        DB::beginTransaction();
        try {
            $totalWeight = 0;
            $totalPrice = 0;

            $transaction->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
            ]);

            // Delete old details and create new ones
            $transaction->details()->delete();

            foreach ($request->details as $detail) {
                $waste = WasteData::find($detail['waste_data_id']);
                $price = $waste->price_per_kg * $detail['weight'];

                $transaction->details()->create([
                    'waste_data_id' => $detail['waste_data_id'],
                    'weight' => $detail['weight'],
                    'price' => $price,
                ]);

                $totalWeight += $detail['weight'];
                $totalPrice += $price;
            }

            $transaction->update([
                'total_weight' => $totalWeight,
                'total_price' => $totalPrice,
            ]);

            DB::commit();

            return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
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