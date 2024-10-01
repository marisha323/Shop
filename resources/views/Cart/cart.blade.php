<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        /* Styles here */
    </style>
</head>
<body class="antialiased">

<div class="container mt-5">
    <a href="{{ route('welcome') }}" class="btn btn-primary">Вернуться к покупкам</a>

    <h1>Cart</h1>
    @if(session('cart'))
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(session('cart') as $id => $details)
                <tr>
                    <td>
                        @if(!empty($details['images']))
                            <img src="{{ $details['images'][0]['ImageUrl'] }}" alt="{{ $details['name'] }}" class="img-fluid" style="width: 50px; height: 50px; margin-right: 10px;">
                        @endif
                        {{ $details['name'] }}
                    </td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>${{ $details['price'] }}</td>
                    <td>${{ $details['price'] * $details['quantity'] }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <strong>Total: ${{ $total }}</strong>
        </div>

        <!-- Checkout Form -->
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <input type="hidden" name="total_price" value="{{ $total }}">
            <input type="hidden" name="total_count" value="{{ count(session('cart')) }}">
            <div class="mb-3">
                <label for="index" class="form-label">Индекс</label>
                <input type="text" class="form-control" id="index" name="index">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>
            <div class="mb-3">
                <label for="post" class="form-label">Выберите почту</label>
                <select id="post" name="post_id" class="form-select">
                    <option value="" selected>Выберите почту</option>
                    @foreach($posts as $post)
                        <option value="{{ $post->id }}">{{ $post->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="postal_branch_number" class="form-label">Номер отделения почты</label>
                <input type="text" class="form-control" id="postal_branch_number" name="postal_branch_number">
            </div>


            <button type="submit" class="btn btn-outline-success">Оформить заказ</button>
        </form>



    @else
        <p>Your cart is empty.</p>
@endif

</body>
</html>
