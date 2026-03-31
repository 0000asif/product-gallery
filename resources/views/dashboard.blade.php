@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    @php
        $totalProduct = App\Models\Product::count();
        $totalImage = App\Models\ProductImage::count();
    @endphp
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-muted">Control your Product Gallery Manager dashboard from here.
            </p>
        </div>

        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h3>{{ $totalProduct }}</h3>
                <p>Total Product</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white p-3">
                <h3>{{ $totalImage }}</h3>
                <p>Total Uploaded Image</p>
            </div>
        </div>
    </div>
@endsection
