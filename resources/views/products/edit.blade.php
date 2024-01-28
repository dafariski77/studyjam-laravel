@extends('layouts.app')

@section('title', 'Update Product')
@section('content')
    @if ($product)
        <h4 class="mt-5">Tambah data Product</h4>

        {{-- Menampilkan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <p>Ada kesalahan</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Dikarenakan kita akan mengupload sebuah file ke server, oleh karena itu gunakan form enctype="multipart/form-data" --}}
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ $product->name }}">
            </div>
            <div class="mb-3 col-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <small class="text-muted">Jika tidak ingin mengubah gambar, kosongi
                    saja.</small>
            </div>
            <div class="mb-3 col-6">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock"
                    value="{{ $product->stock }}">
            </div>
            <div class="mb-3 col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price"
                    value="{{ $product->price }}">
            </div>
            <div class="mb-3 col-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ $product->description }}</textarea>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @else
        <div class="text-center mt-5">
            <p>Product tidak ditemukan.</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    @endif
@endsection
