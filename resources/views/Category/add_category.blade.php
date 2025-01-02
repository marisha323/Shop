<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Добавить категорию</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
    </style>
</head>

<body>
<div class="container">
    <h1 class="mt-5">Добавить категорию</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название категории</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
</body>
</html>
@stop
