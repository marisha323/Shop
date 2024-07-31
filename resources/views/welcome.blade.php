<!doctype html>
<html lang="en">
@extends('adminlte::page')
@section('content_header')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($productImages as $key => $productImage)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"
                                        aria-current="{{ $key === 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($productImages as $key => $productImage)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img src="{{ $productImage->image->ImageUrl }}" class="d-block w-100"
                                         alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                        <button id="carouselButtonPrev" class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">

                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button id="carouselButtonNext" class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h1 class="card-title mb-3 display-4" style="font-size: 50px">{{ $product->name }}</h1>
                    <p class="card-text mb-3" style="font-size: 40px">{{ $product->description }}</p>
                    <p class="card-text" style="font-size: 30px">Ціна: {{ $product->price }}</p>
                    <p class="card-text" style="font-size: 30px">Характеристика:
                    <ul>
                        <li style="font-size: 20px">Тип матеріалу : {{ $product->characteristics->type_of_material }}</li>
                        <li style="font-size: 20px">
                            Висота : {{ $product->characteristics->height }}
                        </li>
                        <li style="font-size: 20px">Ширина : {{ $product->characteristics->width }}</li>
                        <li style="font-size: 20px">Розмір : {{ $product->characteristics->size->name }}</li>
                        <li style="font-size: 20px">Бренд : {{ $product->characteristics->brand->name }}</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        var carousel = new bootstrap.Carousel(document.getElementById('carouselExampleIndicators'), {
            interval: false
        });

        document.getElementById('carouselButtonPrev').addEventListener('click', function () {
            carousel.prev();
        });

        document.getElementById('carouselButtonNext').addEventListener('click', function () {
            carousel.next();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</html>
@stop
