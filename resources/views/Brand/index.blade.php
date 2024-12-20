<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Список брендов</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
    </style>
</head>

<body>
<div class="container">
    <h1 class="mt-5 mb-3">Список брендов</h1>
    <a href="{{ route('brand.create') }}" class="btn btn-primary mb-3">Добавить бренд</a>
    <table class="table table-dark table-hover mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Бренд</th>
            <th>Дата создания</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту категорию?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
@stop
