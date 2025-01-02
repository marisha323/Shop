<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Список категорий</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
    </style>
</head>
<body>
<div class="container">

    <h1 class="mt-5 mb-3">Список цветов</h1>

    <a href="{{ route('color.create') }}" class="btn btn-primary mb-3">Добавить цвет</a>

    <table class="table table-dark table-hover mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Цвет</th>
            <th>Дата создания</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td>{{ $color->name }}</td>
                <td>{{ $color->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('color.edit', $color->id) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('color.destroy', $color->id) }}" method="POST" style="display:inline-block;">
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
