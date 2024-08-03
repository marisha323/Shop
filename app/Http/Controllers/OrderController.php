<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $referrer = User::where('referral_code', $request->input('referral_code'))->first();
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


            $referralData = [
                'referrer_id' => $referrer->id,
                'referred_id' => Auth::id(),
                'order_id' => $orderId ?? null, // Используйте null, если $orderId не определен
                'commission' => 0,
            ];


            // dd($referralData);

            Referral::create($referralData);


        return redirect()->route('welcome'); // Создайте маршрут для успешного оформления заказа
    }
}
