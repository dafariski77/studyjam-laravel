@extends('layouts.app')

@section('title', $category->name ?? 'Category Not Found')

@section('content')
    @if ($category)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="text-center mt-5">
            <p>Category tidak ditemukan.</p>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    @endif
@endsection
