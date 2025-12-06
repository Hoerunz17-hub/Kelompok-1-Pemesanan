<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductBackendController extends Controller
{
    //Tampilkan semua data
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('page.backend.product.index', compact('products'));
    }

   //Form create
    public function create()
    {
        $products = Product::all(); // mengikuti pola Aboutus::all()
        return view('page.backend.product.create', compact('products'));
    }

    //Store data baru
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|integer|min:0',
            'category'  => 'required|in:Makanan Pembuka,Menu Utama,Makanan Penutup',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $dataproduct_store = [
            'name'      => $request->name,
            'price'     => $request->price,
            'category'  => $request->category,
        ];

        if ($request->hasFile('image')) {
            $dataproduct_store['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($dataproduct_store);

        return redirect('/product')->with('success', 'Produk berhasil ditambahkan');
    }

    //Delete data
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {

            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $product->delete();

            return redirect('/product')->with('success', 'Produk berhasil dihapus');
        }
    }

    //Form edit
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan');
        }

        return view('page.backend.product.edit', compact('product'));
    }

    //Update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'price'     => 'required|integer|min:0',
            'category'  => 'required|in:Makanan Pembuka,Menu Utama,Makanan Penutup',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $product = Product::find($id);

        $dataproduct_update = [
            'name'      => $request->name,
            'price'     => $request->price,
            'category'  => $request->category,
        ];

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $dataproduct_update['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($dataproduct_update);

        return redirect('/product')->with('success', 'Produk berhasil diperbarui');
    }

    //Toggle status
    public function toggle(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->is_active = $request->status == 1 ? 'active' : 'nonactive';
        $product->save();

        return response()->json([
            'success' => true,
            'is_active' => $product->is_active
        ]);
    }
}
