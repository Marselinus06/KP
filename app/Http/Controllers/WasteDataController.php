<?php

namespace App\Http\Controllers;

use App\Models\WasteData;
use Illuminate\Http\Request;

class WasteDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wasteData = WasteData::latest()->get();
        return view('dashboard.wastedatalayout', ['waste' => $wasteData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.waste.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        WasteData::create($request->all());

        return redirect()->route('waste-data.index')
                         ->with('success', 'Jenis sampah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteData $wasteData)
    {
        // Tidak digunakan untuk saat ini, bisa di-skip
        return redirect()->route('waste-data.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WasteData $wasteData)
    {
        return view('dashboard.waste.edit', compact('wasteData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WasteData $wasteData)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
        ]);

        $wasteData->update($request->all());

        return redirect()->route('waste-data.index')
                         ->with('success', 'Data sampah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WasteData $wasteData)
    {
        $wasteData->delete();

        return redirect()->route('waste-data.index')
                         ->with('success', 'Data sampah berhasil dihapus.');
    }
}