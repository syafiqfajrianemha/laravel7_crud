@extends('layout.main')

@section('title', 'All Product')

@section('content')
    <div class="row">
        <div class="col-lg-12 text-center my-5">
            <h1>CRUD LARAVEL 7</h1>
        </div>
    </div>

    <a href="#" class="btn btn-primary mb-3">Add New Product</a>

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
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <img src="{{ asset('UploadedFile/product1.jpg') }}" alt="img" width="100">
                    </td>
                    <td>Tees Lovisa Black</td>
                    <td>Regular fit short sleeve t-shirt with rubber screenprinted</td>
                    <td>IDR {{ number_format('130000') }}</td>
                    <td>T-Shirts</td>
                    <td>
                        <a href="#" class="badge badge-pill badge-primary">detail</a>
                        <a href="#" class="badge badge-pill badge-success">edit</a>
                        <a href="#" class="badge badge-pill badge-danger">delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection