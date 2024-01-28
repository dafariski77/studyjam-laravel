@extends('layouts.app')

@section('title', 'All Categories')
@section('content')
    <div class="d-flex justify-content-between mt-5">
        <h4>Data Category</h4>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah data</a>
    </div>
    <table class="table mt-4">
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
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="btn btn-warning">Update</a>
                        <form method="POST"
                            action="{{ route('categories.destroy', $category->id) }}"
                            class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
