<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
    <head>
        <title>Список продуктов</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h1 class="mt-5 mb-3">Список продуктов</h1>

        <a href="{{ route('admin.create_product') }}" class="btn btn-primary mb-3">Добавить продукт</a>

        <table class="table table-dark table-hover">

            <thead>
            <tr>
                <th>ID</th>
                <th>Название продукта</th>
                <th>Количество</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Дата создания</th>
                <th colspan="4">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->count }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <td>
                            <a href="{{ route('product.info', $product->id) }}" class="btn btn-info">Перегляд</a>
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">Удалить</button>
                            </form>
                        </td>

                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </body>
</html>
@stop
