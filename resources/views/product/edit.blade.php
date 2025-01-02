<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
<head>
    <title>Редактировать продукт</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
        .form-group ul {
            list-style: none; /* Прибираємо маркери списку */
            padding: 0; /* Вирівнюємо відступи */
            margin: 0;
            display: flex; /* Робимо елементи в рядок */
            flex-wrap: wrap; /* Переносимо елементи на новий рядок, якщо бракує місця */
            gap: 10px; /* Відступи між елементами */
        }

        .form-group .delete_color_li {
            display: flex;
            align-items: center; /* Вирівнюємо текст і кнопку вертикально */
            background-color: #f9f9f9; /* Фон для кращого контрасту */
            border: 1px solid #ccc; /* Межа для елементів */
            border-radius: 8px; /* Заокруглення */
            padding: 5px 10px; /* Внутрішній відступ */
            color: white; /* Колір тексту */
            gap: 1rem;
            position: relative; /* Для позиціонування кнопки */
            min-width: 120px; /* Мінімальна ширина для елементів */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Тінь для об'єму */
        }

        .form-group .delete-color {
            margin-left: auto; /* Відсуваємо кнопку праворуч */
            background-color: #e74c3c; /* Червоний фон */
            border: none; /* Без рамок */
            border-radius: 4px; /* Заокруглення */
            padding: 5px 10px; /* Внутрішній відступ */
            color: #fff; /* Білий текст */
            cursor: pointer; /* Вказівник миші */
            font-size: 12px; /* Розмір шрифту */
            transition: background-color 0.2s; /* Анімація при наведенні */
        }

        .form-group .delete-color:hover {
            background-color: #c0392b; /* Темніший червоний при наведенні */
        }

        .form-group p {
            color: #666; /* Трохи затемнений текст */
            font-style: italic; /* Курсив для пустих повідомлень */
        }

        /* Контейнер для фото */
        .delete_photo_container {
            display: flex;
            flex-wrap: wrap; /* Дозволяє переносити елементи на новий рядок */
            gap: 1rem; /* Проміжок між елементами */
        }

        /* Стилі для кожного фото */
        .delete_photo_div {
            display: flex;
            flex-direction: column; /* Елементи розташовуються вертикально всередині блока */
            align-items: center;
            justify-content: center;
            width: calc(100% / 6 - 1rem); /* Ширина кожного елемента (1/6 ширини контейнера) */
            height: auto; /* Автоматична висота */
            margin: 0; /* Без зовнішніх відступів */
            padding: 1rem;
            border: 1px solid #ddd; /* Додати рамку */
            border-radius: 4px; /* Зробити кути заокругленими */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Легка тінь */
        }

        /* Зображення */
        .delete_photo_img {
            width: 100%; /* Зображення займатиме всю ширину батьківського контейнера */
            height: auto; /* Пропорційне масштабування */
            object-fit: cover; /* Забезпечує акуратний вигляд */
        }

        /* Кнопка видалення */
        .delete_photo_div button {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: red;
            border: none; /* Забираємо рамку */
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 0.5rem; /* Відступ між кнопкою та зображенням */
        }

        .delete_photo_div button:hover {
            background-color: darkred; /* Колір кнопки при наведенні */
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Редактировать продукт</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Название продукта</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="count">Количество</label>
            <input type="number" class="form-control" id="count" name="count" value="{{ $product->count }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" autocomplete="off">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="category_id">Категорія:</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="characteristics_id">Характеристики:</label>
            <select class="form-control" id="characteristics_id" name="characteristics_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($characteristics as $characteristic)
                    <option value="{{ $characteristic->id }}" {{ $product->characteristics_id == $characteristic->id ? 'selected' : '' }}>{{ $characteristic->type_of_material }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Поточні кольори:</label>
            @if($product->colors && $product->colors->isNotEmpty())
                <ul>
                    @foreach($product->colors as $color)
                        <li id="color-{{ $color->id }}" class="delete_color_li" style="background-color: {{ $color->name }}">
                            {{ $color->name }}
                            <button
                                class="btn btn-sm btn-danger delete-color"
                                data-color-id="{{ $color->id }}"
                                data-product-id="{{ $product->id }}">
                                Видалити
                            </button>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Кольори не знайдені</p>
            @endif
        </div>

        <div class="form-group">
            <label for="new_colors">Додати нові кольори:</label>
            <select class="form-control" id="new_colors" name="new_colors[]" multiple>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="discount_products_id">Знижка:</label>
            <select class="form-control" id="discount_products_id" name="discount_products_id" required>
                <option value="">--Будь ласка, виберіть опцію--</option>
                @foreach($discounts as $discount)
                    <option value="{{ $discount->id }}" {{ $product->discount_products_id == $discount->id ? 'selected' : '' }}>{{ $discount->discount }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Поточні фото:</label>
            @if($product->images && $product->images->isNotEmpty())
                <div class="delete_photo_container">
                    @foreach($product->images as $image)
                        <div class="delete_photo_div">
                            <img class="delete_photo_img" src="{{ $image->ImageUrl }}" alt="{{ $product->name }}" />
                            <button
                                class="btn btn-sm btn-danger delete-photo"
                                data-photo-id="{{ $image->id }}"
                                data-product-photo-id="{{ $product->id }}">
                                Видалити
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Фото не знайдені</p>
            @endif
        </div>
        <div class="form-group" id="images-container">
            <label for="images">Фото продукту:</label>
            <div class="custom-file">
                <input type="file" id="images" name="images[]" class="custom-file-input" multiple>
                <label class="custom-file-label" for="images">Виберіть файли</label>
            </div>
        </div>
        <button type="button" id="add-image-button" class="btn btn-secondary mb-2">Додати ще одне фото</button>
<br/>
        <button type="submit" class="btn btn-success">Зберегти</button>
    </form>
</div>
<script>
    document.querySelectorAll('.delete-color').forEach(button => {
        button.addEventListener('click', function(event) {
            // Запобігаємо стандартній поведінці кнопки
            event.preventDefault();

            const colorId = this.getAttribute('data-color-id');
            const productId = this.getAttribute('data-product-id');

            if (confirm('Ви впевнені, що хочете видалити цей колір?')) {
                // Використовуємо fetch для відправлення запиту DELETE
                fetch(`/product/${productId}/color/${colorId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                    .then(response => response.json()) // Перетворюємо відповідь у JSON
                    .then(data => {
                        if (data.success) {
                            // Видаляємо елемент зі списку
                            const colorElement = document.getElementById(`color-${colorId}`);
                            if (colorElement) {
                                colorElement.remove();
                            }
                        } else {
                            alert(data.message || 'Помилка при видаленні кольору');
                        }
                    })
                    .catch(error => {
                        console.error('Помилка:', error);
                        alert('Помилка при виконанні запиту');
                    });
            }
        });
    });


    document.querySelectorAll('.delete-photo').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const photoId = this.getAttribute('data-photo-id');
            const productId = this.getAttribute('data-product-photo-id');

            if (confirm('Ви впевнені, що хочете видалити цей фото?')) {
                // Використовуємо fetch для відправлення запиту DELETE
                fetch(`/product/${productId}/image/${photoId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    }
                })
                    .then(response => response.json()) // Перетворюємо відповідь у JSON
                    .then(data => {
                        if (data.success) {
                            // Якщо колір успішно видалений, видаляємо елемент з DOM
                            const photoElement = this.closest('.delete_photo_div');
                            if (photoElement) {
                                photoElement.remove();
                            }
                        } else {
                            alert('Помилка при видаленні кольору');
                        }
                    })
                    .catch(error => {
                        alert('Помилка при виконанні запиту');
                    });
            }
        });
    });
    document.getElementById('add-image-button').addEventListener('click', function() {
        var container = document.getElementById('images-container');
        var newInputDiv = document.createElement('div');
        newInputDiv.classList.add('custom-file', 'mt-2');
        var newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.name = 'images[]';
        newInput.classList.add('custom-file-input');
        var newLabel = document.createElement('label');
        newLabel.classList.add('custom-file-label');
        newLabel.innerHTML = 'Виберіть файли';
        newInputDiv.appendChild(newInput);
        newInputDiv.appendChild(newLabel);
        container.appendChild(newInputDiv);
    });

    // Update the label of custom-file input to show the selected file names
    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('custom-file-input')) {
            var input = event.target;
            var label = input.nextElementSibling;
            var fileNames = Array.from(input.files).map(file => file.name).join(', ');
            label.innerHTML = fileNames ? fileNames : 'Виберіть файли';
        }
    });
</script>
</body>
@stop
