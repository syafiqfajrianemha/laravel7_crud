@extends('layout.main')

@section('title', 'Categories')

@section('content')

<div id="flash-data" data-flashdata="{{ session('message') }}"></div>

<a href="{{ url('category/create') }}" class="btn btn-primary my-3">Add New Category</a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ url('category/' . $category->id . '/edit') }}"
                        class="badge badge-pill badge-success">edit</a>
                    <form action="{{ url('category/' . $category->id) }}" method="POST" class="d-inline form-delete">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="badge badge-pill badge-danger">delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <td colspan="4">Records not found</td>
            @endforelse
        </tbody>
    </table>
</div>
@endsection