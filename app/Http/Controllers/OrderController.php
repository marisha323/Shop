<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Models\Order;
use App\Models\Referral;
use App\Models\TotalSalary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Валидация запроса
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'index' => ['required', 'string'],
            'comment' => ['nullable', 'string'],
            'postal_branch_number' => ['nullable', 'string'],
        ]);

        // Сохранение заказа
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $request->total_price,
            'total_count' => $request->total_count,
            'status' => 'pending', // Или другой статус по умолчанию
            'index' => $request->index,
            'comment' => $request->comment,
            'postal_branch_number' => $request->postal_branch_number,
            'post_id' => $request->post_id,
        ]);

        // Очистите корзину после оформления заказа
        session()->forget('cart');

        // Найдите запись в таблице referral_users
        $referralUser = DB::table('referral_users')
            ->where('referred_id', Auth::id())
            ->first();

        if ($referralUser) {
            // Рассчитайте комиссию (например, 15% от общей суммы заказа)
            $commission = $order->total_price * 0.15;

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
        $userName = Auth::user()->name;
        $telegram=new Telegram(new Http,config('bots.bot'));
        $message = "<b>НОВЕ ЗАМОВЛЕНННЯ!</b>\n";
        $message .= "Замовник: {$userName}\n";
        $message .= "ID замовлення: {$order->id}\n";
        $message .= "Сума замовлення: {$order->total_price} грн\n";
        $message .= "Кількість товарів: {$order->total_count}\n";
        $message .= "Поштовий індекс: {$order->index}\n";
        $message .= "Коментар: {$order->comment}\n";

        $telegram->sendMessage($message, 'HTML');


        return redirect()->route('welcome'); // Создайте маршрут для успешного оформления заказа
    }
}
