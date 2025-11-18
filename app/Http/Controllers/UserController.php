<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user admin
        $admin = User::where('role', 'admin')->orderBy('id', 'asc')->get();

        // Ambil user selain admin, urutkan berdasarkan id
        $users = User::where('role', '!=', 'admin')->orderBy('id', 'asc')->get();

        // Gabungkan admin dan user, sehingga admin selalu di atas
        $users = $admin->concat($users);

        return view('dashboard.userslayout', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', 'string', Rule::in(['user', 'admin'])],
            'alamat' => 'nullable|string',
            'nomor_telpon' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'alamat' => $request->alamat,
            'nomor_telpon' => $request->nomor_telpon,
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'New user added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'role' => ['required', 'string', Rule::in(['user', 'admin'])],
            'alamat' => 'nullable|string',
            'nomor_telpon' => 'nullable|string',
        ]);

        $data = $request->except('password');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
                         ->with('success', 'User data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        // Tambahan keamanan: Pastikan user tidak menghapus akunnya sendiri
        if ($user->id === auth()->user()->id) {
            return redirect()->route('users.index')->with('error', 'Tidak dapat menghapus akun yang sedang digunakan.');
        }

        if ($user->id === 1) {
            return redirect()->route('users.index')
                             ->with('error', 'Main admin cannot be deleted.');
        }

        try {
            $user->delete();
            return redirect()->route('users.index')
                             ->with('success', 'User successfully deleted.');
        } catch (QueryException $e) {
            // Cek jika error disebabkan oleh foreign key constraint (SQLSTATE 23000)
            if ($e->getCode() == 23000) {
                return back()->with('error', 'Tidak dapat menghapus pengguna karena masih memiliki transaksi terkait.');
            }
            // Tangani error database lainnya
            return back()->with('error', 'Terjadi kesalahan saat menghapus pengguna: ' . $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan yang tidak terduga: ' . $e->getMessage());
        }
    }
}