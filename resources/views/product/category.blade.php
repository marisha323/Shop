<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <title>Document</title>
</head>
<body>
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
<div class="container">

    <h1 style="color: yellow">Категорії</h1>
    <ul>
        @foreach ($categories as $category)
            <li style="color: lightyellow"><a href="{{ route('products.showCategory', $category->id) }}">{{ $category->title }}</a></li>

        @endforeach
    </ul>

    <h1>{{ $category->title }}</h1>

    @if($category->products->isEmpty())
        <p>В даній категорії немає товарів.</p>
    @else
        <div class="products">
            @foreach($category->products as $product)
                <div class="product">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <p>Ціна: {{ $product->price }}</p>
                    <div class="images">
                        @foreach($product->images as $image)
                            <img src="{{ asset('images/' . $image->filename) }}" alt="{{ $product->name }}">
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</div>
</body>
</html>
