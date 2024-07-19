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
    <h1 class="mt-5">Список характеристик</h1>

    <table class="table table-bordered mt-3">
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
    <a href="{{ route('characteristics.create') }}" class="btn btn-primary mb-3">Добавить характеристику</a>
</div>
</body>
</html>
