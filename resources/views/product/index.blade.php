@extends('layout.main')

@section('title', 'All Product')

@section('content')

<div id="flash-data" data-flashdata="{{ session('message') }}"></div>

<a href="{{ url('products/create') }}" class="btn btn-primary my-3">Add New Product</a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <th scope="row">{{ ++$no }}</th>
                <td>
                    <img src="{{ asset('UploadedFile/' . $product->image) }}" alt="img" width="100">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>IDR {{ number_format($product->price) }}</td>
                <td>{{ $product->categories->name }}</td>
                <td>
                    <a href="{{ url('products/' . $product->id) }}" class="badge badge-pill badge-primary">detail</a>
                    <a href="{{ url('products/' . $product->id . '/edit') }}"
                        class="badge badge-pill badge-success">edit</a>
                    <form action="{{ url('products/' . $product->id) }}" method="POST" class="d-inline form-delete">
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

<div class="row">
    <div class="col-auto mr-auto">
        @if (!$total_product == 0)
        <strong>Total Product : {{ $total_product }}</strong>
        @endif
    </div>
    <div class="col-auto">
        {{ $products->links() }}
    </div>
</div>
@endsection