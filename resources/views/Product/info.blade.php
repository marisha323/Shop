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
        <style>
            body:not(.layout-fixed) .main-sidebar {
                width: 20%; /* Нова ширина */
            }
            .color_btns{
                display: flex;
                gap: 1rem; /* Space between radio buttons */
                padding-bottom: 1rem;
            }
            .color_btns label{
                display: flex;
                align-items: center;
                height: 2rem;
                padding: 0.5rem 1rem; /* Padding around the radio buttons */
                border: 2px solid #FFF9E6; /* Match border to text colors */
                border-radius: 2rem; /* Slightly rounded corners */
                cursor: pointer; /* Cursor changes to pointer on hover */
                transition: background-color 0.3s, border-color 0.3s; /* Smooth transition */
                box-sizing: border-box;
            }
            .color_btns input[type="radio"] {
                display: none;
                position: absolute;
                box-sizing: border-box;
            }
            .color_btns label {
                border: 2px solid transparent;
                cursor: pointer;
                transition: border-color 0.3s ease;
            }



            .color_btns label:hover {
                opacity: 0.8;
                border-color: #2818bb;
            }
        </style>
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
                    <div class="color_btns">
                        @foreach($colorProduct as $index => $productColor)
                            <label class="radio_enabled {{ $loop->first ? 'active' : '' }}"
                                   style="background-color: {{ strtolower($productColor->color->name) }};">
                                <input type="radio" name="color_input" value="{{ $productColor->color->name }}" {{ $loop->first ? 'checked' : '' }}>
                            </label>
                        @endforeach
                    </div>
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
