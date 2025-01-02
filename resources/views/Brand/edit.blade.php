<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Редактировать бренд</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Редактировать бренд</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brand.update', $brand->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Название бренда</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $brand->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
</body>
</html>
@stop
