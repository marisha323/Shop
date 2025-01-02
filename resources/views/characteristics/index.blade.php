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

    <h1 class="mt-5 mb-3">Список характеристик</h1>

    <a href="{{ route('characteristics.create') }}" class="btn btn-primary mb-3">Добавить характеристику</a>

    <table class="table table-dark table-hovermt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Тип материала</th>
            <th>Высота</th>
            <th>Ширина</th>
            <th>Размер</th>
            <th>Дата создания</th>
            <th>Опции</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($characteristics as $characteristic)
            <tr>
                <td>{{ $characteristic->id }}</td>
                <td>{{ $characteristic->type_of_material }}</td>
                <td>{{ $characteristic->height }}</td>
                <td>{{ $characteristic->width }}</td>
                <td>{{ $characteristic->size_id }}</td>
                <td>{{ $characteristic->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('characteristics.edit', $characteristic->id) }}" class="btn btn-warning">Редактировать</a>

                                    <form action="{{ route('characteristics.destroy', $characteristic->id) }}" method="POST" style="display:inline-block;">
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
