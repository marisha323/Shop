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
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="count">Количество</label>
            <input type="number" class="form-control" id="count" name="count" value="{{ $product->count }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" autocomplete="off">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="category_id">Категорія:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="characteristics_id">Характеристики:</label>
            <select class="form-control" id="characteristics_id" name="characteristics_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($characteristics as $characteristic)
                    <option value="{{ $characteristic->id }}" {{ $product->characteristics_id == $characteristic->id ? 'selected' : '' }}>{{ $characteristic->type_of_material }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="discount_products_id">Знижка:</label>
            <select class="form-control" id="discount_products_id" name="discount_products_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}" {{ $product->discount_products_id == $discount->id ? 'selected' : '' }}>{{ $discount->discount }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Зберегти</button>
    </form>
</div>
</body>
@stop
