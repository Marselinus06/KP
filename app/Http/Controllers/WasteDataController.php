<?php

namespace App\Http\Controllers;

use App\Models\WasteData;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class WasteDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

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
        return view('dashboard.wastetype_create');
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
                         ->with('success', 'Waste type added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WasteData $wasteData)
    {

        return redirect()->route('waste-data.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WasteData $wasteData)
    {
        return view('dashboard.wastetype_edit', compact('wasteData'));
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
                         ->with('success', 'Waste data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WasteData $wasteData)
    {
        try {
            $wasteData->delete();
            return redirect()->route('waste-data.index')->with('success', 'Waste data deleted successfully.');
        } catch (QueryException $e) {
            // Cek jika error disebabkan oleh foreign key constraint (SQLSTATE 23000)
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Cannot delete this waste type because it is used in other transactions.');
            }
            // Tangani error database lainnya
            return back()->with('error', 'An error occurred while deleting waste data: ' . $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }
}