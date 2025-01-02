<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of all orders</title>
    <style>
        .container {
            margin: 20px auto;
            max-width: 100%; /* Забезпечує адаптивну ширину */
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow-x: auto; /* Прокрутка для великих таблиць */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            color: #ddd;
            background-color: #444;
            text-align: left;
            font-size: 12px; /* Зменшено текст */
        }

        .table thead th {
            background-color: #555;
            color: #fff;
            padding: 10px 12px; /* Менші відступи */
            text-transform: uppercase;
            border-bottom: 2px solid #666;
        }

        .table tbody tr {
            transition: background-color 0.3s;
        }

        .table tbody tr:nth-child(even) {
            background-color: #505050;
        }

        .table tbody tr:hover {
            background-color: #666;
        }

        .table td {
            padding: 8px 12px; /* Зменшено відступи */
            border-bottom: 1px solid #666;
            vertical-align: middle;
            white-space: nowrap; /* Уникнення переносу тексту */
        }

        .table img {
            border-radius: 5px;
            border: 1px solid #555;
            transition: transform 0.3s;
            width: 40px; /* Менший розмір зображення */
            height: 40px;
            object-fit: cover; /* Зберігає пропорції */
        }

        .table img:hover {
            transform: scale(1.2);
            cursor: pointer;
        }

        .table tbody td:first-child {
            font-weight: bold;
            color: #fff;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-hover tbody tr:hover td {
            color: #fff;
        }

        .table-dark {
            background-color: #333;
        }

    </style>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List of all orders') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="container">
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Номер замовлення</th>
            <th>Продукти</th>
            <th>Перше зображення</th>
            <th>Загальна сума</th>
            <th>Кількість</th>
            <th>Статус</th>
            <th>Індекс</th>
            <th>Коментар</th>
            <th>Відділення</th>
            <th>ПІБ</th>
            <th>Адреса</th>
            <th>Місто</th>
            <th>Країна</th>
            <th>Телефон</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    @foreach($order->historyOrders as $historyOrder)
                        <p>
                            {{ $historyOrder->product->name }} - {{ $historyOrder->count }} шт.
                        </p>
                    @endforeach
                </td>
                <td>
                    @foreach($order->historyOrders as $historyOrder)
                        @if($historyOrder->product->firstImage())
                            <img src="{{ asset($historyOrder->product->firstImage()->ImageUrl) }}"
                                 alt="Product Image"
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <img src="{{ asset('default-image.jpg') }}"
                                 alt="Default Image"
                                 style="width: 50px; height: 50px; object-fit: cover;">
                        @endif
                    @endforeach
                </td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->total_count }}</td>

                <td> {{ $order->status->name ?? 'Статус не встановлений' }}
                </td>
                <td>{{ $order->index }}</td>
                <td>{{ $order->comment }}</td>
                <td>{{ $order->postal_branch_number }}</td>
                <td>{{ $order->full_name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->country }}</td>
                <td>{{ $order->phone_number }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</x-app-layout>
</html>


