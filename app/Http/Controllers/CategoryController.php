<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // membaca semua data category
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    // menampilkan detail dari category
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    // menampilkan halaman untuk menambahkan category
    public function create()
    {
        return view('categories.create');
    }

    // handler atau logic untuk menyimpan data category baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        Category::create($data);

        // bisa juga seperti ini
        // Category::create([
        //     "name" => $request->name
        // ]);

        return redirect()->route('categories.index');
    }

    // menampilkan halaman edit category
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    // handler atau logic untuk mengubah data category yang sudah ada
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $category->update($data);

        return redirect()->route('categories.index');
    }

    // untuk menghapus category
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
