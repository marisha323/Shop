@extends('adminlte::page')
@section('content_header')
    <head>
        <style>

            .container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="text"],
            input[type="number"],
            textarea,
            select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            button {
                width: 100%;
                padding: 10px;
                background-color: #28a745;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
            }
            button:hover {
                background-color: #218838;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>Створення нового продукту</h1>
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Назва продукту:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="count">Кількість:</label>
                <input type="number" id="count" name="count" required>
            </div>
            <div class="form-group">
                <label for="description">Опис:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Ціна:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="category_id">Категорія:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="characteristics_id">Характеристики:</label>
                <select name="characteristics_id" id="characteristics_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($characteristics as $characteristic)
                        <option value="{{ $characteristic->id }}">{{ $characteristic->type_of_material }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="discount_products_id">Знижка:</label>
                <select name="discount_products_id" id="discount_products_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->discount }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Додати продукт</button>
        </form>
    </div>
    </body>
@stop

