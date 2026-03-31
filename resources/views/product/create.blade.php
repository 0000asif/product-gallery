@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
    <div class="card p-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="box-title">Add New Product</h5>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Images</label>
                    <input type="file" name="images[]" id="imageInput"
                        class="form-control @error('images.*') is-invalid @enderror" multiple required>
                    @error('images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div id="preview" class="row mt-3"></div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Save Product</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            let preview = document.getElementById('preview');
            preview.innerHTML = '';

            let files = e.target.files;



            [...files].forEach(file => {
                let reader = new FileReader();

                reader.onload = function(e) {
                    let col = document.createElement('div');
                    col.classList.add('col-md-3', 'mb-3');

                    col.innerHTML = `
                <div class="card shadow-sm">
                    <img src="${e.target.result}" class="card-img-top" style="height:150px; object-fit:cover;">
                </div>
            `;

                    preview.appendChild(col);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
