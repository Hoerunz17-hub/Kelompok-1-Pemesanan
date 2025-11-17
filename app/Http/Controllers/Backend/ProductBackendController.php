<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductBackendController extends Controller
{
    // 📌 Tampilkan semua data
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('page.backend.product.index', compact('products'));
    }

    // 📌 Form tambah produk
    public function create()
    {
        return view('page.backend.product.create');
    }

    // 📌 Proses tambah produk
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|integer|min:0',
            'is_active' => 'required|in:active,nonactive',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'image'     => $imagePath,
            'name'      => $request->name,
            'price'     => $request->price,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // 📌 Form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('page.backend.product.edit', compact('product'));
    }

    // 📌 Proses update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|integer|min:0',
            'is_active' => 'required|in:active,nonactive',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $product = Product::findOrFail($id);

        $imagePath = $product->image;

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'image'     => $imagePath,
            'name'      => $request->name,
            'price'     => $request->price,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil diperbarui');
    }

    // 📌 Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('backend.product.index')->with('success', 'Produk berhasil dihapus');
    }
}