<!DOCTYPE html>
<html>
<head>
    <title>Список категорий</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <a href="{{ route('admin.index') }}"
       class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">ADMIN PANEL</h2>
    </a>
    <h1 class="mt-5">Список цветов</h1>

    <table class="table table-bordered mt-3">
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
    <a href="{{ route('color.create') }}" class="btn btn-primary mb-3">Добавить цвет</a>
</div>
</body>
</html>
