@extends('layouts.app')

@section('title', 'All Products')
@section('content')
    <div class="d-flex justify-content-between mt-5">
        <h4>Data Product</h4>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah data</a>
    </div>
    <div class="mt-4 d-flex row p-2 justify-content-start">
        @foreach ($products as $product)
            <div class="card mb-3 me-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                    alt="product-img" style="width: 100%; height: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"
                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {{ $product->name }}
                    </h5>
                    <p class="card-text">{{ $product->category->name }}</p>
                    <a href="{{ route('products.show', $product->id) }}"
                        class="btn btn-primary">Detail</a>
                    <a href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-warning">Update</a>
                    <form method="POST"
                        action="{{ route('products.destroy', $product->id) }}"
                        class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
