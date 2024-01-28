<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // mendapatkan semua data product dan mengakses relasi ke tabel category menggunakan with()
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        // mendapatkan data single product dan mengakses relasi ke tabel category menggunakan with()
        $product = Product::with('category')->find($id);

        return view('products.show', compact('product'));
    }

    public function create()
    {
        // mendapatkan semua data category agar nanti bisa ditampilkan pada form pemilihan category product
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],

            // data category_id harus ada pada kolom id di tabel category 
            'category_id' => ['required', 'exists:categories,id'],

            // validasi image harus berupa gambar
            'image' => ['required', 'image'],
        ]);

        // sebelumnya pastikan sudah menjalankan perintah php artisan storage:link
        if ($request->hasFile('image')) {
            // mendapatkan data image dari request client lalu menyimpannya ke aplikasi laravel pada products/images yang berada di folder storage/app/public
            $imagePath = $request->file('image')->store('products/images', 'public');

            // mengubah nilai dari image yang ada pada array $data menjadi $imagePath yang memiliki value lokasi penyimpanan image tadi
            $data['image'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        // mendapatkan data single product dan mengakses relasi ke tabel category menggunakan with()
        $product = Product::with('category')->find($id);

        // mendapatkan semua data category agar nanti bisa ditampilkan pada form pemilihan category product
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // mendapatkan data single product 
        $product = Product::find($id);

        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],

            // data category_id harus ada pada kolom id di tabel category 
            'category_id' => ['required', 'exists:categories,id'],

            // validasi image harus berupa gambar
            'image' => ['image'],
        ]);

        // mengecek apakah ada perubahan pada image, jika ada maka akan menjalankan kondisi berikut
        if ($request->hasFile('image')) {
            // menghapus terlebih dahulu gambar yang lama
            Storage::disk('public')->delete($product->image);

            // mendapatkan data image dari request client lalu menyimpannya ke aplikasi laravel pada products/images yang berada di folder storage/app/public
            $imagePath = $request->file('image')->store('products/images', 'public');

            // mengubah nilai dari image yang ada pada array $data menjadi $imagePath yang memiliki value lokasi penyimpanan image tadi
            $data['image'] = $imagePath;
        }

        // mengupdate data product
        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        // mendapatkan data single product 
        $product = Product::find($id);

        // menghapus gambar product
        Storage::disk('public')->delete($product->image);

        // menghapus data product
        $product->delete();

        return redirect()->route('products.index');
    }
}
