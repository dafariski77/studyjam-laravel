@extends('layouts.app')

@section('title', 'Create Category')
@section('content')
    <h4 class="mt-5">Tambah data Category</h4>

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

    <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3 col-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
