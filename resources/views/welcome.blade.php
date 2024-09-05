<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@extends('layouts.main_nav')

@section('title', 'Vendella Demian')

@section('styles')
    <!-- Add additional styles here if needed -->
@endsection
@section('content')
<div>
    <div class="menu">

    </div>
    <div class="slide_show">

    </div>
</div>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10 flex items-center">
            <!-- CART -->
            <form action="{{ route('cart.index') }}" method="GET">
                <button type="submit" class="btn btn-primary">View Cart</button>
            </form>

            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 m-3 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">Register</a>
                @endif
            @endauth

            <!-- ADMIN PANEL -->
            <a href="{{ route('admin.index') }}" class="bg-white m-2 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 mr-4">
                ADMIN PANEL
            </a>

            <!-- SEARCH -->
            
        </div>
    @endif

    <div class="container mt-5">
        <h1>Products</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="product-images">
                                @foreach ($product->images as $image)
                                    <img src="{{ $image->ImageUrl }}" alt="{{ $product->name }}" class="img-fluid">
                                @endforeach

                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Add additional scripts here if needed -->
@endsection