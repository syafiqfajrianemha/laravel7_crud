@extends('layout.main')

@section('title', 'Create Category')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('category') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" autofocus autocomplete="off" value="{{ old('name') }}">
                        @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add New</button>
                    <a href="{{ url('category') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection