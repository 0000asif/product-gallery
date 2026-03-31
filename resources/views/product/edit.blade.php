@extends('layouts.app')

@section('content')

    <div class="card p-4">

        <div class="card-header d-flex justify-content-between">
            <h5 class="box-title">Edit Product</h5>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>

        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}"
                        class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if ($product->images->count() > 0)
                    <div class="mb-3">
                        <label>Existing Images</label>
                        <div class="row" id="product-images">
                            @foreach ($product->images as $img)
                                <div class="col-md-3 mb-3" id="image-{{ $img->id }}">
                                    <div class="card shadow-sm position-relative">
                                        <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top"
                                            style="height:150px; object-fit:cover;">

                                        <button type="button"
                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 delete-image"
                                            data-id="{{ $img->id }}" data-url="{{ route('image.delete', $img->id) }}">
                                            ✕
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <label>Add More Images</label>
                    <input type="file" name="images[]" id="editImageInput"
                        class="form-control @error('images.*') is-invalid @enderror" multiple>
                    @error('images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div id="editPreview" class="row mt-3"></div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Save Product</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('editImageInput').addEventListener('change', function(e) {
            let preview = document.getElementById('editPreview');
            preview.innerHTML = '';

            [...e.target.files].forEach(file => {
                let reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML += `
                <div class="col-md-3 mb-3">
                    <div class="card shadow-sm">
                        <img src="${e.target.result}" class="card-img-top" style="height:150px; object-fit:cover;">
                    </div>
                </div>
            `;
                };

                reader.readAsDataURL(file);
            });
        });

        $(document).ready(function() {
            $(document).on('click', '.delete-image', function(e) {
                e.preventDefault();

                let button = $(this);
                let imageId = button.data('id');
                let url = button.data('url');

                if (!confirm('Are you sure you want to delete this image?')) return;

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        _method: 'DELETE'
                    },
                    success: function(response) {
                        $('#image-' + imageId).fadeOut(300, function() {
                            $(this).remove();
                        });
                    },
                    error: function(xhr) {
                        alert('Failed to delete the image.');
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
