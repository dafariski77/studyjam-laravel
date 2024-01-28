@extends('layouts.app')

@section('title', 'Create Product')
@section('content')
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
    <form action="{{ route('products.store') }}" method="POST" class="mt-4"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3 col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3 col-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3 col-6">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="" disabled selected>Select a category</option>
                {{-- Menampilkan data categories untuk product --}}
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
        <div class="mb-3 col-6">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3 col-6">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
