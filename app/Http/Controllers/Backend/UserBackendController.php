<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserBackendController extends Controller
{
    // INDEX
    public function index()
    {
       $users = User::orderBy('id', 'asc')->paginate(10);
        return view('page.backend.user.index', compact('users'));
    }

    // CREATE
    public function create()
    {
        return view('page.backend.user.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'nullable|string',
            'phonenumber' => 'nullable|string',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:6',
            'role'        => 'required|string',
            'is_active'   => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload foto
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('user', 'public');
        }

        User::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'role'        => $request->role,
            'is_active'   => $request->is_active,
            'image'       => $image
        ]);

        return redirect()->route('backend.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // SHOW (DETAIL USER)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('page.backend.user.detail', compact('user'));
    }

    // EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('page.backend.user.edit', compact('user'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'nullable|string',
            'phonenumber' => 'nullable|string',
            'email'       => 'required|email|unique:users,email,' . $id,
            'role'        => 'required|string',
            'is_active'   => 'required|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update data dasar
        $user->update([
            'name'        => $request->name,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
            'email'       => $request->email,
            'role'        => $request->role,
            'is_active'   => $request->is_active,
        ]);

        // Update password (jika diisi)
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        // Update foto (jika ada upload baru)
        if ($request->hasFile('image')) {

            // Hapus foto lama
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Upload foto baru
            $image = $request->file('image')->store('user', 'public');
            $user->update(['image' => $image]);
        }

        return redirect()->route('backend.user.index')->with('success', 'User berhasil diupdate!');
    }

    // DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('backend.user.index')->with('success', 'User berhasil dihapus!');
    }
}