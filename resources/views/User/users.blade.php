<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
    <head>
        <title>Список пользователей</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h1 class="mt-5 mb-3">Список пользователей</h1>
{{--        <a href="{{ route('category.add_category') }}" class="btn btn-primary mb-3">Добавить категорию</a>--}}
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Почта</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Редактировать</a>

                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">Удалить</button>
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
