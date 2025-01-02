<!DOCTYPE html>
<html>
@extends('adminlte::page')
@section('content_header')
    <head>
        <title>Список всех заказов</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body:not(.layout-fixed) .main-sidebar {
            width: 20%; /* Нова ширина */
        }
    </style>
    </head>
    <body>
    <div class="container">
        <h1 class="mt-5 mb-3">Список всіх замовлень</h1>
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
                        <select class="form-select status-select" data-history-order-id="{{ $order->id }}">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ $order->status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
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
    </body>
    <script>
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function () {
                const historyOrderId = this.dataset.historyOrderId;
                const statusId = this.value;

                fetch(`/history-orders/${historyOrderId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ status_id: statusId })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Не вдалося оновити статус');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert('Статус успішно змінено');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Помилка оновлення статусу');
                    });
            });
        });
    </script>
</html>

@stop
