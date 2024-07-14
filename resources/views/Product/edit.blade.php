<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Редактировать продукт</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Редактировать продукт</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название продукта</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="count">Количество</label>
            <input type="number" class="form-control" id="count" name="count" value="{{ $product->count }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" step="0.01" value="{{ $product->price }}">
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

        <button type="button" class="btn btn-success">Зберегти</button>
    </form>
</div>
</body>
@stop
