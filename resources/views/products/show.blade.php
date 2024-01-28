@extends('layouts.app')

@section('title', 'All Products')
@section('content')
    @if ($product)
        <div class="mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
        <div class="my-5">
            <div class="row g-5">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $product->image) }}"
                        class="img-fluid rounded-3" />
                </div>
                <div class="col-md-5 pe-5">
                    <h3 class="fw-bold">
                        {{ $product->name }}
                    </h3>
                    <h5 class="fw-bold">
                        Rp {{ $product->price }}
                    </h5>
                    <h6 class="subtitle">Stock : {{ $product->stock }}</h6>
                    <h6 class="mt-5 mb-3 fw-bold">Description</h6>
                    <hr />
                    <p class="card-text">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="text-center mt-5">
            <p>Product tidak ditemukan.</p>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    @endif
@endsection
