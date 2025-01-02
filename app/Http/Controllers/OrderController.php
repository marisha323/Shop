<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Models\Color;
use App\Models\HistoryOrder;
use App\Models\Order;
use App\Models\Post;
use App\Models\Referral;
use App\Models\Status;
use App\Models\TotalSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function showOrders(Request $request)
    {
        $user = auth()->user();
//        $orders = Order::where('user_id', $user->id)
//            ->with(['historyOrders.product.images','status'])
//            ->get();


        // Завантажуємо замовлення разом з історією та статусом
        $orders = Order::with(['historyOrders.product.images', 'status'])->get();
        $statuses = Status::all();

        // Для кожного замовлення перевіряємо статус
        foreach ($orders as $order) {
            // Якщо статус існує, зберігаємо його ім'я, інакше встановлюємо дефолтне значення
            $order->status_name = $order->status ? $order->status->name : 'Статус не встановлений';
        }

        return view('orders.order', compact('orders', 'statuses'));
    }
    public function showOrdersUser(Request $request)
    {
        $user = auth()->user();
//        $orders = Order::where('user_id', $user->id)
//            ->with(['historyOrders.product.images','status'])
//            ->get();


        // Завантажуємо замовлення разом з історією та статусом
        $orders = Order::where('user_id', $user->id)
            ->with(['historyOrders.product.images', 'status'])
            ->get();
        $statuses = Status::all();

        // Для кожного замовлення перевіряємо статус
        foreach ($orders as $order) {
            // Якщо статус існує, зберігаємо його ім'я, інакше встановлюємо дефолтне значення
            $order->status_name = $order->status ? $order->status->name : 'Статус не встановлений';
        }

        return view('orders.order_user', compact('orders', 'statuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Перевірка валідності статусу
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        // Оновлення статусу
        $order->update([
            'status_id' => $request->status_id,
        ]);

        return response()->json(['message' => 'Статус успішно змінено']);
    }

    public function showOrderForm(){

        $posts = Post::all();
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('order', compact('cart', 'total','posts'));
    }



    public function store(Request $request)
    {
        // Валидация запроса
        $validatedData =$request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'post_id' => ['required', 'exists:posts,id'],
            'index' => ['required', 'string'],
            'comment' => ['nullable', 'string'],
            'postal_branch_number' => ['nullable', 'string'],
            'color_id' => ['nullable', 'string'],
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'total_count' => $request->total_count,
            'index' => $validatedData['index'],
            'comment' => $validatedData['comment'],
            'postal_branch_number' => $validatedData['postal_branch_number'],
            'post_id' => $validatedData['post_id'],
            'full_name' => $validatedData['full_name'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'phone_number' => $validatedData['phone_number'],
            'status_id' =>1,
        ]);

        // Получите корзину из сессии
        $cart = session()->get('cart', []);
        $userId = Auth::id();

        //dd($order->id);
        // Сохранение данных в таблицу history_orders перед очисткой корзины
        if ($userId && !empty($cart)) {
            foreach ($cart as $productId => $details) {
                $color = Color::where('name', strtolower($details['color']))->first();

                // Перевіряємо, чи знайдений колір
                $colorId = $color ? $color->id : null;

                HistoryOrder::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'sum_price' => $details['price'] * $details['quantity'],
                    'count' => $details['quantity'],
                    'StatusId' =>1,
                    'order_id' =>$order->id,
                    'color_id'=>$colorId,
                ]);
            }

            // Очистите корзину после оформления заказа
            session()->forget('cart');

            // Найдите запись в таблице referral_users
            $referralUser = DB::table('referral_users')
                ->where('referred_id', Auth::id())
                ->first();

            if ($referralUser) {
                // Рассчитайте комиссию (например, 8% от общей суммы заказа)
                $commission = $order->total_price * 0.08;

                // Сохраните запись в таблице referrals
                Referral::create([
                    'referrer_id' => $referralUser->referrer_id,
                    'referred_id' => Auth::id(),
                    'order_id' => $order->id,
                    'commission' => $commission,
                ]);

                // Найдите или создайте запись в таблице Total_salaries
                $totalSalary = TotalSalary::firstOrCreate(
                    ['user_id' => $referralUser->referrer_id],
                    ['money' => 0]
                );

                // Обновите поле money, добавив комиссию
                $totalSalary->money += $commission;
                $totalSalary->save();
            }
        }
//        $userName = Auth::user()->name;

        $telegram=new Telegram(new Http,config('bots.bot'));
        $message = "<b>НОВЕ ЗАМОВЛЕНННЯ!</b>\n";
        $message .= "Замовник: {$order->full_name}\n";
        $message .= "ID замовлення: {$order->id}\n";
        $message .= "Сума замовлення: {$order->total_price} $\n";
        $message .= "Кількість товарів: {$order->total_count}\n";
        $message .= "Поштовий індекс: {$order->index}\n";
        $message .= "Коментар: {$order->comment}\n";

        $telegram->sendMessage($message, 'HTML');


        return redirect()->route('welcome'); // Создайте маршрут для успешного оформления заказа
    }
}
