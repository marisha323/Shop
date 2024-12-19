@extends('adminlte::page')
@section('content_header')
    <head>
        <style>

            .container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="text"],
            input[type="number"],
            textarea,
            select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            .button-add-photo {
                width: 100%;
                padding: 10px;
                background-color: #28a745;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
            }
            button:hover {
                background-color: #218838;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>Створення нового продукту</h1>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Назва продукту:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="count">Кількість:</label>
                <input type="number" id="count" name="count" required>
            </div>
            <div class="form-group">
                <label for="description">Опис:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Ціна:</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="category_id">Категорія:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="characteristics_id">Характеристики:</label>
                <select name="characteristics_id" id="characteristics_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($characteristics as $characteristic)
                        <option value="{{ $characteristic->id }}">{{ $characteristic->type_of_material }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Блок для кольорів -->
            <div id="colors-container">
                <div class="form-group">
                    <label for="characteristics_color_id_1">Цвет:</label>
                    <select name="characteristics_color_id[]" id="characteristics_color_id_1" required>
                        <option value="">--Будь ласка, виберіть опцію--</option>
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="button" id="add-color-button" class="btn btn-secondary mb-3">Додати ще один колір</button>

            <div class="form-group">
                <label for="discount_products_id">Знижка:</label>
                <select name="discount_products_id" id="discount_products_id" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($discounts as $discount)
                        <option value="{{ $discount->id }}">{{ $discount->discount }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="images-container">
                <label for="images">Фото продукту:</label>
                <div class="custom-file">
                    <input type="file" id="images" name="images[]" class="custom-file-input" multiple>
                    <label class="custom-file-label" for="images">Виберіть файли</label>
                </div>
            </div>
            <button type="button" id="add-image-button" class="btn btn-secondary mb-2">Додати ще одне фото</button>
            <button class="button-add-photo" type="submit">Додати продукт</button>
        </form>
    </div>

    </body>
    <script>
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

        document.addEventListener('DOMContentLoaded', function () {
            let colorIndex = 1;

            // Додає нове поле для кольору
            document.getElementById('add-color-button').addEventListener('click', function () {
                colorIndex++;

                const colorsContainer = document.getElementById('colors-container');
                const newColorField = document.createElement('div');
                newColorField.classList.add('form-group');
                newColorField.innerHTML = `
                <label for="characteristics_color_id_${colorIndex}">Цвет:</label>
                <select name="characteristics_color_id[]" id="characteristics_color_id_${colorIndex}" required>
                    <option value="">--Будь ласка, виберіть опцію--</option>
                    @foreach($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            `;
                colorsContainer.appendChild(newColorField);
            });
        });
    </script>
@stop

