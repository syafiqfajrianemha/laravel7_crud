@extends('layout.main')

@section('title', 'Create Product')

@section('content')
<div class="row justify-content-center my-4">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" autofocus autocomplete="off" value="{{ old('name') }}">
                        @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="description" autocomplete="off">{{ old('description') }}</textarea>
                        @error('description')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="price" autocomplete="off" value="{{ old('price') }}">
                        @error('price')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_category">Category</label>
                        <select class="form-control @error('id_category') is-invalid @enderror" name="id_category"
                            id="category">
                            <option selected disabled>Choose...</option>
                            @foreach ($categories as $category)   
                            <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_category')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                name="image">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        @error('image')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add New</button>
                    <a href="{{ url('products') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection