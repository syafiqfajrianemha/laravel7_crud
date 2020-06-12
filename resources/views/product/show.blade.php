@extends('layout.main')

@section('title', 'Detail Product')

@section('content')
<div class="card my-4 shadow-sm">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('UploadedFile/' . $product->image ) }}" alt="img" width="500">
            </div>

            <div class="col-lg-6">
                <h1 class="card-title">{{ $product->name }}</h1>
                <hr>
                <h4>IDR {{ number_format($product->price) }}</h4>
                <hr>
                <p class="card-text">{!! nl2br($product->description) !!}</p>
                <p class="text-muted">Category : {{ $product->category }}</p>

                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection