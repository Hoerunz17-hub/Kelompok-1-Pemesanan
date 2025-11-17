<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserBackendController extends Controller
{
    // 📌 Tampilkan semua user
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('page.backend.user.index', compact('users'));
    }

    // 📌 Form tambah user
    public function create()
    {
        return view('page.backend.user.create');
    }

    // 📌 Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name'         => 'required|string|max:255',
            'address'      => 'nullable|string|max:255',
            'phonenumber'  => 'nullable|string|max:20',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6',
            'role'         => 'required|in:waiter,kasir,admin,super admin',
            'is_active'    => 'required|in:active,nonactive',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        User::create([
            'image'       => $imagePath,
            'name'        => $request->name,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil ditambahkan');
    }

    // 📌 Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('page.backend.user.edit', compact('user'));
    }

    // 📌 Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name'         => 'required|string|max:255',
            'address'      => 'nullable|string|max:255',
            'phonenumber'  => 'nullable|string|max:20',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'password'     => 'nullable|string|min:6',
            'role'         => 'required|in:waiter,kasir,admin,super admin',
            'is_active'    => 'required|in:active,nonactive',
        ]);

        $imagePath = $user->image;

        if ($request->hasFile('image')) {

            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $imagePath = $request->file('image')->store('users', 'public');
        }

        // update password hanya jika diisi
        $password = $user->password;
        if ($request->filled('password')) {
            $password = Hash::make($request->password);
        }

        $user->update([
            'image'       => $imagePath,
            'name'        => $request->name,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
            'email'       => $request->email,
            'password'    => $password,
            'role'        => $request->role,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil diperbarui');
    }

    // 📌 Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User berhasil dihapus');
    }
}
