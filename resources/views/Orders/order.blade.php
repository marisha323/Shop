<!DOCTYPE html>
<html>
    <head>
        <title>Список категорий</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <h1 class="mt-5 mb-3">Список всех заказов</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Номер замовлення</th>
                <th>Продукти</th>
                <th>Загальна сума</th>
                <th>Кількість</th>
                <th>Статус</th>
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
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->total_count }}</td>
                    <td>{{ $order->status_names ?? 'Статус не встановлений' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    </body>
</html>

