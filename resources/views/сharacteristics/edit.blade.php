<!DOCTYPE html>
<html>
<head>
    <title>Редактировать характеристику</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Редактировать </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('characteristics.update', $characteristic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $characteristic->title }}" required>
        </div>
        <div class="form-group">
            <label for="type_of_material">Type of Material</label>
            <input type="text" class="form-control" id="type_of_material" name="type_of_material" value="{{ $characteristic->type_of_material }}" required>
        </div>
        <div class="form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control" id="height" name="height" value="{{ $characteristic->height }}" required>
        </div>
        <div class="form-group">
            <label for="width">Width</label>
            <input type="text" class="form-control" id="width" name="width" value="{{ $characteristic->width }}" required>
        </div>
        <div class="form-group">
            <label for="size_id">Size</label>
            <select class="form-control" id="size_id" name="size_id" required>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" {{ old('size_id') == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_id">Brand</label>
            <select class="form-control" id="brand_id" name="brand_id" required>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
</body>
</html>
