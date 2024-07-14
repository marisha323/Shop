<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Список категорий</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Список категорий</h1>
    <a href="{{ route('category.add_category') }}" class="btn btn-primary mb-3">Добавить категорию</a>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название категории</th>
            <th>Дата создания</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->created_at->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
