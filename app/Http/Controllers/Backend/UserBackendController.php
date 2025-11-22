<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserBackendController extends Controller
{
    // INDEX
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
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
            'phonenumber' => 'nullable|string|max:20',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:4',
            'role'        => 'required|in:waiters,admin,super_admin',
            'is_active'   => 'required|in:active,nonactive',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $image = $request->hasFile('image')
            ? $request->file('image')->store('user', 'public')
            : null;

        User::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
            'is_active'   => $request->is_active,
            'image'       => $image,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // SHOW
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
            'phonenumber' => 'nullable|string|max:20',
            'email'       => 'required|email|unique:users,email,' . $id,
            'role'        => 'required|in:waiters,admin,super_admin',
            'is_active'   => 'required|in:active,nonactive',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'    => 'nullable|string|min:4'
        ]);

        // Data dasar
        $data = $request->only(['name','address','phonenumber','email','role','is_active']);

        // Update password jika diisi
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        // Update foto jika ada
        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $request->file('image')->store('user', 'public');
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate!');
    }

    // DELETE
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    // TOGGLE STATUS
    public function toggle($id)
    {
        $user = User::findOrFail($id);

        $user->is_active = $user->is_active === 'active' ? 'nonactive' : 'active';
        $user->save();

        return back()->with('success', 'Status user berhasil diubah!');
    }
}