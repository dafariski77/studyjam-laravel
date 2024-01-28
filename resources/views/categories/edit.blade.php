@extends('layouts.app')

@section('title', 'Update Category')
@section('content')
    @if ($category)
        <h4 class="mt-5">Update data Category</h4>

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

        <form action="{{ route('categories.update', $category->id) }}" method="POST"
            class="mt-4">
            @method('PUT')
            @csrf
            <div class="mb-3 col-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ $category->name }}">
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Cancel
            </a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @else
        <div class="text-center mt-5">
            <p>Category tidak ditemukan.</p>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    @endif
@endsection
