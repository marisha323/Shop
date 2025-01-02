<!doctype html>
<html lang="en">
@extends('adminlte::page')
@section('content_header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список Размеров</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Список категорий</h1>
    <a href="{{ route('size.add') }}" class="btn btn-primary mb-3">Добавить размер</a>
<table class="table table-dark table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название размера</th>
        <th>Дата создания</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($sizes as $size)
        <tr>
            <td>{{ $size->id }}</td>
            <td>{{ $size->name }}</td>
            <td>{{ $size->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <a href="{{ route('category.edit', $size->id) }}" class="btn btn-warning">Редактировать</a>

                <form action="{{ route('category.destroy', $size->id) }}" method="POST" style="display:inline-block;">
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
