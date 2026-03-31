@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card shadow p-4">
            <div class="card-body">

                <h3 class="mb-3">{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>

                @if ($product->images->count() > 0)
                    <hr>
                    <h5>Product Images</h5>

                    <div class="row">
                        @foreach ($product->images as $img)
                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $img->image) }}" class="card-img-top"
                                        style="height:180px; object-fit:cover;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images available.</p>
                @endif

            </div>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
            ← Back
        </a>

    </div>
@endsection
